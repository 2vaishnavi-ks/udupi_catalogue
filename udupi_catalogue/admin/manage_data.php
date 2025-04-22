<?php
require_once '../config.php';
require_once '../includes/auth.php';

// Check if user is logged in and is admin
if (!isAdmin()) {
    header('Location: login.php');
    exit();
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $table = $_POST['table'];
    $action = $_POST['action'];
    $success = false;
    $message = '';
    
    try {
        switch($action) {
            case 'add':
                // Add new record
                $fields = [];
                $values = [];
                $params = [];
                
                foreach($_POST as $key => $value) {
                    if ($key != 'table' && $key != 'action') {
                        $fields[] = $key;
                        $values[] = "?";
                        $params[] = $value;
                    }
                }
                
                $sql = "INSERT INTO $table (" . implode(',', $fields) . ") VALUES (" . implode(',', $values) . ")";
                $stmt = $pdo->prepare($sql);
                $stmt->execute($params);
                
                // Log the activity
                logActivity($_SESSION['admin_id'], "Added new record to $table");
                $success = true;
                $message = "Record added successfully!";
                break;
                
            case 'update':
                // Update existing record
                $id_field = $table . '_id'; // Get correct ID field name
                $id = $_POST['id'];
                $updates = [];
                $params = [];
                
                foreach($_POST as $key => $value) {
                    if ($key != 'table' && $key != 'action' && $key != 'id') {
                        $updates[] = "$key = ?";
                        $params[] = $value;
                    }
                }
                
                $params[] = $id;
                $sql = "UPDATE $table SET " . implode(',', $updates) . " WHERE $id_field = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute($params);
                
                // Log the activity
                logActivity($_SESSION['admin_id'], "Updated record in $table");
                $success = true;
                $message = "Record updated successfully!";
                break;
                
            case 'delete':
                // Delete record
                $id_field = $table . '_id'; // Get correct ID field name
                $id = $_POST['id'];
                $sql = "DELETE FROM $table WHERE $id_field = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
                
                // Log the activity
                logActivity($_SESSION['admin_id'], "Deleted record from $table");
                $success = true;
                $message = "Record deleted successfully!";
                break;
        }
    } catch (PDOException $e) {
        $message = "Error: " . $e->getMessage();
    }
    
    // Return JSON response for AJAX requests
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
        header('Content-Type: application/json');
        echo json_encode(['success' => $success, 'message' => $message]);
        exit;
    }
    
    // Redirect with message for regular form submissions
    header("Location: manage_data.php?message=" . urlencode($message) . "&success=" . ($success ? '1' : '0'));
    exit;
}

// Function to log admin activities
function logActivity($admin_id, $action) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO activities (admin_id, action, description) VALUES (?, 'Data Management', ?)");
    $stmt->execute([$admin_id, $action]);
}

// Display message if exists
$message = isset($_GET['message']) ? $_GET['message'] : '';
$success = isset($_GET['success']) ? $_GET['success'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Data - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <?php if ($message): ?>
    <div class="alert alert-<?php echo $success ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
        <?php echo htmlspecialchars($message); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>

    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h3>Admin Panel</h3>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
                    <li class="active"><a href="manage_data.php"><i class="fas fa-database"></i> Manage Data</a></li>
                    <li><a href="settings.php"><i class="fas fa-cog"></i> Settings</a></li>
                    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="container-fluid">
                <h2 class="mb-4">Manage Tourism Data</h2>
                
                <!-- Data Management Tabs -->
                <ul class="nav nav-tabs" id="dataTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="destinations-tab" data-bs-toggle="tab" href="#destinations">Destinations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="accommodations-tab" data-bs-toggle="tab" href="#accommodations">Accommodations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="experiences-tab" data-bs-toggle="tab" href="#experiences">Experiences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="foods-tab" data-bs-toggle="tab" href="#foods">Food Items</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content mt-4" id="dataTabsContent">
                    <!-- Destinations Tab -->
                    <div class="tab-pane fade show active" id="destinations">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Manage Tourist Destinations</h5>
                                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addDestinationModal">
                                    <i class="fas fa-plus"></i> Add New Destination
                                </button>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Location</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            try {
                                                $stmt = $pdo->query("SELECT * FROM destinations ORDER BY name");
                                                while ($row = $stmt->fetch()) {
                                                    $id = isset($row['destination_id']) ? $row['destination_id'] : '';
                                                    echo "<tr>";
                                                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['location']) . "</td>";
                                                    echo "<td>";
                                                    if ($id) {
                                                        echo "<button class='btn btn-sm btn-info' onclick='editDestination(" . $id . ")'>
                                                            <i class='fas fa-edit'></i>
                                                        </button>
                                                        <button class='btn btn-sm btn-danger' onclick='deleteDestination(" . $id . ")'>
                                                            <i class='fas fa-trash'></i>
                                                        </button>";
                                                    }
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                            } catch (PDOException $e) {
                                                echo "<tr><td colspan='3' class='text-danger'>Error loading destinations: " . $e->getMessage() . "</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Similar tabs for Accommodations, Experiences, and Foods -->
                    
                    <!-- ... -->
                </div>
            </div>
        </div>
    </div>

    <!-- Add Destination Modal -->
    <div class="modal fade" id="addDestinationModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Destination</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addDestinationForm" method="POST">
                        <input type="hidden" name="table" value="destinations">
                        <input type="hidden" name="action" value="add">
                        
                        <div class="mb-3">
                            <label for="taluk_id" class="form-label">Taluk</label>
                            <select class="form-control" id="taluk_id" name="taluk_id" required>
                                <?php
                                $stmt = $pdo->query("SELECT * FROM taluk ORDER BY taluk_name");
                                while ($taluk = $stmt->fetch()) {
                                    echo "<option value='" . $taluk['taluk_id'] . "'>" . htmlspecialchars($taluk['taluk_name']) . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" class="form-control" id="category" name="category" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Destination Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="image_url" class="form-label">Image URL</label>
                            <input type="text" class="form-control" id="image_url" name="image_url">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Add Destination</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to handle delete operations
        function deleteDestination(id) {
            if (confirm('Are you sure you want to delete this destination?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.innerHTML = `
                    <input type="hidden" name="table" value="destinations">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="${id}">
                `;
                document.body.appendChild(form);
                form.submit();
            }
        }

        // Function to handle edit operations
        function editDestination(id) {
            // Load destination data and populate edit form
            fetch(`get_destination.php?id=${id}`)
                .then(response => response.json())
                .then(data => {
                    // Populate edit form fields
                    document.getElementById('edit_taluk_id').value = data.taluk_id;
                    document.getElementById('edit_category').value = data.category;
                    document.getElementById('edit_name').value = data.name;
                    document.getElementById('edit_description').value = data.description;
                    document.getElementById('edit_location').value = data.location;
                    document.getElementById('edit_image_url').value = data.image_url;
                    document.getElementById('edit_id').value = id;
                    
                    // Show edit modal
                    new bootstrap.Modal(document.getElementById('editDestinationModal')).show();
                });
        }

        // Refresh page after modal is hidden (form submitted)
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('hidden.bs.modal', function () {
                if (document.querySelector('.alert')) {
                    location.reload();
                }
            });
        });
    </script>
</body>
</html> 
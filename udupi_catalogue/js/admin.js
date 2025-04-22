document.addEventListener('DOMContentLoaded', function() {
    // Sidebar toggle functionality
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    const dashboardContainer = document.querySelector('.dashboard-container');
    
    if (sidebarToggle && dashboardContainer) {
        sidebarToggle.addEventListener('click', function() {
            dashboardContainer.classList.toggle('sidebar-collapsed');
        });
    }

    // Active link highlighting
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.sidebar-nav a');
    
    navLinks.forEach(link => {
        if (link.getAttribute('href') === currentPath) {
            link.parentElement.classList.add('active');
        }
    });

    // Search functionality
    const searchInput = document.querySelector('.search-bar input');
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            // Add your search logic here
        });
    }

    // Stats counter animation
    const statNumbers = document.querySelectorAll('.stat-number');
    
    const animateValue = (element, start, end, duration) => {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            const current = Math.floor(progress * (end - start) + start);
            element.textContent = current;
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    };

    // Intersection Observer for stats animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                const finalValue = parseInt(target.getAttribute('data-value') || '0');
                animateValue(target, 0, finalValue, 2000);
                observer.unobserve(target);
            }
        });
    }, { threshold: 0.5 });

    statNumbers.forEach(stat => observer.observe(stat));

    // Quick action buttons
    const quickActionButtons = document.querySelectorAll('.quick-actions .btn');
    quickActionButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            const action = this.getAttribute('data-action');
            switch(action) {
                case 'add-place':
                    window.location.href = 'add_place.php';
                    break;
                case 'add-accommodation':
                    window.location.href = 'add_accommodation.php';
                    break;
                case 'add-experience':
                    window.location.href = 'add_experience.php';
                    break;
                case 'add-food':
                    window.location.href = 'add_food.php';
                    break;
            }
        });
    });

    // Fetch and update recent activities
    const updateRecentActivities = async () => {
        try {
            const response = await fetch('get_recent_activities.php');
            if (!response.ok) throw new Error('Failed to fetch activities');
            
            const activities = await response.json();
            const activityList = document.querySelector('.activity-list');
            
            if (activityList && activities.length > 0) {
                activityList.innerHTML = activities.map(activity => `
                    <div class="activity-item">
                        <i class="fas ${activity.icon}"></i>
                        <div class="activity-content">
                            <p>${activity.description}</p>
                            <small>${activity.time}</small>
                        </div>
                    </div>
                `).join('');
            }
        } catch (error) {
            console.error('Error updating activities:', error);
        }
    };

    // Update activities every 5 minutes
    updateRecentActivities();
    setInterval(updateRecentActivities, 5 * 60 * 1000);
}); 
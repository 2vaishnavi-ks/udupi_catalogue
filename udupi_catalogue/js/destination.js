document.addEventListener('DOMContentLoaded', function() {
    const seasonFilterForm = document.getElementById('seasonFilterForm');
    const destinationsGrid = document.getElementById('destinationsGrid');

    // Ensure the form and grid elements are found
    if (seasonFilterForm && destinationsGrid) {
        seasonFilterForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const selectedSeasons = Array.from(document.querySelectorAll('.form-check-input:checked'))
                .map(input => input.value);
            filterDestinations(selectedSeasons);
        });
    }

    function filterDestinations(seasons) {
        const destinationCards = document.querySelectorAll('.destination-card');
        destinationCards.forEach(card => {
            const season = card.dataset.season;
            if (seasons.length === 0 || seasons.includes(season)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
});
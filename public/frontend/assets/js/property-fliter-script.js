document.addEventListener("DOMContentLoaded", function() {
    const filters = {
        category: document.querySelectorAll('.properties-filter a'),
        priceRange: document.getElementById('priceRange'),
        parkingSpots: document.querySelectorAll('input[name="parkingSpots"]'),
        bhk: document.getElementById('bhk')
    };

    const priceValueDisplay = document.getElementById('priceValue');

    // Function to initially show all properties when the page loads
    function showAllProperties() {
        document.querySelectorAll('.properties-items').forEach(item => {
            item.style.display = "block";
        });
    }

    // Initial function call to show all properties
    showAllProperties();

    // Update price display
    filters.priceRange.oninput = function() {
        priceValueDisplay.textContent = `$${this.value}`;
        applyFilters();
    }

    function applyFilters() {
        const selectedPrice = parseInt(filters.priceRange.value, 10);
        let selectedParking = null;
        filters.parkingSpots.forEach(radio => {
            if (radio.checked) selectedParking = parseInt(radio.value, 10);
        });
        const selectedBhk = parseInt(filters.bhk.value, 10);

        document.querySelectorAll('.properties-items').forEach(item => {
            const price = parseInt(item.dataset.price, 10);
            const parking = parseInt(item.dataset.parking, 10);
            const bhk = parseInt(item.dataset.bhk, 10);

            const priceMatch = !selectedPrice || (price <= selectedPrice);
            const parkingMatch = !selectedParking || (parking === selectedParking);
            const bhkMatch = !selectedBhk || (bhk === selectedBhk);

            item.style.display = (priceMatch && parkingMatch && bhkMatch) ? "block" : "none";
        });
    }

    // Event listeners for BHK and Parking changes
    filters.bhk.addEventListener('change', applyFilters);
    filters.parkingSpots.forEach(radio => radio.addEventListener('change', applyFilters));

    // Apply category filters independently from the other filters
    filters.category.forEach(filter => {
        filter.addEventListener('click', function(e) {
            e.preventDefault();
            const category = this.getAttribute('data-filter');
            document.querySelectorAll('.properties-items').forEach(item => {
                if (category === "*" || item.classList.contains(category.substring(1))) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });
            filters.category.forEach(f => f.classList.remove('is_active'));
            this.classList.add('is_active');
        });
    });
});

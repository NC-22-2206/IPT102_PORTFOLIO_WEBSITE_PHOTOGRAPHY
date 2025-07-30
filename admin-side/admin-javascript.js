

// Script for Add New Category
document.getElementById('showFormButton').addEventListener('click', function () {
    document.getElementById('formOverlay').style.display = 'flex';
});

// Close the form overlay
document.getElementById('closeFormButton').addEventListener('click', function () {
    document.getElementById('formOverlay').style.display = 'none';
});

// Close overlay when clicking outside the form
document.getElementById('formOverlay').addEventListener('click', function (event) {
    if (event.target === this) {
        this.style.display = 'none';
    }
});



// Script for Add New Photo
const openFormButton = document.getElementById('openFormButton');
const closeFormButton = document.getElementById('closeFormButton');
const overlay = document.getElementById('overlay');

openFormButton.addEventListener('click', () => {
    overlay.style.display = 'flex';
});

closeFormButton.addEventListener('click', () => {
    overlay.style.display = 'none';
});

window.addEventListener('click', (event) => {
    if (event.target === overlay) {
        overlay.style.display = 'none';
    }
});


// Script for Gallery
document.addEventListener('DOMContentLoaded', () => {
    const filterOptions = document.querySelectorAll('.filter-options li');
    const grid = document.querySelector('#galleryGrid');

    // Initialize Masonry
    const masonryInstance = new Masonry(grid, {
        itemSelector: '.grid-item',
        columnWidth: '.grid-item',
        percentPosition: true,
        gutter: 16,
    });

    filterOptions.forEach(option => {
        option.addEventListener('click', () => {
            // Remove active class from all options and add it to the clicked one
            filterOptions.forEach(opt => opt.classList.remove('active'));
            option.classList.add('active');

            const filter = option.getAttribute('data-filter');

            // Show/hide grid items based on the filter
            const gridItems = document.querySelectorAll('.grid-item');
            gridItems.forEach(item => {
                if (filter === '*' || item.classList.contains(filter.substring(1))) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });

            // Layout the grid again after filtering
            masonryInstance.layout();
        });
    });
});
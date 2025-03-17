const navLinks = document.querySelectorAll('.nav ul li a');

navLinks.forEach(link => {
    link.addEventListener('click', function(event) {
        // Remove menu-item-active class from all links
        navLinks.forEach(navLink => {
            navLink.classList.remove('menu-item-active');
        });
        // Add menu-item-active class to the clicked link
        this.classList.add('menu-item-active');
    });
});

// Add menu-item-active class to the current page link on load
const currentPath = window.location.pathname;
navLinks.forEach(link => {
    if (link.getAttribute('href') === currentPath) {
        link.classList.add('menu-item-active');
    }
});
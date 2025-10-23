// This file contains the JavaScript code for the navbar component
    const navLinks = document.querySelector('.nav-links');
    function onToggleMenu(e) {
        e.name = e.name === 'menu' ? 'close' : 'menu';
        navLinks.classList.toggle('top-[62px]');
    }

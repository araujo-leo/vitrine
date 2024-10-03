document.addEventListener('DOMContentLoaded', () => {
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');
    const navbarMobile = document.querySelector('.navbar-mobile');

    if (menuIcon && navbarMobile) {
        menuIcon.addEventListener('click', () => {
            navbarMobile.classList.add('active');
            closeIcon.style.display = "block";
            menuIcon.style.display = "none";
        });

        closeIcon.addEventListener('click', () => {
            navbarMobile.classList.remove('active');
            closeIcon.style.display = "none";
            menuIcon.style.display = "block";
        });
    }


})
document.addEventListener('DOMContentLoaded', function () {
    const iconoMenu = document.querySelector('.icono-menu');
    const menu = document.querySelector('.menu');

    iconoMenu.addEventListener('click', function () {
        menu.classList.toggle('active');
    });
});

// Ativa o link com base na URL atual
window.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('nav a');
    const currentPath = window.location.pathname;

    tabs.forEach((tab) => {
        // Verifica se o href do link está contido na URL atual
        if (currentPath.includes(tab.getAttribute('href'))) {
            tab.classList.add('active');
        } else {
            tab.classList.remove('active');
        }
    });
});

// ============================================================
//  Bootstrap
// ============================================================
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';

// ============================================================
//  Sidebar Hamburger Script
// ============================================================

document.addEventListener('DOMContentLoaded', () => {

    const sidebar = document.getElementById('sidebar');
    const btn = document.getElementById('hamburger-btn');

    // Se sidebar o hamburger non esistono, esci
    if (!sidebar || !btn) return;

    // Apri/chiudi sidebar
    btn.addEventListener('click', () => {
        sidebar.classList.toggle('show');
    });

    // Chiudi sidebar quando si clicca fuori (solo mobile)
    document.addEventListener('click', (event) => {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickOnButton = btn.contains(event.target);

        if (!isClickInsideSidebar && !isClickOnButton && sidebar.classList.contains('show')) {
            sidebar.classList.remove('show');
        }
    });

    // Chiudi sidebar con ESC
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && sidebar.classList.contains('show')) {
            sidebar.classList.remove('show');
        }
    });

    // Chiudi sidebar quando si clicca un link (solo mobile)
    const links = sidebar.querySelectorAll('a');
    links.forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth <= 992) {
                sidebar.classList.remove('show');
            }
        });
    });

});

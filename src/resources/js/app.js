// ============================================================
//  Bootstrap
// ============================================================
import "bootstrap";

// ============================================================
//  Sidebar Hamburger Script
// ============================================================

window.addEventListener("load", () => manageMenu());

function manageMenu() {

    const backdropCloseListener = (e) => {
        if (e.target && e.target.tagName === "BODY") {
            closeMenu();
        }
    };

    const openMenu = () => {
        nav.classList.add("open");
        document.body.addEventListener("click", backdropCloseListener);
    };

    const closeMenu = () => {
        nav.classList.remove("open");
        document.body.removeEventListener("click", backdropCloseListener);
    };

    const menuBtn = document.getElementById("open-menu-btn");
    const closeBtn = document.getElementById("close-menu-btn");
    const nav = document.getElementById("menu-bar");

    closeBtn.addEventListener("click", () => closeMenu());
    menuBtn.addEventListener("click", () => openMenu());
}

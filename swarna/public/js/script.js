aos.init({
    duration: 800,
    easing: "ease-in-out",
    once: true,
    mirror: false,
});
document.addEventListener("DOMContentLoaded", () => {
    /* ── Parallax (index.html hero) ── */
    const heroBg = document.getElementById("heroBg");
    if (heroBg) {
        window.addEventListener("scroll", () => {
            heroBg.style.transform = `translateY(${window.scrollY * 0.38}px)`;
        });
    }

    /* ── Navbar scroll tint ── */
    const navbar = document.getElementById("navbar");
    if (navbar) {
        window.addEventListener("scroll", () => {
            navbar.style.background =
                window.scrollY > 60 ? "rgba(10,9,8,.95)" : "rgba(14,13,12,.72)";
        });
    }

    /* ── Mobile nav toggle ── */
    const navToggle = document.getElementById("navToggle");
    const navLinks = document.getElementById("navLinks");
    if (navToggle && navLinks) {
        navToggle.addEventListener("click", () =>
            navLinks.classList.toggle("open"),
        );
        navLinks
            .querySelectorAll("a")
            .forEach((a) =>
                a.addEventListener("click", () =>
                    navLinks.classList.remove("open"),
                ),
            );
    }
});


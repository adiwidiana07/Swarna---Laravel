AOS.init({
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
            if (window.scrollY > 60) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
    }

    /* ── Mobile nav toggle ── */
    const navToggle = document.getElementById("navToggle");
    const navLinks = document.getElementById("navLinks");
    if (navToggle && navLinks) {
        navToggle.addEventListener("click", (e) => {
            e.stopPropagation();
            navLinks.classList.toggle("open");
            const icon = navToggle.querySelector("i, span");
            if (navLinks.classList.contains("open")) {
                if (icon) icon.className = "fa fa-times";
            } else {
                if (icon) icon.className = "fa fa-bars";
            }
        });

        navLinks.querySelectorAll("a").forEach((a) =>
            a.addEventListener("click", () => {
                navLinks.classList.remove("open");
                const icon = navToggle.querySelector("i, span");
                if (icon) icon.className = "fa fa-bars";
            })
        );

        document.addEventListener("click", (e) => {
            if (!navbar.contains(e.target) && navLinks.classList.contains("open")) {
                navLinks.classList.remove("open");
                const icon = navToggle.querySelector("i, span");
                if (icon) icon.className = "fa fa-bars";
            }
        });
    }

    /* ── Alert auto-dismiss ── */
    document.querySelectorAll(".alert-dismissible").forEach((alert) => {
        setTimeout(() => {
            alert.classList.remove("show");
            alert.classList.add("fade");
            setTimeout(() => alert.remove(), 300);
        }, 5000);
    });

    /* ── Smooth scroll for anchor links ── */
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            const target = document.querySelector(this.getAttribute("href"));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: "smooth", block: "start" });
            }
        });
    });
});

$(document).ready(function () {
    // Navigation bar effects on scroll
    // window.addEventListener("scroll", function () {
    //     const header = document.querySelector("header");

    //     header.classList.toggle("sticky", window.scrollY > 0);
    // });

    // Responsive navigation menu toggle
    const menuBtn = document.querySelector(".nav-menu-btn");
    const closeBtn = document.querySelector(".nav-close-btn");
    const navigation = document.querySelector(".navigation");
    const body = document.querySelector("body");

    $(menuBtn).click(function () { 
        $(navigation).addClass("active");
    });

    $(closeBtn).click(function () { 
        $(navigation).removeClass('active');
    });

    $(body).click(function (e) { 
        // Si el clic fue en un elemento que no es hijo de la etiqueta nav-menu-btn
        if (!$(e.target).closest('.nav-menu-btn').length) {
            $(navigation).removeClass('active');
        }
    });
    
});
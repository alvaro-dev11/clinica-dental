$(document).ready(function () {
    const body = document.querySelector("body");
    // Navigation bar effects on scroll
    // Navigation dropdawn
    const profile = $('.profile'),
        menu = $('.menu');
    $(profile).click(function () {
        $(menu).toggleClass('active');
    });
    $(body).click(function (e) { 
        // Si el clic fue en un elemento que no es hijo de la etiqueta imgBox
        if (!$(e.target).closest('.imgBox').length) {
            $(menu).removeClass('active');
        }
    });

    //Menu toggle
    const menuToggle=document.querySelector('.menuToggle');
    const navMenu=document.querySelector('.nav');
    menuToggle.addEventListener('click',showMenu);

    function showMenu(){
        navMenu.classList.toggle('show');
        if (menuToggle.className === 'bx bx-menu menuToggle') {
            menuToggle.className = 'bx bx-x menuToggle';
        } else {
            menuToggle.className = 'bx bx-menu menuToggle';
        }
    }

    //Theme mode
    const btnMode=document.querySelector('.btn-mode');
    const iconMode=document.querySelector('.bx-sun');
    // <i class='bx bxs-moon'></i>
    btnMode.addEventListener('click',changeThemeMode);

    function changeThemeMode(){
        // if(iconMode.className === "bx-sun"){
        //     iconMode.className = "bx-sun";
        // }else{
        //     iconMode.className = "bxs-moon";
        // }
    }

    // Responsive navigation menu toggle
    const menuBtn = document.querySelector(".nav-menu-btn");
    const closeBtn = document.querySelector(".nav-close-btn");
    const navigation = document.querySelector(".navigation");
    

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
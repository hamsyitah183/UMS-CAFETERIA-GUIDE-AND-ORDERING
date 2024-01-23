let sections = document.querySelectorAll('section');

window.onscroll = () => {
    sections.forEach(sec => {
        let top = window.scrollY;
        let offset = sec.offsetTop - 150;
        let height = sec.offsetHeight;

        if(top >= offset && top < offset + height) {
            sec.classList.add('show-animate');
        }
        else {
            sec.classList.remove('show-animate');
        }
    })
}

let search = document.querySelector('li .search');
let searchBox = document.querySelector('.searchBox');

search.addEventListener('click', () => {
    searchBox.classList.toggle('appear');
});

/*=============== CHANGE BACKGROUND HEADER ===============*/
const scrollHeader = () => {
    const header = document.getElementById('header')
    const hello = document.querySelector('.hello');
    let searchIcon = document.querySelector('li .search');
    // const subMenu = document.querySelectorAll('.dropdown__link')
    if (this.scrollY >= 50) {
        header.classList.add('scroll-header');
        hello.classList.add('remove');
        searchIcon.classList.remove('remove');    
    } else {
        header.classList.remove('scroll-header');
        hello.classList.remove('remove');
        searchIcon.classList.add('remove');    
    }
}

window.addEventListener('scroll', scrollHeader)

const scrollHeader2 = () => {
    
    // const subMenu = document.querySelector('.dropdown__menu li');
    // this.scrollY >= 20 ? subMenu.classList.add('scroll-bg')
    // : subMenu.classList.remove('scroll-bg');

    // console.log(subMenu)

    const dropdownMenuItems = document.querySelectorAll('.dropdown__menu li .dropdown__link');

// Iterate over the selected elements
    dropdownMenuItems.forEach(item => {
    // Do something with each dropdown menu item, for example, log the text content
    this.scrollY >= 20 ? item.classList.add('scroll-bg')
                        : item.classList.remove('scroll-bg');
    console.log(dropdownMenuItems);
});
}

window.addEventListener('scroll', scrollHeader2)

/*=============== SHOW MENU ===============*/
const showMenu = (toggleId, navId) =>{
    const toggle = document.getElementById(toggleId),
          nav = document.getElementById(navId)
 
    toggle.addEventListener('click', () =>{
        // Add show-menu class to nav menu
        nav.classList.toggle('show-menu')
 
        // Add show-icon to show and hide the menu icon
        toggle.classList.toggle('show-icon')
    })
 }
 
 showMenu('nav-toggle','nav-menu')

// data JSON

var ourRequest = new XMLHttpRequest();
ourRequest.open('GET', 'json/announcement.json');
ourRequest.onload = function() {
    if(ourRequest.status >= 200 && ourRequest.status < 400) {
        var data = JSON.parse(ourRequest.responseText);
        createHTML(data);
    }

    else {
        console.log("Fail to connect");
    }
};

ourRequest.onerror = function() {
    console.log("Connection error");
}

ourRequest.send();


function createHTML(announcementData) {
    var rawTemplate = document.getElementById("announcementTemplate").innerHTML;
    var compiledTemplate = Handlebars.compile(rawTemplate);
    var ourGeneratedHTML = compiledTemplate(announcementData);



    var announcementContainer = document.getElementById("announcement-container");
    announcementContainer.innerHTML = ourGeneratedHTML;
}

// INDIVIDUAL CAFE
var ourRequest2 = new XMLHttpRequest();
ourRequest2.open('GET', 'json/dining_option.json');
ourRequest2.onload = function() {
    if(ourRequest2.status >= 200 && ourRequest2.status < 400) {
        var data = JSON.parse(ourRequest2.responseText);
        createHTML2(data);
    }

    else {
        console.log("Fail to connect");
    }
};

ourRequest2.onerror = function() {
    console.log("Connection error");
}

ourRequest2.send();

function createHTML2(diningData) {
    var rawTemplate = document.getElementById("listPlaceTemplate").innerHTML;
    var compiledTemplate = Handlebars.compile(rawTemplate);
    var ourGeneratedHTML = compiledTemplate(diningData);



    var announcementContainer = document.getElementById("list__container");
    announcementContainer.innerHTML = ourGeneratedHTML;
}


// tab
const tabs = document.querySelectorAll('.tab');
const tabBtns = document.querySelectorAll('.tab-btn');

const tab_Nav = function(tabNavClick) {
    tabBtns.forEach((tabBtn) => {
        tabBtn.classList.remove("active");
    });

    tabs.forEach((tab) => {
        tab.classList.remove('active');
    });

    
    tabBtns[tabNavClick].classList.add("active");
    tabs[tabNavClick].classList.add("active");
}

tabBtns.forEach((tabBtn, i) => {
    tabBtn.addEventListener("click", () => {
        tab_Nav(i);
    })
})


// swiper
var swiperProducts = new Swiper(".gallery__container", {
    spaceBetween: 40,
    grabCursor: false,
    centeredSlides: true,
    slidesPerView: 'auto',
    loop:true,

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    breakpoints: {
    1024: {

        spaceBetween: 60,
    }
}
});

/*=============== SHOW SCROLL UP ===============*/ 
const scrollUp = () => {
    const scrollUp = document.getElementById('scroll-up')

    this.scrollY >= 50 ? scrollUp.classList.add('show-scroll')
                        : scrollUp.classList.remove('show-scroll')
}
window.addEventListener('scroll',scrollUp)
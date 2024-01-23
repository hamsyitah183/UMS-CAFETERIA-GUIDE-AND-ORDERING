

const body = document.querySelector("body"),
    modeToggle = document.querySelector(".mode-toggle");
    sidebar = body.querySelector("nav");
    sidebarToggle = document.querySelector(".sidebar-toggle");
    // logo = document.querySelector('nav .logo-name .logo_name');


let getMode = localStorage.getItem("mode");
if(getMode && getMode === "dark") {
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus === "close") {
    sidebar.classList.toggle("close");
    // logo.classList.toggle("none");
}

modeToggle.addEventListener("click", () => {
    body.classList.toggle("dark");
    if(body.classList.contains("dark")) {
        localStorage.setItem("mode", "dark");
    }
    else {
        localStorage.setItem("mode", "light");

    }
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close")
    if(sidebar.classList.contains("close")) {
        localStorage.setItem("status", "close");
    }
    else {
        localStorage.setItem("status", "open");

    }
})

console.log(logo);

// owner menu
function goToLink(url) {
    // Redirect to the desired URL
    window.location.href = url;
}

function togglePopup(popupId) {
    var popup = document.getElementById(popupId);
    if (popup) {
        popup.classList.toggle('active');
    }
}
var list_option = document.getElementsByClassName('list_option');
var display = 0;
function hideShow() {
    if(display == 1) {
        list_option.style.display = 'block';
        display = 0;
    }

    else {
        list_option.style.display = 'none';
        display = 1;
    }
}



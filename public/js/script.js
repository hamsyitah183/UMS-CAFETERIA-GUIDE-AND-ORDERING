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



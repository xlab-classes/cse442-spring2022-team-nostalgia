// DARK THEME https://css-tricks.com/a-complete-guide-to-dark-mode-on-the-web
const dm_btn = document.querySelector(".darkmode-toggle");
const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)");

dm_btn.addEventListener("click", function () {
    if (prefersDarkScheme.matches) document.body.classList.toggle("light-theme");
    else document.body.classList.toggle("dark-theme");
});
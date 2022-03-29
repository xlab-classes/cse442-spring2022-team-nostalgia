const debug = false;

/* DARK THEME
    Useful Resources: 
        https://css-tricks.com/a-complete-guide-to-dark-mode-on-the-web
        https://developer.mozilla.org/en-US/docs/Web/HTTP/Cookies   
        https://developer.mozilla.org/en-US/docs/Web/API/Document/cookie
*/

const dm_btn = document.querySelector(".darkmode-toggle");
const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)");
    if(debug) console.log("[DEBUG] prefersDarkScheme: " + prefersDarkScheme.matches);

window.onload = function () {
    darkmodeCookieVal = document.cookie.split('; ').find(row => row.startsWith('isDarkModeOn=')).split('=')[1];
        if(debug) console.log("[DEBUG] darkmodeCookieVal: " + darkmodeCookieVal);

    if (prefersDarkScheme.matches && darkmodeCookieVal === "false") document.body.classList.toggle("light-theme");
    else if (!prefersDarkScheme.matches && darkmodeCookieVal === "true") document.body.classList.add("dark-theme");
}

dm_btn.addEventListener("click", function () {
    var element = document.body;
    if (element.classList.contains("dark-theme") && (element.classList.contains("light-theme"))) console.log("[Error]: dark-theme and light-theme toggled at once.");
    
    if (prefersDarkScheme.matches) isDarkModeOn = !document.body.classList.toggle("light-theme");
    else                           isDarkModeOn =  document.body.classList.toggle("dark-theme");

    document.cookie = "isDarkModeOn=" + isDarkModeOn.toString() + "; Max-Age=2600000; path=/"  // 1 month expiry date
});
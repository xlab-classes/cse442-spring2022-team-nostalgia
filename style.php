<?php
/*** set the content type header ***/
/*** Without this header, it wont work ***/
header("Content-type: text/css");

$font_family = 'Verdana, sans-serif';
$font_size = '1.5em';
?>

:root {

    /* WHITES */
    --cornsilk: #FEFAE0;
    --baby-poweder: #FFFDF7;
    --snow-white: #FFF9FB;
    --cultured: #EFF1F3;

    /* BLACKS */
    --rich-black: #02010A;
    --jet: #2F2F2F;

    /* GREY */
    --dark-mode-1: #252627;

    /* COLORS */
    --spanish-violet: #4A306D;
    --plum-web: #E2AFDE;
    --russian-green: #678D58;
    --moss-green: #748E54;
    --raw-sienna: #CE8147;
    --brown-sugar: #955E42;
    --rufous: #9B2915;
    --cadet-blue: #50A2A7;
    --xanadu: #73877B;
    --orange-red-crayola: #fe595d;

    /* FUNCTIONAL COLORS */
    --logo: #8BBD8B;
    --logo-dark: #6CAE75;
    --link-blue: #204bd6;
}

* {
    box-sizing: border-box;
}

html {
    line-height: 125%;
}

html, body {
    margin: 0px;
    padding: 0px;
}

body {
    --text-color: var(--rich-black);
    --bkg-color: var(--cultured);
    --container-color: var(--snow-white);
    --header-color: var(--logo);

    color: var(--text-color);
    background: var(--bkg-color);
    accent-color: var(--spanish-violet);
}

body.dark-theme {
    --text-color: var(--snow-white); 
    --bkg-color: var(--jet);
    --container-color: var(--dark-mode-1);
    --header-color: var(--logo);
}

/* https://css-tricks.com/a-complete-guide-to-dark-mode-on-the-web/ */
@media (prefers-color-scheme: dark) {                                       /*** TO DO: MORE ELEGANT SOLUTION??? ***/
    /* variables when default to dark theme */
    body {
        --text-color: var(--snow-white); 
        --bkg-color: var(--jet);
        --container-color: var(--dark-mode-1);
        --header-color: var(--logo);
    }
    body.light-theme {
        --text-color: var(--rich-black);
        --bkg-color: var(--cultured);
        --container-color: var(--snow-white);
        --header-color: var(--logo);
    }
}

.container {
    width: 1200px;
    max-width: 100%;
    margin: 0px auto 10px;
    /* background-image: linear-gradient(to right, #fe595d, #ff9999); */
    background: var(--container-color);
    font-family: <?=$font_family?>;
    font-size: <?=$font_size?>;
}

a {
    color: var(--text-color);
    font-size: 12px;
    text-decoration: none;
}

a.in-text {
    color: var(--link-blue);
}

a:hover:not(.broken-link) {
    color: darkblue;
    font-size: 12px;
    text-decoration: underline;
}

nav .top {
    padding: 15px 10px 15px 10px;
    background: var(--logo-dark);
    display: flex;
}

nav .top .left .logo {
    width: 64px;
    max-width: 100%;
    display: block;
    aspect-ratio: 1 / 1;
}

nav .top .center {
    text-align: center;
    flex:1;
}

nav .top .right {
    width: 64px;
    height: 64px;
}

button.darkmode-toggle {
    margin: 0px;
    padding: 1px 1px 3px;
    background-color: var(--jet);
    border-radius: 100%;
    border: none;
    text-align: center;
    cursor: pointer;
}

nav .links {
    margin: 0px;
    padding: 0px 10px 5px;
    background: var(--logo); 
    list-style: none;
    white-space: nowrap;
    text-align: center;
}

nav .links li {
    display: inline-block;
}

nav .links li:not(:last-child)::after{
    color: white;
    font-size: min(1em, 12px);
    content: " ✪ ";
}

.broken-link {
    text-decoration: line-through;
}

main {
    margin: 0px;
    padding: 10px 0px;
}

main .left, main .right {
    padding: 10px;
}

main p {
    margin: 10px 20px;
    text-align: justify;
    text-justify: inter-word;
}

.col {
    display: table-cell; 
    vertical-align: top;
}

.col.w-40 {
    width: 40%;
}

.row {
    width: 100%;
    display: table;
    table-layout: fixed;
}

.heading {
    background: var(--logo);
    color: white;
    padding: 2px 10px;
}

.info-box {
    border: 2px solid var(--logo);
    width: 100%;
    margin: 10px;
}

.info-box .inner {
    font-weight: bold;
}

.profile-pic {
    display: block;
    float: left;
    margin: 10px;
}

.profile-pic img {
    width: 64px;
    height: 64px;
    max-width: 100%;
    aspect-ratio: 1 / 1;
}

h1 {
    font-size: 1em;
}

p {
    font-size: 12px;
}

ul {
    margin: 5px 0px;
}

form {
    margin: 20px;
}

form p {
    margin: 10px 0px;
    font-size: 18px;
}

.password-conditions {
    font-size: 14px;
}

.msg {
    color: red;
    font-style: italic;
    margin: 0px 20px;
    font-size: 14px;
}

footer {
    margin: 10px 0px;
    padding: 10px 5px;
    color: black;
    background: var(--bkg-color);
    text-align: center;
}

<!-- font-variant: small-caps; -->
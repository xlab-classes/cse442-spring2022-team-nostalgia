<?php
/*** set the content type header ***/
/*** Without this header, it wont work ***/
header("Content-type: text/css");

$font_family = 'Verdana, sans-serif';
$font_size = '1.5em';
$border = '1px solid';
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

    --logo: #8BBD8B;
    --logo-dark: #6CAE75;
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

    color: var(--text-color);
    background: var(--bkg-color);
    accent-color: var(--spanish-violet);
}

body.dark-theme {
    --text-color: var(--snow-white); 
    --bkg-color: var(--jet);
    --container-color: var(--dark-mode-1);
}

@media (prefers-color-scheme: dark) {                                       /*** TO DO: MORE ELEGANT SOLUTION??? ***/
    /* variables when default to dark theme */
    body {
        --text-color: var(--snow-white); 
        --bkg-color: var(--jet);
        --container-color: var(--dark-mode-1);
    }
    body.light-theme {
        --text-color: var(--rich-black);
        --bkg-color: var(--cultured);
        --container-color: var(--snow-white);
    }
}

.container {
    width: 1200px;
    margin: 0px auto 10px;
    /* background-image: linear-gradient(to right, #fe595d, #ff9999); */
    background: var(--container-color);
    font-family: <?=$font_family?>;
    font-size: <?=$font_size?>;
}

nav a {
    color: var(--text-color);
    font-size: 12px;
    text-decoration: none;
}

nav a:hover {
    color: darkblue;
    font-size: 12px;
    text-decoration: underline;
}

nav .top {
    padding: 15px 10px 15px 10px;
    background: var(--logo);
    display: flex;
}

nav .top .left .logo {
    width: 64px;
    height: 64px;
}

nav .top .center {
    text-align: center;
    flex:1;
}

nav .top .right {
    width: 64px;
    height: 64px;
    display: inline-block;
}

nav .links {
    margin: 0px;
    padding: 0px 10px 5px;
    background: var(--logo-dark); 
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

main {
    margin: 0px 0px;
    padding: 10px 0px;
    font-size: 1em;
}

main p {
    margin: 10px 40px;
    text-align: justify;
    text-justify: inter-word;
}

footer {
    margin: 10px 0px;
    padding: 10px 5px;
    color: black;
    background: var(--bkg-color);
    font-size: 12px;
    text-align: center;
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

<!-- font-variant: small-caps; -->
<?php
/*** set the content type header ***/
/*** Without this header, it wont work ***/
header("Content-type: text/css");

$font_family = 'Verdana, sans-serif';
$font_size = '1.5em';
$border = '1px solid';
?>

:root {
    --cornsilk: #FEFAE0;
    --spanish-violet: #4A306D;
    --plum-web: #E2AFDE;
    --russian-green: #678D58;
    --moss-green: #748E54;
    --raw-sienna: #CE8147;
    --brown-sugar: #955E42;
    --rufous: #9B2915;
    --cadet-blue: #50A2A7;
    --xanadu: #73877B;

    --logo-color: #fe595d;

    background-color: var(--cornsilk);
    accent-color: var(--spanish-violet);
}

html {
    line-height: 125%;
}

html, body {
    margin: 0px;
    padding: 0px;
}

body {
    <!-- background-color: var(--plum-web); -->
}

.container {
    width: 1200px;
    margin: 0px auto 10px;
    /* background-image: linear-gradient(to right, #fe595d, #ff9999); */
    font-family: <?=$font_family?>;
    font-size: <?=$font_size?>;
}

nav a {
    color: white;
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
    background: var(--logo-color);
    display: flex;
}

nav .top div {
    display: inline-block;
}

nav .top .left .logo {
    margin: 0px 0px 0px 10px;
    width: 128px;
    height: 128px;
    display: inline-block;
}

nav .top .center {
    text-align: center;
    flex:1;
}

nav .links {
    margin: 0px;
    padding: 0px 10px 5px;
    background: var(--rufous); 
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
    color: black;
    background: var(--logo-color);
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
    background: var(--cornsilk);
    font-size: 12px;
    text-align: center;
}

<!-- font-variant: small-caps; -->
<?php
/**
 * Created by PhpStorm.
 * User: brigh
 * Date: 26/03/2019
 * Time: 13:57
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Opdracht 9</title>
    <style>
        html, body {
            height: 100%;
            width: 100%;
        }

        #container {
            text-align: center;
            display: inline-block;
            width: 1800px;
            height: 100px;
            background: antiquewhite;
            box-sizing: border-box;
        }

        .sub-divs {
            width: 25%;
            height: 100px;
        }

        .text, .image {
            width: 50%;
            height: 100px;
        }

        .text {
            float: left;
            background-color: aquamarine;

        }

        .image {
            float: right;
            background-color: rebeccapurple;
        }
    </style>
</head>
<body>
<h1>Populaire steden</h1>
<div id="container">
    <div class="sub-divs">
        <div class="image">

        </div>
        <div class="text">
        </div>
    </div>
    <div class="sub-divs">
        <div class="image">

        </div>
        <div class="text">
        </div>
    </div>
</div>

</body>
</html>

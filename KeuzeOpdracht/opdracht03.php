<?php
/**
 * Created by PhpStorm.
 * User: brigh
 * Date: 26/03/2019
 * Time: 10:03
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Opdracht 3</title>
    <style>
        html, body {
            height: 100%;
            width: 100%;
        }

        div.foto {
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="choose">
    <form action="opdracht03.php" method="post">
        <div>
            <label>Kies een Auto</label>
            <select name="cars[]" multiple>
                <option value="mercedes">mercedes</option>
                <option value="audi">audi</option>
                <option value="ford">ford</option>
                <option value="opel">opel</option>
                <option value="ferrari">ferrari</option>
            </select>
            <button type="submit">Verzenden</button>
        </div>
    </form>
</div>
<div class="foto">
    <?php
    $fotos = array("mercedes", "audi", "ford", "opel", "ferrari");
    foreach ($_POST["cars"] as $value) {
        foreach ($fotos as $i) {
            if ($value == $i) {
                $foto = "../resources/" . $value . ".jpg";
                echo '<img src="' . $foto . '">';
            }
        }
    }
    ?>
</div>
</body>
</html>

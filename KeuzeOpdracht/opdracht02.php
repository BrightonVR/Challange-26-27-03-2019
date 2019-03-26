<?php
/**
 * Created by PhpStorm.
 * User: brigh
 * Date: 26/03/2019
 * Time: 09:29
 */

$fotos = array("mercedes", "audi", "ford", "opel", "ferrari");

foreach ($fotos as $value) {
    if ($value == $_POST["cars"]) {
        $foto = "../resources/".$value.".jpg";
    }
}
$foto = "../resources/".$_POST["cars"].".jpg";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Opdracht 2</title>
    <style>
        html, body {
            height: 100%;
            width: 100%;
        }
        div.foto {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="choose">
    <form action="opdracht02.php" method="post">
        <div>
            <label>Kies een Auto</label>
            <select name="cars">
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
<img src='<?php echo $foto ?>'>
</div>

</body>
</html>

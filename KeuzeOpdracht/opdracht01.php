<?php
/**
 * Created by PhpStorm.
 * User: brigh
 * Date: 26/03/2019
 * Time: 08:50
 */

$color = $_POST["color_input"];
$color = strtolower($color);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Opdracht 1</title>
    <style>
        html, body {
            height: 100%;
            width: 100%;
        }
        body {
            background-color: <?php echo $color ?>;
        }
    </style>
</head>
<body>

<form action="opdracht01.php" method="post">
    <div>
        <input type="text" name="color_input" required>
        <button type="submit">verstuur</button>
    </div>

</form>
<?php echo $_POST["color_input"]; ?>

</body>

</html>

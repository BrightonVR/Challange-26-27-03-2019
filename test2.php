<?php
/**
 * Created by PhpStorm.
 * User: brigh
 * Date: 27/03/2019
 * Time: 13:27
 */

$user = "userop5";
$pass = "R0s1iVZh17gwLfik";

try {

    $dbh = new PDO('mysql:host=localhost;port=3306;dbname=challange-php-maart', $user, $pass);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$maanden = ["Januari", "Februari", "Maart", "April", "Mei", "Juni", "July", "Augustus", "September", "Oktober", "November", "December"];
$dagen = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"];
$dayAmount = 31;

foreach ($maanden as $value) {
    echo '<table class="tabels" id="' . $value . '" >';
    echo "<tr><th colspan=\"2\" class=\"months\">" . $value . "</th></tr>";
    if ($value == "Januari" or $value == "Maart" or $value == "Mei" or $value == "July" or $value == "Augustus" or $value == "Oktober" or $value == "December") {
        $dayAmount = 31;
    } elseif ($value == "Februari") {
        $dayAmount = 28;
    } else {
        $dayAmount = 30;
    }
    for ($i = 0; $i < 16; $i++) {
        echo '<tr class="basic">';
        echo '<td class="cell"> <p class="left">' . $dagen[$i] . '</p> <p class="right" id="' . $value . $dagen[$i] . '"></p> </td>';
        if (($i + 16) < $dayAmount) {
            echo '<td class="cell"> <p class="left">' . $dagen[$i + 16] . '</p> <p class="right" id="' . $value . $dagen[$i + 16] . '"></p> </td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}

$sth = $dbh->prepare('SELECT * FROM verjaardag');
$sth->execute();
//print_r($sth->fetchAll());

$data = $sth->fetchAll();

foreach ($data as $value) {
    foreach ((array)$value['id'] as $item) {
        $idvalue = $value['idvalue'];
        $naam = $value['naam'];
        $jaar = $value['jaar'];
        ?>
        <script>

            document.getElementById("<?php echo $idvalue; ?>").innerHTML = "<?php echo $naam . " Geboren op " . $jaar; ?>";


        </script>
        <?php
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        function myFunction() {
            <?php
            if (isset($_POST["naam"]) && isset($_POST["datum"])) {

            $name = $_POST["naam"];

            $date = $_POST["datum"];

            $listDate = explode('-', $date);
            $maand = $maanden[((int)$listDate[1] - 1)];
            $dag = $dagen[((int)$listDate[0] - 1)];
            ?>
            document.getElementById("<?php echo $maand . $dag; ?>").innerHTML = "<?php echo $name . " Geboren op " . $listDate[2]; ?>";
            inputData();
            <?php }?>
        }
        function inputData() {
            <?php
                if ($name =! null or "" && $date =! null or "") {
                    $sti = $dbh->prepare("INSERT INTO verjaardag (idvalue, naam, maand, dag, jaar) VALUES (:idvalue, :naam, :maand, :dag, :jaar)");
                    $idvalue = $maand . $dag;
                    $sti->bindParam(':idvalue', $idvalue);
                    $sti->bindParam(':naam', $name);
                    $sti->bindParam(':dag', $maand);
                    $sti->bindParam(':maand', $dag);
                    $sti->bindParam(':jaar', $listDate[2]);
                    $sti->execute();
                    $name = null;
                    $date = null;
                    $listDate = null;
                    $dag = null;
                    $maand = null;
                    $_POST["naam"] = null;
                    $_POST["datum"] = null;
                }
            ?>
        }

        myFunction();
    </script>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .tabels {
            border-collapse: collapse;
            border-spacing: 0;
            float: left
        }

        .tabels td {
            font-family: Arial, sans-serif;
            font-size: 14px;
            padding: 5px 5px;
            border-style: solid;
            border-width: 1px;
            overflow: hidden;
            word-break: normal;
            border-color: black;
            width: 154px
        }

        .tabels th {
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            border-style: solid;
            border-width: 1px;
            overflow: hidden;
            word-break: normal;
            border-color: black;
        }

        .cell {
            border-color: #8B86FF;
            text-align: left;
            vertical-align: top;
            height: 90px;
        }

        .months {
            border-color: #8B86FF;
            text-align: left;
            width: 329px;
            text-align: center;
            background-color: #34cdf9;
            color: white;
            font-size: large;
            font-weight: bolder
        }


        body {
            width: 1000px;
            margin: auto;
        }

        .left {
            float: left;
            width: 10%;
        }

        .right {
            width: 90%;
            text-align: right;
            position: relative;
            float: right;
        }
    </style>
</head>
<body>
<div class="form">
    <form action="test2.php" method="post">
        <label>Voer verjaardag in: </label>
        <input type="text" name="naam" value="naam">
        <input type="text" name="datum" value="DD-MM-JJJJ">
        <button type="submit" onclick="myFunction()">Leg vast</button>
    </form>
</div>
</body>
</html>


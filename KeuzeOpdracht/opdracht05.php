<?php
include "op5-include.php";

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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Opdracht 5</title>
    <link rel="stylesheet" type="text/css" href="cssop5.css">
    <script>
        function readData() {
            <?php
            $sth = $dbh->prepare('SELECT * FROM verjaardag');
            $sth->execute();
            $data = $sth->fetchAll();

            foreach ($data as $value) {
            foreach ((array)$value['id'] as $item) {
            $idvalue = $value['idvalue'];
            $naam = $value['naam'];
            $jaar = $value['jaar'];
            ?>
            document.getElementById("<?php echo $idvalue; ?>").innerHTML = "<?php echo $naam . " Geboren in " . $jaar; ?>";
            <?php
            }
            }
            ?>
        }

    </script>
</head>
<body>

<div class="form">
    <form action="opdracht05.php" method="post">
        <label>Voer verjaardag in: </label>
        <input type="text" name="naam" value="naam">
        <input type="text" name="datum" value="DD-MM-JJJJ">
        <button type="submit">Leg vast</button>
    </form>
</div>

<?php
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

?>
<script>
    readData();
</script>
<?php w2db(); ?>

</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: brigh
 * Date: 29/03/2019
 * Time: 17:05
 */


function w2db()
{
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

    if (isset($_POST['naam']) && isset($_POST['datum'])) {

//        $name = $_POST["naam"];

        $date = $_POST["datum"];

        $listDate = explode('-', $date);
        $maand = $maanden[((int)$listDate[1] - 1)];
        $dag = $dagen[((int)$listDate[0] - 1)];
        $idvalue = $maand . $dag;
        ?>
        <script>
            document.getElementById("<?php echo $maand . $dag; ?>").innerHTML = "<?php echo $_POST['naam'] . " Geboren op " . $listDate[2]; ?>";
        </script>
    <?php }
    $stj = $dbh->prepare('SELECT * FROM verjaardag WHERE idvalue = :idvalue AND naam = :naam AND jaar = :jaar');
    $stj->bindParam(':idvalue', $idvalue);
    $stj->bindParam(':naam', $_POST['naam']);
    $stj->bindParam(':jaar', $listDate[2]);
    $stj->execute();
    echo "Test1";
    if ($stj->rowCount() > 0) {
        echo "Bestaat al";
    } else {
        if ($name = !null or "" && $date = !null or "") {
            $sti = $dbh->prepare("INSERT INTO verjaardag (idvalue, naam, maand, dag, jaar) VALUES (:idvalue, :naam, :maand, :dag, :jaar)");
            $idvalue = $maand . $dag;
            $sti->bindParam(':idvalue', $idvalue);
            $sti->bindParam(':naam', $_POST['naam']);
            $sti->bindParam(':maand', $maand);
            $sti->bindParam(':dag', $dag);
            $sti->bindParam(':jaar', $listDate[2]);
            $sti->execute();

        }
    }
}
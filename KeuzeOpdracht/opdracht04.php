<?php
/**
 * Created by PhpStorm.
 * User: brigh
 * Date: 26/03/2019
 * Time: 11:26
 */

$auto = array(
    array("DT-LT-87", "Citroen", "XM", "1999-09-23", "34500"),
    array("GF-NX-07", "Volkswagen", "Polo", "1999-07-12", "78000"),
    array("GF-PD-34", "Volkswagen", "Polo", "1999-07-22", "57500"),
    array("KR-RT-65", "Volkswagen", "Golf", "1999-08-08", "42000"),
    array("PT-ER-45", "Ford", "Fiesta", "1999-08-08", "25000"),
    array("TT-PR-73", "Citroen", "XM", "1999-03-02", "1200"),
    array("TT-RW-01", "Volkswagen", "Polo", "1999-11-14", "4500"),
);

echo "<table border='1'>";
echo "<tr>" . "<td>Kenteken</td>" . "<td>Merk</td>" . "<td>Type</td>" . "<td>DatumAPK</td>" . "<td>Kilometerstand</td>" . "</tr>";
for ($row = 0; $row < 7; $row++) {
    echo "<tr>";
    for ($col = 0; $col < 5; $col++) {
        echo "<td>". $auto[$row][$col] . "</td>";
    }
    echo "</tr>";
}
echo "</tr>";


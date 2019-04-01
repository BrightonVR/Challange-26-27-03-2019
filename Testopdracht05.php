<?php
/**
 * Created by PhpStorm.
 * User: brigh
 * Date: 27/03/2019
 * Time: 12:26
 */


$maand = 0;
$maanden = ["Januari", "Februari", "Maart", "April", "Mei", "Juni", "July", "Augustus", "September", "Oktober", "November", "December"];




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Opdracht test 5</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="cssop5.css">
</head>
<body>

<?php foreach ($maanden as $value): $maand++; ?>
    <table class="maand<?php echo $maand; ?>">
        <tr>
            <th colspan="2" class="months"><?php echo $maanden[$maand - 1]; ?></th>
        </tr>
        <tr>
            <td class="numberCell"> <p class="test1">1</p><p class="test2"> Test </p></td>
            <td class="numberCell"><p class="test1">17</p><p class="test2"> Test2 </p></td>
        </tr>
        <tr>
            <td class="numberCell">2</td>
            <td class="numberCell">18</td>
        </tr>
        <tr>
            <td class="numberCell">3</td>
            <td class="numberCell">19</td>
        </tr>
        <tr>
            <td class="numberCell">4</td>
            <td class="numberCell">20</td>
        </tr>
        <tr>
            <td class="numberCell">5</td>
            <td class="numberCell">21</td>
        </tr>
        <tr>
            <td class="numberCell">6</td>
            <td class="numberCell">22</td>
        </tr>
        <tr>
            <td class="numberCell">7</td>
            <td class="numberCell">23</td>
        </tr>
        <tr>
            <td class="numberCell">8</td>
            <td class="numberCell">24</td>
        </tr>
        <tr>
            <td class="numberCell">9</td>
            <td class="numberCell">25</td>
        </tr>
        <tr>
            <td class="numberCell">10</td>
            <td class="numberCell">26</td>
        </tr>
        <tr>
            <td class="numberCell">11</td>
            <td class="numberCell">27</td>
        </tr>
        <tr>
            <td class="numberCell">12</td>
            <td class="numberCell">28</td>
        </tr>
        <tr>
            <td class="numberCell">13</td>
            <?php if ($maand != 2) {
                echo '<td class="numberCell">29</td>';
            }
            ?>
        </tr>
        <tr>
            <td class="numberCell">14</td>
            <?php if ($maand != 2) {
                echo '<td class="numberCell">30</td>';
            }
            ?>
        </tr>
        <tr>
            <td class="numberCell">15</td>
            <?php if ($maand != 2 && $maand != 4 && $maand != 6 && $maand != 9 && $maand != 11) {
                echo '<td class="numberCell">31</td>';
            }
            ?>
        </tr>
        <tr>
            <td class="numberCell">16</td>

        </tr>
    </table>
<?php endforeach; ?>
</body>
</html>




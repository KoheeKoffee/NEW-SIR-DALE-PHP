<!DOCTYPE HTML>
<html>
<head></head>
<body>
<form method="post" action="">
    Traveler Name<br>
    <input type="text" name="name" required><br><br>

    Destination<br>
    <select name="destination">
        <option value="Boracay">Boracay ₱3500</option>
        <option value="Palawan">Palawana ₱4000</option>
        <option value="Cebu">Cebu ₱3000</option>
        <option value="Baguio">Baguio ₱2500</option>
    </select><br><br>

    Number of Traveler<br>
    <input type="number" name="num" required><br><br>

    Number of Days<br>
    <input type="number" name="days" required><br><br>

    Date<br>
    <input type="date" name="date" required><br><br>
    
    Add-ons<br>
    <input type="checkbox" id="h" name="addons[]" value="Hotel">
    <label for="h">Hotel ₱2000/night</label><br>
    <input type="checkbox" id="b" name="addons[]" value="Breakfast">
    <label for="b">Breakfast ₱300/day</label><br>
    <input type="checkbox" id="t" name="addons[]" value="Tour Guide">
    <label for="t">Tour Guide ₱800/day</label><br><br>
    <input type="submit" name="submit" value="submit"><br><br>
</form>
</body>
<?php
if(isset($_POST["submit"])) {
    $name = $_POST["name"];
    $place = $_POST["destination"];
    $people = $_POST["num"];
    $days = $_POST["days"];
    $date = $_POST["date"];
    $addons = $_POST["addons"] ?? [];
    $a_list = implode(", ", $addons);

    switch($place) {
        case 'Boracay': $cost = 3500; break;
        case 'Palawan': $cost = 4000; break;
        case 'Cabu': $cost = 3000; break;
        case 'Baguio': $cost = 2500; break;
    }

    $addons_p = [
        "Hotel" => 2000,
        "Breakfast" => 300,
        "Tour Guide" => 800
    ];

    $a_total = 0;
    foreach($addons as $a){
        $a_total += $addons_p[$a] * $days * $people;
    }
    $b_cost = ($cost * $days) * $people;
    $total = $b_cost + $a_total;

    echo "
    <table border='1' cellpadding='10'>
    <tr><td>Traveler Name</td><td>$name</td></tr>
    <tr><td>Destination</td><td>$place</td></tr>
    <tr><td>Number of Travelers</td><td>$people</td></tr>
    <tr><td>Number of Days</td><td>$days days</td></tr>
    <tr><td>Departure Date</td><td>$date</td></tr>
    <tr><td>Add-ons Selected</td><td>$a_list</td></tr>
    <tr><td>Base Travel Cost</td><td>₱$b_cost</td></tr>
    <tr><td>Addon Total</td><td>₱$a_total</td></tr>
    <tr><td>Final Total</td><td>₱$total</td></tr>
    </table>
    ";
}
?>
</html>
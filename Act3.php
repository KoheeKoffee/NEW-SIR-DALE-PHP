<!DOCTYPE HTML>
<html>
<head></head>
<body>
<form method="post" action="">
    Customer Name<br>
    <input type="text" name="name" required><br><br>

    Item<br>
    <select name="item">
        <option value="Mug">Mug  ₱120</option>
        <option value="Shirt">Shirt  ₱250</option>
        <option value="Hoodie">Hoddie  ₱450</option>
        <option value="Water Bottle">Water Bottle  ₱180</option>
    </select><br><br>

    Quantity<br>
    <input type="number" name="quantity" required><br><br>

    Item Color<br>
    <input type="color" name="color"><br><br>

    Shipping Region<br>
    <input type="radio" id="mm" name="region" value="Metro Manila">
    <label for="mm">Metro Manila  ₱50</label><br>
    <input type="radio" id="l" name="region" value="Luzon">
    <label for="l">Luzon  ₱100</label><br>
    <input type="radio" id="v" name="region" value="Visayas">
    <label for="v">Visayas  ₱250</label><br>
    <input type="radio" id="m" name="region" value="Mindanao">
    <label for="m">Mindanao  ₱200</label><br><br>

    Add-ons<br>
    <input type="checkbox" id="gw" name="addons[]" value="Gift Wrap">
    <label for="gw">Gift Wrap ₱25</label><br>
    <input type="checkbox" id="ed" name="addons[]" value="Express Delivery">
    <label for="ed">Express Delivery ₱100</label><br>
    <input type="checkbox" id="in" name="addons[]" value="Insurance">
    <label for="in">Insurance ₱50</label><br><br>

    <input type="submit" name="submit" value="submit"><br><br>
</form>
<?php
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $item = $_POST["item"];
    $qua = $_POST["quantity"];
    $region = $_POST["region"];
    $addons = $_POST["addons"] ?? [];
    $a_list = implode(", ", $addons);

    switch($item){
        case 'Mug': $price = 120; break;
        case 'Shirt': $price = 250; break;
        case 'Hoodie': $price = 450; break;
        case 'Water Bottle': $price = 180; break;
    }

    switch($region){
        case 'Metro Manila': $ship = 50; break;
        case 'Luzon': $ship = 100; break;
        case 'Visayas': $ship = 150; break;
        case 'Mindanao': $ship = 200; break;
    }

    $addons_p = [
        "Gift Wrap" => 25,
        "Express Delivery" => 100,
        "Insurance" => 50
    ];

    $a_total = 0;
    foreach($addons as $a){
        $a_total += $addons_p[$a];
    }

    $subtotal = $price * $qua;
    $total = $a_total + $subtotal + $ship;

    echo "
    <table border='1'>
    <tr><td>Customer Name</td><td>$name</td></tr>
    <tr><td>Item</td><td>$item</td></tr>
    <tr><td>Quantity</td><td>$qua</td></tr>
    <tr><td>Shipping Region</td><td>$region</td></tr>
    <tr><td>Add-ons</td><td>$a_list</td></td>
    <tr><td>Item Subtotal</td><td>₱$subtotal</td></tr>
    <tr><td>Shipping Cost</td><td>₱$ship</td></tr>
    <tr><td>Add-ons Total</td><td>₱$a_total</td></tr>
    <tr><td>Final Total</td><td>₱$total</td></tr>
    </table>
    ";

}

?>
</body>

</html>
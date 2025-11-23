<!DOCTYPE HTML>
<html>
<head></head>
<body>
<form method="post" action="">
    Restaurant Name<br>
    <input type="text" name="name" required><br><br>

    Date<br>
    <input type="date" name="date"><br><br>

    Number of People<br>
    <input type="number" name="people" required><br><br>

    Food Total<br>
    <input type="number" name="food" required><br><br>

    Drink Total<br>
    <input type="number" name="drink" required><br><br>

    Has Senior Discount?<br>
    <input type="checkbox" id="s" name="ans" value="Yes">
    <label for="s">Yes</label><br><br>

    <input type="submit" name="submit" value="submit"><br><br>
</form>
<?php
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $people = $_POST["people"];
    $food = $_POST["food"];
    $drink = $_POST["drink"];
    $subtotal = $food + $drink;
    if(isset($_POST["ans"])){
        $discount = $subtotal * 0.20;
        $a_discount = $subtotal - $discount;
        $fee = $a_discount * 0.10;
        $total = $a_discount + $fee;
        $p_fee = $total / $people;
    } else {
        $discount = 0;
        $a_discount = $subtotal - $discount;
        $fee = $a_discount * 0.10;
        $total = $subtotal + $fee;
        $p_fee = $total / $people;
    }

    echo "
    <table border='1' cellpading='10'>
    <tr><td>Restaurant Name</td><td>$name</td></tr>
    <tr><td>Number of People</td><td>$people</td></tr>
    <tr><td>Food + Drink Total</td><td>₱$subtotal</td></tr>
    <tr><td>Senior Discount</td><td>-₱$discount</td></tr>
    <tr><td>After Discount</td><td>₱$a_discount</td></tr>
    <tr><td>Service Charge</td><td>₱$fee</td></tr>
    <tr><td>Total Bill</td><td>₱$total</td></tr>
    <tr><td>Per Person</td><td>₱$p_fee</td></tr>
    </table>
    ";

}
?>
</body>
</html>
<!DOCTYPE HTML>
<html>
<head></head>
<body>
<form method="post" action="">
    Budget Name<br>
    <input type="text" name="name" required><br><br>

    Month<br>
    <input type="date" name="date"><br><br>

    Monthly Income<br>
    <input type="number" name="inc" reuqired><br><br>

    Food Expense<br>
    <input type="number" name="food" required><br><br>

    Transport Expense<br>
    <input type="number" name="transpo" required><br><br>

    Shopping Expense<br>
    <input type="number" name="shop" required><br><br>

    Saving Goals (%)
    <input type="range" name="goal" min=10 max=50><br><br>

    <input type="submit" name="submit" value="calculate"><br><br>
</form>
<?php
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $money = $_POST["inc"];
    $food = $_POST["food"];
    $transpo = $_POST["transpo"];
    $shop = $_POST["shop"];
    $goal = $_POST["goal"];

    $exp = $food + $transpo + $shop;
    $target = $money * ($goal / 100);
    $remaining = $money - $exp;
    $status = $target - $remaining;
    if($remaining < $target){
        $missing = $target - $remaining;
        $status = "Short by ₱$missing ";
    } else {
        $extra = $remaining - $target;
        $status = "Goal Met and extra ₱$extra ";
    }

    echo "
    <table border='1' cellpadding='10'>
    <tr><td>Budget Name</td><td>$name</td></tr>
    <tr><td>Monthly Income</td><td>$money</td></tr>
    <tr><td>Total Expenses</td><td>$exp</td></tr>
    <tr><td>Savings Goals</td><td>$goal%</td></tr>
    <tr><td>Target Savings</td><td>$target</td></tr>
    <tr><td>Remaining Balance</td><td>$remaining</td></tr>
    <tr><td>Saving Status</td><td>$status</td></tr>
    ";
}
?>
</body>
</html>
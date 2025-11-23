<!DOCTYPE HTML>
<html>
<head>

</head>
<h2>Event Registration with Group Discount</h2>
<body>
<form method="post" action="">
    Full Name<br>
    <input type="text" name="name" required><br><br>

    Email<br>
    <input type="email" name="email" required><br><br>

    Contact<br>
    <input type="tel" id="phone" name="contact" required><br><br>

    Event Date<br>
    <input type="date" name="date" required><br><br>

    Event Time<br>
    <input type="time" name="time" required><br><br>

    Number of Attendees<br>
    <input type="number" name="people" required><br><br>

    Ticket Type<br>
    <select name="ticket">
        <option value="Regular">Regular ₱300</option>
        <option value="VIP">VIP ₱600</option>
        <option value="Student">Student ₱200</option>
    </select><br><br>

    Gender<br>
    <input type="radio" id="m" name="gender" value="Male">
    <label for="m">Male</label><br>
    <input type="radio" id="f" name="gender" value="Female">
    <label for="f">Female</label><br><br>

    Add-ons<br>
    <input type="checkbox" id="s" name="addons[]" value="Snack">
    <label for="s">Snack ₱50</label><br>
    <input type="checkbox" id="t" name="addons[]" value="T-shirt">
    <label for="t">T-shirt ₱150</label><br>
    <input type="checkbox" id="b" name="addons[]" value="Backstage Pass">
    <label for="b">Backstage Pass ₱300</label><br><br>

    <input type="submit" name="submit" value="submit"><br><br>
</form>
<?php
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $attendees = $_POST["people"];
    $ticket = $_POST["ticket"];
    $gender = $_POST["gender"];
    $addons = $_POST["addons"] ?? [];
    $a_list = implode(", ", $addons);

    switch($ticket){
        case 'Regular': $price = 300; break;
        case 'VIP': $price = 600; break;
        case 'Student': $price = 200; break;
    }

    $subtotal = $price * $attendees;
    if($attendees > 5) {
        $discount = $subtotal * 0.10;
    } else {
        $discount = 0;
    }

    $addons_price = [
        "Snack" => 50,
        "T-Shirt" => 150,
        "Backstage Pass" => 300
    ];

    $a_total = 0;
    foreach($addons as $a){
        $a_total += $addons_price[$a] * $attendees;
    }
    $total = $a_total + $subtotal - $discount;



    echo "
    <table border='1' cellpadding='10'>
    <tr><td>Full Name</td><td>$name</td></tr>
    <tr><td>Email</td><td>$email</td></tr>
    <tr><td>Number of Attendees</td><td>$attendees</td></tr>
    <tr><td>Ticket Type</td><td>$ticket</td></tr>
    <tr><td>Add-ons</td><td>$a_list</td></tr>
    <tr><td>Subtotal</td><td>₱$subtotal</td></tr>
    <tr><td>Group Discount</td><td>-₱$discount</td></tr>
    <tr><td>Add-ons Total</td><td>₱$a_total</td></tr>
    <tr><td>Final Total</td><td>₱$total</td></tr>
    </table>
    ";
}
?>
</body>
<html>
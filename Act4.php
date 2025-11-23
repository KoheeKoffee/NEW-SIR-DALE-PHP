<!DOCTYPE HTML>
<html>
<head></head>
<body>
<form method="post" action="">
    Fullname<br>
    <input type="text" name="name" required><br><br>

    Birthdate<br>
    <input type="date" name="bdate" required><br><br>

    Weight (kg)<br>
    <input type="number" name="weight" required><br><br>

    Height (cm)<br>
    <input type="number" name="height" required><br><br>

    Acitivty Level<br>
    <input type="radio" id="s" name="level" value="Sedentary">
    <label for="s">Sedentary</label><br>
    <input type="radio" id="m" name="level" value="Moderate">
    <label for="m">Moderate</label><br>
    <input type="radio" id="a" name="level" value="Active">
    <label for="a">Active</label><br><br>

    <input type="submit" name="submit" value="submit"><br><br>

</form>
<?php
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $date = new DateTime();
    $bdate = new DateTime($_POST["bdate"]);
    $c_age = $date->diff($bdate);
    $age = $c_age->y;
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    $level = $_POST["level"];
    $BMI = $weight / ($height * $height) * 10000;
    $BMI = number_format($BMI, 1);
    if($BMI < 18.5){
        $category = "Underweight";
    } elseif($BMI < 24.9) {
        $category = "Normal";
    } elseif($BMI < 29.9) {
        $category = "Overweight";
    } else {
        $category = "Obsese";
    }
    echo "
    <table border='1' cellpadding='10'>
    <tr><td>Full Name</td><td>$name</td></tr>
    <tr><td>Age</td><td>$age</td></tr>
    <tr><td>Weight</td><td>$weight</td></tr>
    <tr><td>Height</td><td>$height</td></tr>
    <tr><td>BMI</td><td>$BMI</td></tr>
    <tr><td>BMI Cateogry</td><td>$category</td></tr>
    <tr><td>Activity Level</td><td>$level</td></tr>
    </table>
    ";
}
?>
</body>
</html>
<!DOCTYPE HTML>
<html>
<head></head>
<body>
<form method="post" action="">
    Student Name<br>
    <input type="text" name="name" required><br><br>

    Student ID<br>
    <input type="text" name="stid" required><br><br>

    Program<br>
    <select name="program">
        <option value="BS Computer Science">BS Computer Science</option>
        <option value="BS Nursing">BS Nursing</option>
        <option value="BS Business">BS Business</option>
</select><br><br>

    Year Level<br>
    <input type="radio" id="1" name="year" value="1st year">
    <label for="1">1st Year</label><br>
    <input type="radio" id="2" name="year" value="2nd year">
    <label for="2">2nd Year</label><br>
    <input type="radio" id="3" name="year" value="3rd year">
    <label for="3">3rd Year</label><br>
    <input type="radio" id="4" name="year" value="4th year">
    <label for="4">4th Year</label><br><br>

    Number of Units<br>
    <input type="number" name="units" required><br><br>

    Has Scholarship?<br>
    <input type="checkbox" id="s" name="ans" value="Yes">
    <label for="s">Yes</label><br><br>

    <input type="submit" name="submit" value="submit"><br><br>
    
</form>
<?php
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $id = $_POST["stid"];
    $program = $_POST["program"];
    $year = $_POST["year"];
    $units = $_POST["units"];
    switch($program){
        case 'BS Computer Science': $rate = 1800; break;
        case 'BS Nursing': $rate = 2000; break;
        case 'BS Business': $rate = 1600; break;
    }

    $tuition = $rate * $units;
    if(isset($_POST["ans"])){
        $discount = $tuition * 0.20;
    } else {
        $discount = 0;
    }

    switch($year){
        case '1st year': $misc = 5000; break;
        case '2nd year': $misc = 4500; break;
        case '3rd year': $misc = 4000; break;
        case '4th year': $misc = 4000; break;
    }

    $a_scho = $tuition - $discount;
    $total = $a_scho + $misc;

    echo "
    <table border='1' cellpadding='10'>
    <tr><td>Student Name</td><td>$name</td></tr>
    <tr><td>Student Number</td><td>$id</td></tr>
    <tr><td>Program</td><td>$program</td></tr>
    <tr><td>Year Level</td><td>$year</td></tr>
    <tr><td>Number of Units</td><td>$units</td></tr>
    <tr><td>Base Tuition</td><td>₱$tuition</td></tr>
    <tr><td>Scholarship Discount</td><td>-₱$discount</td></tr>
    <tr><td>After Scholarship</td><td>₱$a_scho</td></tr>
    <tr><td>Miscellaneous Fee</td><td>₱$misc</td></tr>
    <tr><td>Total Enrollment Fee</td><td>₱$total</td></tr>
    </table>
    ";
}
?>
</body>
</html>
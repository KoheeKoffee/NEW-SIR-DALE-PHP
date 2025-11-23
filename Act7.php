<!DOCTYPE HTML>
<html>
<head></head>
<body>
<form method="post" action="">
    Borrower Name<br>
    <input type="text" name="name" required><br><br>

    Loan Amount<br>
    <input type="number" name="loan" required><br><br>

    Annual Interest (%)<br>
    <input type="number" name="int" required><br><br>

    Loan Term (months)<br>
    <input type="number" name="term" required><br><br>

    Has Processing Fee?<br>
    <input type="checkbox" id="y" name="ans" value="Yes">
    <label for="y">Yes</label><br><br>

    <input type="submit" name="submit" value="submit"><br><br>
</form>
<?php
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $loan = $_POST["loan"];
    $int = $_POST["int"];
    $term = $_POST["term"];
    if(isset($_POST["ans"])){
        $fee = $loan * 0.02;
    } else {
        $fee = 0;
    }

    $m_int = ($int * 0.01) / 12;
    $i_total = $loan * $m_int * $term;
    $total_a = $loan + $i_total;
    $m_pay = ($total_a + $fee) / $term;

    echo "
    <table border='1' cellpadding='10'>
    <tr><td>Borrower Name</td><td>$name</td></tr>
    <tr><td>Loan Amoung</td><td>₱$loan</td></tr>
    <tr><td>Interest Rate</td><td>$int% per year</td></tr>
    <tr><td>Loan Term</td><td>$term months</td></tr>
    <tr><td>Total Interest</td><td>₱$i_total</td></tr>
    <tr><td>Processin Fee</td><td>₱$fee</td></tr>
    <tr><td>Total Amount to Pay</td><td>₱$total_a</td></tr>
    <tr><td>Monthly Payment</td><td>₱$m_pay</td></tr>
    </table>
    ";
}
?>
</body>
</html>
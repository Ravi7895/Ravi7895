<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "step_form";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert student details
$sql = "INSERT INTO students (roll_number, name, fathers_name, mothers_name, adhar, course, mobile, course_fee, paid_fee, remaining_fee, address) 
        VALUES ('".$_SESSION['roll_number']."', '".$_SESSION['name']."', '".$_SESSION['fathers_name']."', '".$_SESSION['mothers_name']."', '".$_SESSION['adhar']."', 
                '".$_SESSION['course']."', '".$_SESSION['mobile']."', '".$_SESSION['course_fee']."', '".$_SESSION['paid_fee']."', '".$_SESSION['remaining_fee']."', 
                '".$_SESSION['address']."')";

if ($conn->query($sql) === TRUE) {
    $student_id = $conn->insert_id;

    // Insert installment details
    for ($i = 0; $i < count($_POST['installment_number']); $i++) {
        $installment_number = $_POST['installment_number'][$i];
        $amount = $_POST['amount'][$i];
        $date = $_POST['date'][$i];

        $installment_sql = "INSERT INTO installments (student_id, installment_number, amount, date) 
                            VALUES ('$student_id', '$installment_number', '$amount', '$date')";
        $conn->query($installment_sql);
    }

    echo "Data inserted successfully.";
    session_destroy();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

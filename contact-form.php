<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

// Create DB connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form submitted
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $mob = $_POST['mob'];
    $subject = $_POST['subject'];
    $budget = $_POST['budget'];
    $message = $_POST['message'];

    $query = "INSERT INTO client (fname, email, mob, subject, budget, message) 
              VALUES ('$fname','$email','$mob','$subject','$budget','$message')";

    $data = mysqli_query($conn, $query);

    if ($data) {
        // Show a success message
        echo "<script>
                alert('✅ Message sent successfully!');
                window.location.href = 'index.php'; // change this to your main page
              </script>";
    } else {
        echo "<script>
                alert('❌ Failed to send message. Try again.');
                window.history.back();
              </script>";
    }
}

if (isset($_POST['submit2'])) {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $mob = $_POST['mob'];
    $service = $_POST['service'];
    $message = $_POST['message'];

    $query = "INSERT INTO clients (fname, email, mob, service,  message) 
              VALUES ('$fname','$email','$mob','$service','$message')";

    $data = mysqli_query($conn, $query);

    if ($data) {
        // Show a success message
        echo "<script>
                alert('✅ Message sent successfully!');
                window.location.href = 'index.php'; // change this to your main page
              </script>";
    } else {
        echo "<script>
                alert('❌ Failed to send message. Try again.');
                window.history.back();
              </script>";
    }
}

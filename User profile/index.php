<?php
// Database connection parameters
$hostname = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "user_profile"; // Your database name

// Create a database connection
$connection = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Initialize variables to store form data
$firstName = $lastName = $email = $dob = $gender = $phone = $country = $city = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $country = $_POST["country"];
    $city = $_POST["city"];

    // Insert the data into the database
    $sql = "INSERT INTO user_data (firstName, lastName, email, dob, gender, phone, country, city)
            VALUES ('$firstName', '$lastName', '$email', '$dob', '$gender', '$phone', '$country', '$city')";
            

    if ($connection->query($sql) === true) {
        // Data inserted successfully
        $message = "Personal details updated successfully!";
    } else {
        // Error occurred
        $message = "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Close the database connection
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Update Personal Details</title>
    <script>
        function validatePhoneNumber() {
            var phoneNumber = document.getElementById("phone").value;
            var phoneNumberPattern = /^\d{10}$/;

            if (phoneNumberPattern.test(phoneNumber)) {
                document.getElementById("error-message").style.display = "none";
            } else {
                document.getElementById("error-message").style.display = "block";
            }
        }
    </script>
</head>
<body>
<div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
</div>
<div class="container">
    <h1>Update Personal Details</h1>
    <?php if (isset($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form id="updateForm" method="post">
        <label for="firstName">First Name</label>
        <input type="text" id="firstName" name="firstName" required>

        <label for="lastName">Last Name</label>
        <input type="text" id="lastName" name="lastName" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" required>

        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
            <option value="m">Male</option>
            <option value="f">Female</option>
            <option value="o">Other</option>
        </select>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" maxlength="10" oninput="validatePhoneNumber()">
        <p id="error-message" style="color: red; display: none;">Please enter a valid 10-digit phone number.</p>

        <label for="country">Country</label>
        <input type="text" id="country" name="country" required>

        <label for="city">City</label>
        <input type="text" id="city" name="city" required>
        <center>
            <button type="submit">Update Details</button>
        </center>
    </form>
</div>
</body>
</html>
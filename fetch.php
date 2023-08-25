<?php
// ... (database connection and data insertion code)

// Check if the user data exists in the database
$sql = "SELECT * FROM user_data WHERE email = '$email'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
} else {
    $user_data = array(); // Initialize an empty array if user data not found
}

// ... (closing connection and other code)
?>

<!-- ... (HTML form and other elements) -->

<!-- Pre-fill Form Fields with User Data -->
<input type="text" id="firstName" name="firstName" required value="<?php echo $user_data["firstName"]; ?>">
<input type="text" id="lastName" name="lastName" required value="<?php echo $user_data["lastName"]; ?>">
<input type="email" id="email" name="email" required value="<?php echo $user_data["email"]; ?>">
<input type="date" id="dob" name="dob" required value="<?php echo $user_data["dob"]; ?>">
<input type="enum" id="gender" name="gender" required value="<?php echo $user_data["gender"]; ?>">
<input type="text" id="phone" name="phone" required value="<?php echo $user_data["phone"]; ?>">
<input type="text" id="country" name="country" required value="<?php echo $user_data["country"]; ?>">
<input type="text" id="city" name="city" required value="<?php echo $user_data["city"]; ?>">
<!-- Repeat this for other form fields, pre-filling them with the corresponding user data -->

<!-- ... (rest of the HTML form and other elements) -->

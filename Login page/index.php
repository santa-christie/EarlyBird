<!-- 
<?php
	// Database connection parameters
	$hostname = "localhost"; // Change this if your MySQL server is hosted elsewhere
	$username = "root"; // Your MySQL username
	$password = ""; // Your MySQL password
	$database = "userdb"; // Your database name
	
	// Create a database connection
	$connection = new mysqli($hostname, $username, $password, $database);
	
	// Check the connection
	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
	}
	
	// Handle form submissions here (e.g., INSERT data into the database)
	
	// Close the database connection
	$connection->close();
	?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BERSERK</title>
    <script src="https://kit.fontawesome.com/8c8ed90c09.js" crossorigin="anonymous"></script>
</head>
<body>    
    	

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="https://www.facebook.com/login/" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="https://accounts.google.com/v3/signin/identifier?continue=https%3A%2F%2Faccounts.google.com%2F&followup=https%3A%2F%2Faccounts.google.com%2F&ifkv=AXo7B7WCWKQZ7HR_1dRqCnFFmaohwYIqnTmh0HMOs9klUkpB4yl3Ey6gLeqJC_D8LNshMoldK276cA&passive=1209600&flowName=GlifWebSignIn&flowEntry=ServiceLogin&dsh=S956633529%3A1692683293522169" class="social"><i class="fa-brands fa-google"></i></a>
				<a href="https://www.linkedin.com/login" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="https://www.facebook.com/login/" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="https://accounts.google.com/v3/signin/identifier?continue=https%3A%2F%2Faccounts.google.com%2F&followup=https%3A%2F%2Faccounts.google.com%2F&ifkv=AXo7B7WCWKQZ7HR_1dRqCnFFmaohwYIqnTmh0HMOs9klUkpB4yl3Ey6gLeqJC_D8LNshMoldK276cA&passive=1209600&flowName=GlifWebSignIn&flowEntry=ServiceLogin&dsh=S956633529%3A1692683293522169" class="social"><i class="fa-brands fa-google"></i></a>
				<a href="https://www.linkedin.com/login" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>



<script>
        const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
    </script>
    </body>
    </html> -->
    <?php
// Database connection parameters
$hostname = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "userdb"; // Your database name

// Create a database connection
$connection = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Initialize variables for form data
$name = $email = $password = "";

// Handle sign-up form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["signup"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($connection->query($sql) === true) {
        // Sign-up successful, you can redirect to a success page
        header("Location: login_success.php");
        exit();
    } else {
        // Sign-up failed, handle the error
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Handle sign-in form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["signin"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT id, name, password FROM users WHERE email='$email'";
    $result = $connection->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Sign-in successful, you can set session variables and redirect
            header("Location: dasboard.php");
            exit();
        } else {
            // Incorrect password
            echo "Incorrect email or password.";
        }
    } else {
        // User not found
        echo "User not found.";
    }
}

// Close the database connection
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Early Bird</title>
    <script src="https://kit.fontawesome.com/8c8ed90c09.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container" id="container">
    <!-- Rest of your HTML code for the sign-up and sign-in forms -->
    
<div class="form-container sign-up-container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h1>Create Account</h1>
        <div class="social-container">
            <!-- Social media links -->
        </div>
        <span>or use your email for registration</span>
        <input type="text" name="name" placeholder="Name" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit" name="signup">Sign Up</button>
    </form>
</div>

<div class="form-container sign-in-container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h1>Sign in</h1>
        <div class="social-container">
            <!-- Social media links -->
        </div>
        <span>or use your account</span>
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <a href="#">Forgot your password?</a>
        <button type="submit" name="signin">Sign In</button>
    </form>
</div>

	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<script>
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});
</script>
</body>
</html>

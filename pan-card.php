<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    die("You must be logged in to update PAN card information.");
}

// Database credentials
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "ashis";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the username from the session
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
if (empty($username)) {
    die("Username is not set in the session.");
}

// Fetch the user_id using the username
$sql = "SELECT id FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $user_id = $user['id'];
} else {
    die("User not found.");
}
$stmt->close();

// Initialize $pan_info variable
$pan_info = null;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form inputs
    $pan_number = isset($_POST['pan_number']) ? $conn->real_escape_string($_POST['pan_number']) : '';
    $pan_name = isset($_POST['pan_name']) ? $conn->real_escape_string($_POST['pan_name']) : '';

    if (empty($pan_number) || empty($pan_name)) {
        $message = "Please fill in all required fields.";
    } else {
        // Prepare and execute SQL statement
        $stmt = $conn->prepare("REPLACE INTO pan_card_info (user_id, pan_number, pan_name) VALUES (?, ?, ?)");
        if (!$stmt) {
            die("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("iss", $user_id, $pan_number, $pan_name);
        if ($stmt->execute()) {
            $message = "PAN card information updated successfully.";
        } else {
            $message = "Error updating PAN card information: " . $stmt->error;
        }
        $stmt->close();
    }
}

// Fetch existing PAN card information
$sql = "SELECT * FROM pan_card_info WHERE user_id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $pan_info = $result->fetch_assoc();
}
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAN Card Information</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .message {
            color: #d9534f;
            margin-bottom: 20px;
        }
        .card{
            margin-left:1px;

        }
    </style>
</head>
<body>
    <h1>PAN Card Information</h1>

    <?php if (isset($message)): ?>
        <p class="message"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <div class="form-container">
        <form class="card" action="pan-card.php" method="post">
            <label for="pan_number">PAN Number:</label>
            <input type="text" id="pan_number" name="pan_number" value="<?php echo htmlspecialchars($pan_info['pan_number'] ?? ''); ?>" required>
            
            <label for="pan_name">PAN Name:</label>
            <input type="text" id="pan_name" name="pan_name" value="<?php echo htmlspecialchars($pan_info['pan_name'] ?? ''); ?>" required>
            
            <input type="submit" value="Update PAN Information">
        </form>
    </div>
</body>
<footer class="section-p1">
    <div class="col">
        <img class="logo1" src="Ecmerse photos/smalllogo.png" alt="Company Logo">
        <h4>Contact</h4>
        <p><strong>Address:</strong> Cuttack, Odisha, near Chandi Temple</p>
        <p><strong>Hours:</strong> 10:00-18:00, Mon-Sat</p>
        <div class="follow">
            <h4>Follow Us</h4>
            <div class="icon">
                <a href="https://facebook.com/AshisKumarRout" target="_blank" title="Facebook"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://wa.me/7008448569" target="_blank" title="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                <a href="https://instagram.com/ashis5769" target="_blank" title="Instagram"><i class="fa-brands fa-square-instagram"></i></a>
                <a href="https://github.com/Ashiskumarrout" target="_blank" title="GitHub"><i class="fa-brands fa-github"></i></a>
            </div>
        </div>
    </div>

    <div class="col">
        <h4>About</h4>
        <a href="#">About</a>
        <a href="#">Delivery Information</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & Conditions</a>
        <a href="#">Contact Us</a>
    </div>

    <div class="col">
        <h4>My Account</h4>
        <a href="#">Sign In</a>
        <a href="#">View Cart</a>
        <a href="#">My Wishlist</a>
        <a href="#">Track My Order</a>
        <a href="#">Help</a>
    </div>

    <div class="col install">
        <h4>Install App</h4>
        <p>From App Store or Google Play</p>
        <div class="row">
            <img src="Ecmerse photos/app.jpg" alt="App Store">
            <img src="Ecmerse photos/play.jpg" alt="Google Play">
        </div>
        <p>Secure Payment Options</p>
        <img src="Ecmerse photos/pay.png" alt="Payment Methods">
    </div>
    
    <div class="copyright">
        <hr>
        <p>&copy; 2024 Ashis. Made with <i class="fa-solid fa-heart"></i> by Ashis. Thank you for visiting!</p>
    </div>
    
</footer>
</html>

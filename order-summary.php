<?php
session_start();
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>
    <script src="https://kit.fontawesome.com/e6878467af.js" crossorigin="anonymous"></script>
</head>
<body>
    <section id="header">
        <a href="#"><img src="Ecmerse photos/smalllogo.png" alt="Logo" class="logo"></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a class="active" href="shope.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li id="lg-bag"><a href="cart.php"><i class="fa-solid fa-cart-plus"></i></a></li>

                <?php if ($isLoggedIn): ?>
                    <li class="user-info">
                        <a href="akas.php"><img src="<?php echo htmlspecialchars($_SESSION['profile_photo']); ?>" alt="Profile Photo" class="profile-photo"></a>
                        <a href="akas.php?logout=true" class="logout">Logout</a>
                    </li>
                <?php else: ?>
                    <li id="login"><a href="akas.php"><i class="fa-solid fa-user-circle"></i> Login</a></li>
                <?php endif; ?>

                <a href="#" id="close"><i class="fa-solid fa-circle-xmark" style="color: #19191a;"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.php"><i class="fa-solid fa-cart-plus"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <section id="order-summary" class="section-p1">
        <h1></h1>
        <br>
        <h2>Order Summary</h2>
        <form id="order-form"  action="process-order.php" method="POST">
            <h3>Delivery Address</h3>
            <label for="full-name">Full Name:</label>
            <input type="text" id="full-name" name="full-name" required>
            
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" title="Please enter a 10-digit phone number" required>
            
            <label for="pincode">Pincode:</label>
            <input type="text" id="pincode" name="pincode" pattern="[0-9]{6}" title="Please enter a 6-digit pincode" required>
            
            <label for="state">State:</label>
            <input type="text" id="state" name="state" required>
            
            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>
            
            <label for="house-no">House No:</label>
            <input type="text" id="house-no" name="house-no" required>
            
            <label for="building-name">Building Name:</label>
            <input type="text" id="building-name" name="building-name" required>
            
            <label for="road">Road/Area:</label>
            <input type="text" id="road" name="road" required>
            
            <label for="colony">Colony:</label>
            <input type="text" id="colony" name="colony" required>

            <h3>Payment Options</h3>
            <input type="radio" id="cash-on-delivery" name="payment" value="cash-on-delivery" checked>
            <label for="cash-on-delivery">Cash on Delivery</label>
            <br>
            <input type="radio" id="card-payment" name="payment" value="card-payment">
            <label for="card-payment">Card Payment</label>
            <br>

            <button type="submit" class="normal">Place Order</button>
        </form>
    </section>

    <section id="newsletter" class="section-p1">
        <div class="newstext">
            <h4>Sign up for our newsletter</h4>
            <p>Get email updates about our latest shop and <span>special offers</span>.</p>
        </div>
        <div class="form">
            <input type="email" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </section>


</body>
</html>

<style>
  
  #order-form {
    width: 770px;
    background: linear-gradient(135deg, #ff7e5f, #feb47b); /* Gradient from pink to orange */
    padding: 20px;
    margin: 0 auto;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Adding shadow for depth */
}

#order-form input[type="text"],
#order-form input[type="tel"] {
    width: 100%; /* Ensures consistent width */
    max-width: 300px; /* Sets a maximum width */
    padding: px; /* Equal padding for uniform height */
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box; /* Includes padding in width/height calculation */
}

#order-form input#phone {
    width: 100%; /* Explicitly match the width */
    max-width: 300px; /* Consistent maximum width */
    padding: 10px; /* Ensure uniform padding */
    font-size: 1rem; /* Same font size for height uniformity */
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
/* General Styling for the Section */
#order-summary {
    max-width: 800px;
    margin: 30px auto;
    padding: 20px;
    background: linear-gradient(to right, #f7f9fc, #ffffff);
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    font-family: 'Arial', sans-serif;
    color: #333;
}

#order-summary h2 {
    text-align: center;
    font-size: 2rem;
    margin-bottom: 20px;
    color: #007bff;
    font-weight: bold;
    text-transform: uppercase;
}

#order-summary h3 {
    margin-top: 20px;
    font-size: 1.5rem;
    color: #444;
    border-bottom: 2px solid #007bff;
    display: inline-block;
    padding-bottom: 5px;
}

/* Form Styling */
#order-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

#order-form label {
    font-size: 1rem;
    color: #555;
    font-weight: 600;
    margin-bottom: 5px;
}

#order-form input[type="text"],
#order-form input[type="tel"] {
    width: 100%;
    max-width: 300px;
    padding: 12px;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

#order-form input:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
    background-color: #f9faff;
}

/* Payment Options */
#order-form input[type="radio"] {
    margin-right: 10px;
}

#order-form label[for="cash-on-delivery"],
#order-form label[for="card-payment"] {
    font-size: 1rem;
    color: #444;
    cursor: pointer;
    display: inline-block;
    margin-bottom: 10px;
}

/* Submit Button */
#order-form button {
    margin-top: 20px;
    padding: 14px 20px;
    background: linear-gradient(to right, #007bff, #0056b3);
    color: #fff;
    font-size: 1.2rem;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    text-transform: uppercase;
    transition: background 0.3s ease;
}

#order-form button:hover {
    background: linear-gradient(to right, #0056b3, #003f8a);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

/* Responsive Design */
@media (max-width: 600px) {
    #order-summary {
        padding: 15px;
    }

    #order-summary h2 {
        font-size: 1.8rem;
    }

    #order-summary h3 {
        font-size: 1.3rem;
    }

    #order-form input[type="text"],
    #order-form input[type="tel"] {
        font-size: 0.9rem;
        padding: 10px;
    }

    #order-form button {
        font-size: 1rem;
        padding: 12px;
    }
}



</style>

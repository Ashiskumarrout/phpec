

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Assistant</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .containers{
            width: 90%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        #chatbox {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            display: flex;
            flex-direction: column;
            height: 500px;
            max-height: 500px;
            overflow: hidden;
        }
        #messages {
            flex: 1;
            overflow-y: auto;
            padding-right: 10px;
            border-bottom: 1px solid #ddd;
        }
        .message {
            margin-bottom: 15px;
        }
        .message span {
            font-weight: bold;
        }
        .message.user span {
            color: #007bff;
        }
        .message.assistant span {
            color: #28a745;
        }
        #message-form {
            display: flex;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        #message-form inputs[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        #message-form button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #007bff;
            color: white;
            cursor: pointer;
            font-size: 16px;
            margin-left: 10px;
        }
        #message-form button:hover {
            background: #0056b3;
        }
        #message-form{
         margin-left: 5px;  
        }
    </style>
</head>
<body>
    <div class="containers">
        <h1>Chat Assistant</h1>
        <div id="chatbox">
            <div id="messages">
                <div class="message assistant"><span>Chat Assistant:</span> Namaste! Welcome to Ashis Help Center. How can I assist you today?</div>
                <!-- Chat messages will be dynamically inserted here -->
            </div>
            <form id="message-form">
                <input type="text" id="user-inputs" placeholder="Type your message here..." autocomplete="off">
                <button type="submit">Send</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('message-form').addEventListener('submit', function(event) {
            event.preventDefault();
            
            var userInput = document.getElementById('user-input').value.trim();
            var messagesDiv = document.getElementById('messages');
            
            if (userInput === '') return;

            // Display user message
            messagesDiv.innerHTML += '<div class="message user"><span>You:</span> ' + escapeHtml(userInput) + '</div>';
            document.getElementById('user-input').value = '';

            // Display assistant response
            var response = getAssistantResponse(userInput);
            messagesDiv.innerHTML += '<div class="message assistant"><span>Chat Assistant:</span> ' + escapeHtml(response) + '</div>';
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        });

        function escapeHtml(text) {
            var map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };
            return text.replace(/[&<>"']/g, function(m) { return map[m]; });
        }

        function getAssistantResponse(userInput) {
            var lowerInput = userInput.toLowerCase();
            if (lowerInput.includes('hi') || lowerInput.includes('hello') || lowerInput.includes('hey')) {
                return "Hi there! How can I assist you today?";
            } else if (lowerInput.includes('company name') || lowerInput.includes('what is your company name')) {
                return "Our company name is Ashis Private Limited.";
            } else if (lowerInput.includes('phone number') || lowerInput.includes('phone no') || lowerInput.includes('contact number')) {
                return "Our company phone number is 7008448569.";
            } else if (lowerInput.includes('email') || lowerInput.includes('email address')) {
                return "You can contact us via email at routasis411@gmail.com.";
            } else if (lowerInput.includes('opening hours') || lowerInput.includes('hours') || lowerInput.includes('when are you open')) {
                return "We are open every day from 10 AM to 10 PM.";
            } else if (lowerInput.includes('replace a product') || lowerInput.includes('product replacement')) {
                return "To replace a product, please contact our customer support with your order details.";
            } else if (lowerInput.includes('how are you') || lowerInput.includes('how do you do')) {
                return "I'm just a program, but I'm here to help you!";
            } else {
                return "I'm not sure how to respond to that. Can you please provide more details?";
            }
        }
    </script>
</body>
<!-- ----------------------------------------footer-------------------------- -->
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

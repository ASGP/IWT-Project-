<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Laundry Service</title>
    <link rel="stylesheet" href="./styles/welcome.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="header-container">
        <div class="header">
            <h1 onclick="location.href='./index.php'">Online Laundry Service</h1>
            <div class="main-menu">
                <ul>
                    <li><a href="./login.php">LOGIN</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="cover-container">
        <div class="cover">
            <h1>Online Laundry Service</h1>
            <p>We are the Sri Lanka first ever Online service laundry system implemented country wide, We are here to serve the hardworking citizens of the country. We do everything with clothes. We are aimed deliver the best service faster, cheaper and efficiently</p>
            <p>  <a href="./register.php">SIGNUP</a></p>
        </div>
    </div>


    <div class="features-container">
        <div class="section">
            <h1>Laundry</h1>
            <h2>Best laundry service in the country. We assure you the best and fast service.</h2>
            <a href="login.php" class="sectionbtn">Serve Me</a>
        </div>
        <div class="section">
            <h1>Dry Cleaning</h1>
            <h2>Best Drting services inthe country. Dry everything. We dry more than the sun</h2>
            <a href="login.php" class="sectionbtn">Serve Me</a>
        </div>
        <div class="section">
            <h1>Ironing</h1>
            <h2>Best Ironing service available in the country. join with us to get the best.</h2>
            <a href="login.php" class="sectionbtn">Serve Me</a>
        </div>
    </div>
    
    <div class="footer">
        <h1>Connect with Us</h1>
        <p>Send us a message with your questions</p>
        <div class="contact-box">
            <div class="contact-left">
                <h3>Send your request</h3>
                <form action="">
                <div class="input-row">
                    <div class="input-grp">
                        <label >Name</label>
                        <input type="text" class="int" placeholder="Enter name">
                    </div>
                    <div class="input-grp">
                        <label >Email</label>
                        <input type="text" class="int" placeholder="Enter Email">
                    </div>
                    <div class="input-grp">
                        <label >subject</label>
                        <input type="text" class="int" placeholder="Enter subject">
                    </div>
                </div>
                <label >Message</label>
                <textarea class="textarea" rows="5" placeholder="your message"></textarea>
                <button type="submit" id="send">Send</button>
                </form>
            </div>
            <div class="contact-right">
                <h3>Our Info</h3>
                <table>
                    <tr>
                        <td>Email</td>
                        <td>contactus@mail.com</td>
                    </tr>
                    <tr>
                        <td>phone</td>
                        <td>011123455</td>
                    </tr>
                    <tr>
                        <td>address</td>
                        <td>100/A hill street, galle</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</body>

</html>
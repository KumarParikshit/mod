<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dragon Pay</title>
</head>
<body>
    <?php
    
$servername = "localhost";
$username = "him";
$password = "him";
$dbname = "him";

// Establish a database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

   $token = $_POST['user'];
  $phoneselect="SELECT * FROM users  WHERE token='$token' ";
$phonefetch=$conn->query($phoneselect);
$phoneresult= mysqli_fetch_assoc($phonefetch);
$phone =  $phoneresult['phone'];
    ?>
<center><h4><b>Payment Is Initialising! Please Wait. <br>Heading you to payment page!!!</b></h4></center>
   <form id="autoForm" action="process_payment.php" method="post">
       <input type="hidden" id="userCode" name="userCode" value="240929786544">
         <input style="display:none;"type="text" id="orderCode" name="orderCode">
         <script>
        // Generate a random value (for example, between 1 and 10000)
        function generateRandomValue() {
            return Math.floor(Math.random() * 10000) + 1; // Random number between 1 and 10000
        }

        // Set the random value to the input field when the page loads
        window.onload = function() {
            document.getElementById("orderCode").value = generateRandomValue();
        };
    </script>
    <input type="hidden" id="customerOrderCode" name="customerOrderCode" value="<?php echo $_POST['user'];?>">
    
<input type="hidden" id="amount" name="amount" value="<?php echo $_POST['amount'];?>">
       <input type="hidden" id="callbackUrl" name="callbackUrl" value="https://pay.ampelix.in/callbackUrl.php">
      
    </form>

    <script>
        
        setTimeout(function() {
            document.getElementById("autoForm").submit();
        }, 3000); // 10000 milliseconds = 10 seconds
    </script>
    
    
</body>
</html>
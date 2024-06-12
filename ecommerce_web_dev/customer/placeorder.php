<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Confirmation</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: white;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .container {
                width: 400px;
                background-color: bisque;
                padding: 40px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                text-align: center;
                font-size:20px;
            }

            h1 {
                color: #333;
                margin-bottom: 20px;
            }

            p {
                color: #555;
                margin-bottom: 30px;
            }

            form {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-bottom: 20px;
            }

            button[type="submit"], a {
                padding: 12px 24px;
                font-size: 16px;
                background-color: #0056b3;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                transition: background-color 0.3s ease;
                text-decoration: none;
                margin: 0 10px;
                margin: bottom 10px;
            }

            button[type="submit"]:hover, a:hover {
                background-color: lightgreen;
            }
        </style>
    </head>
    <body>
    <div class="container">
        
        <p>Choose your payment method:</p>
        <form method="post" action="payment.html">
            <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
        </form>
        <a href="payment.html?orderid=<?php echo $orderid; ?>" target="_blank">Pay Now </a><br>
        <form method="post" action="home.php">
            <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
            <button type="submit" name="cod">Cash on Delivery</button>
        </form>
    </div>
    </body>
</html>

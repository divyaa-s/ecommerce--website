<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Order</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: lightblue ;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: bisque;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-right: 10px;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 70%;
        }

        button[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #0056b3;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .order-details {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
        }

        .order-details p {
            margin: 10px 0;
            font-size: 16px;
            color: #555;
        }

        .order-details strong {
            margin-right: 10px;
            color: #333;
        }

        .error-message {
            color: #d9534f;
            font-style: italic;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Track Your Order</h1>

    <form method="GET" action="">
        <label for="orderid">Enter Order ID:</label>
        <input type="text" id="orderid" name="orderid" required>
        <button type="submit">Track</button>
    </form>

    <?php
    if(isset($_GET['orderid']) && !empty($_GET['orderid'])) {
        include "../shared/connection.php"; 
        $orderid = mysqli_real_escape_string($conn, $_GET['orderid']);
        $sql = "SELECT * FROM orders WHERE order_id = '$orderid'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            $order = mysqli_fetch_assoc($result);
            ?>
            <div class="order-details">
                <h2>Order Details</h2>
                <p><strong>Order ID:</strong> <?php echo $order['orderid']; ?></p>
                <p><strong>UserName:</strong> <?php echo $order['username']; ?></p>
                <p><strong>created_date:</strong> <?php echo $order['created_date']; ?></p>
                <p><strong>Order Status:</strong> <?php echo $order['order_status']; ?></p>
            </div>
            <?php
        } else {
            echo "<p class='error-message'>No order found with the given ID.</p>";
        }
    }
    ?>

</div>

</body>
</html>

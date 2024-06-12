<?php
session_start();
if ($_SESSION['login_status'] == false) {
    echo "Forbidden Access";
    die;
}

if ($_SESSION['usertype'] != 'Customer') {
    echo "Unauthorized Access";
    die;
}

include "menu.html";
include "../shared/connection.php";

$sql_result = mysqli_query($conn, "SELECT * FROM product");

while ($dbrow = mysqli_fetch_assoc($sql_result)) {
    echo "<div class='card-own'>
            <div class='name'>$dbrow[name]</div>
            <div class='price'>$dbrow[price]</div>
            <div class='pdt-img-parent'>
                <img class='pdtimg' src='$dbrow[impath]'>
            </div>
            <div>$dbrow[detail]</div>
            <div class='text-center'>
                <a href='addcart.php?pid=$dbrow[pid]'>
                    <button class='btn btn-info'>Add to Cart</button>
                </a>
            </div>
        </div>";
}
?>

<html>
    <head>
        <style>
            .card-own {
                width: 250px;
                height: 350px; 
                background-color: bisque;
                display: inline-block;
                margin: 5px;
                padding: 5px;
                text-align: center;
            }

            .name {
                font-size: 22px;
                text-align: center;
            }

            .price {
                font-weight: bold;
                color: red;
                font-size: 23px;
            }

            .price::before {
                content: " Rs";
                color: black;
                font-size: 12px;
            }

            .pdt-img-parent {
                width: 100%; 
                height: 200px;
                overflow: hidden; 
                display: flex;
                justify-content: center; 
                align-items: center; 
            }

            .pdtimg {
                max-width: 100%; 
                max-height: 100%; 
            }
        </style>
    </head>
</html>

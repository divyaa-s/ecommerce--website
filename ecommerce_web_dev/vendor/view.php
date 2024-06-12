<html>
    <head>
        <style>
            .card-own{
                width: 300px;
                height: 400px;
                background-color: bisque;
                display: inline-block !important;
                margin:10px;
                padding:20px;
                text-align: center;
                vertical-align : center;
                align-items:center;
            }
            .name{
                font-size: 22px;
                text-align: center;
            }
            .price{
                font-weight: bold;
                color:red;
                font-size: 23px;
            }
            .price::before{
                content: " Rs";
                color: black;
                font-size: 12px;
            }
            .pdt-img-parent,.pdtimg{
                width:90%;
                height:200px;
                margin-bottom: 10px;
            }


        </style>
    </head>
    <body>

    </body>
</html>    


<?php

include "menu.html";

session_start();


include "../shared/connection.php";

$sql_result=mysqli_query($conn,"select * from product where owner=$_SESSION[userid]");

while($dbrow=mysqli_fetch_assoc($sql_result)){
    $pid = $dbrow['pid'];
    echo "<div class= 'card-own'>
            <div class='name'>$dbrow[name]</div>
            <div class='price'>$dbrow[price]</div>
            <div>$dbrow[detail]</div>
            <div class='pdt-img-parent'>
                <img class='pdtimg' src='$dbrow[impath]'>
            </div>
            <div>
                <a href='#'>
                <button onclick='editpdt($pid)'>Edit</button> 
                </a>
                <button onclick='deletepdt($pid)'>Delete</button> 
            </div>           
            </div>";
}



?>

<html>
        <body>
            <script>
                function deletepdt(pid){
                    res = confirm(`Are you sure you want to delete product ${pid}?`);
                    if(res){
                        window.location.href = `delete.php?pid=${pid}`;
                    }
                }
                function editpdt(pid){
                    res = confirm(`Are you sure you want to edit product ${pid}?`);
                    if(res){
                        window.location.href = `edit.php?pid=${pid}`;
                    }
                }
                
            </script>
        </body> 
    </html>

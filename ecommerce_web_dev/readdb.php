<?php

$conn=new mysqli("localhost", "root","","jan",3307);

$sql_result=mysqli_query($conn,"select * from user");

print_r($sql_result);
echo  "<br>";

while ($dbrow=mysqli_fetch_assoc($sql_result))
{
    print_r($dbrow);
    echo "<br> $dbrow[username]";
}

?>

<?php
//MySQL(improved) or PDO (php data objects)
//connect to database
  $conn = mysqli_connect('localhost', 'brent', 'test1234', 'maurizios_pizza');

//check connection
  if(!$conn){
    echo 'Connection error: '. mysqli_connection_error();
  }
 ?>

<?php
$id =$_POST['id'];


$connection = new mysqli('localhost' , 'root' , '' ,  'habib');
$data = $connection->query("DELETE FROM ajtable WHERE id='$id' ");

?>
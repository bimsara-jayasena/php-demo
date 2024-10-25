<?php
require './Config/DbUtil.php';
$connection=new DbUtil();
$connection->getConnection();
echo "you are connected to the databases susccessfully!"
?>

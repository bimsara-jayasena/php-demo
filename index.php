<?php
require './Config/DbUtil.php';
$connection=new DbUtil();
$connection->getConnection();
echo "Hooraayy!!! you are connected to the databases susccessfully!"
?>

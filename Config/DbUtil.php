<?php
require 'vendor/autoload.php';
use Dotenv\Dotenv;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
class DbUtil
{
    private  $user;
    private $host;
    private $password;
    private $db;

    public function __construct()
    {
        $dotenv=Dotenv::createImmutable(__DIR__);
        $dotenv->load();
        
        $this->user=$_ENV['USER'];
        $this->host=$_ENV['HOST'];
        $this->password=$_ENV['PASSWORD'];
        $this->db=$_ENV['DB'];

    }

    public function  getConnection()
    {
   
        try {
            $con = new mysqli($this->host,$this->user,$this->password,$this->db);
            echo "connected successfull";
            return $con;
        } catch (mysqli_sql_exception $e) {
            echo  "Error: " . $e->getMessage();
        }
    }
}

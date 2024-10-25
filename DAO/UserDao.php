<?php
require '../Config/DbUtil.php';
require '../Model/UserModel.php';
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
class userDao{

    public function create(UserModel $user):bool{
        try{
            $db=new DbUtil();
            $conn=$db->getConnection();
            $qry="INSERT INTO users(first_name,last_name) values (?,?)";
            $stmt=$conn->prepare($qry);
            $stmt->bind_param("ss",$user->getFirstName(),$user->getLastName());
            $stmt->execute();
            if($stmt->affected_rows){
                return true;
            }else{
                throw new Exception("could not create new record");
            }


        }catch(mysqli_sql_exception $e){
            return new Exception("new user create failed".$e->getMessage());
        }finally{
            $conn->close();
            $stmt->close();
        }
        return true;
    }
    public function read(){
        try{
            $db=new DbUtil();
            $conn=$db->getConnection();
            $qry="SELECT * FROM users";
            $stmt=$conn->prepare($qry);
            $stmt->execute();
            $res=$stmt->get_result();
            return $res;
        }catch(mysqli_sql_exception $e){
            throw new Exception("Error: ".$e->getMessage());
        }finally{
            $conn->close();
            $stmt->close();
        }
    }
}
?>
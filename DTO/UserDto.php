<?php
class UserDto{
    private $first_name;
    private $last_name;
    
    public function setFirstName($first_name):void{
        $this->first_name=$first_name;
    }
    public function setLastName($last_name):void{
        $this->last_name=$last_name;
    }
    public function getFirstName():string{
        return $this->first_name;
    }
    public function getLastName():string{
        return $this->last_name;
    }
}
?>
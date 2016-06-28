<?php

namespace App\BITM\SEIP129150\Profile_picture;
include_once('../../../vendor/autoload.php');
use  App\BITM\SEIP129150\Book\Message;
use  App\BITM\SEIP129150\Book\Utility;
class ImageLoader{

    public  $id="";
    public  $name="";
    public  $imageName="";
    public  $created="";
    public  $modified="";
    public  $created_by="";
    public  $modified_by="";
    public  $deleted_at="";


    public  function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "atomicprojectb21");
    }

    public  function  prepare($data="")
    {
        if (array_key_exists("name", $data)) {
            $this->name = $data['name'];
        }
        if (array_key_exists("imageName", $data)) {
            $this->imageName = $data['imageName'];
        }
        if (array_key_exists("id", $data)) {
            $this->id = $data['id'];
        }
    }
    public function index(){
        $_allInfo= array();
        $query="SELECT * FROM `profilepicture` WHERE `trash` IS NULL ";
        $result= mysqli_query($this->conn,$query);
        //You can also use mysqli_fetch_object e.g: $row= mysqli_fetch_object($result)
        while($row= mysqli_fetch_assoc($result)){
            $_allInfo[]=$row;
        }

        return $_allInfo;
    }
    public function store(){
        $query="INSERT INTO `atomicprojectb21`.`profilepicture` ( `name`, `imageName`) VALUES ('{$this->name}', '{$this->imageName}')";
        $result= mysqli_query($this->conn,$query);
        if ($result) {
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Data has been stored successfully.
</div>");
            Utility::redirect('index.php');
        } else {
            Message::message("<div class=\"alert alert-success\">
  <strong>Unsuccess!</strong> Data has not been stored successfully.
</div>");
            Utility::redirect('index.php');
        }
    }

    public  function  veiw(){
        $query = "SELECT * FROM `profilepicture` WHERE `id`=" . $this->id;
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function update(){
        $query="UPDATE `atomicprojectb21`.`profilepicture` SET `name` = '{$this->name}', `imageName` = '{$this->imageName}' WHERE `profilepicture`.`id` = ".$this->id;
        $result= mysqli_query($this->conn,$query);
        if($result){
            Message::message("<div class=\"alert alert-info\">
  <strong>Updated!</strong> Data has been Updated successfully.
</div>");
            header('Location:index.php');

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been updated  successfully.
    </div>");
            Utility::redirect('index.php');

        }

    }
    public function delete(){
        $query="DELETE FROM `atomicprojectb21`.`profilepicture` WHERE `profilepicture`.`id` = ".$this->id;
        $result= mysqli_query($this->conn,$query);
        if($result){
            Message::message("<div class=\"alert alert-success\">
  <strong>Deleted!</strong> Data has been deleted successfully.
</div>");
            header('Location:index.php');

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been deleted successfully.
    </div>");
            Utility::redirect('index.php');

        }
    }
    public  function  trash()
    {
        $tim=time();
        $query="UPDATE `atomicprojectb21`.`profilepicture` SET `trash` = '{$tim}' WHERE `profilepicture`.`id` = ".$this->id;
        $result= mysqli_query($this->conn,$query);
        if($result){
            Message::message("<div class=\"alert alert-info\">
  <strong>trashed!</strong> Data has been trashed successfully.
</div>");
            header('Location:index.php');

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been trashed  successfully.
    </div>");
            Utility::redirect('index.php');

        }
    }
    public  function trashed()
    {
        $_allInfo= array();
        $query="SELECT * FROM `profilepicture` WHERE `trash` IS NOT NULL ";
        $result= mysqli_query($this->conn,$query);
        //You can also use mysqli_fetch_object e.g: $row= mysqli_fetch_object($result)
        while($row= mysqli_fetch_assoc($result)){
            $_allInfo[]=$row;
        }

        return $_allInfo;
        
    }

    public  function  recover()
    {
        $tim=time();
        $query="UPDATE `atomicprojectb21`.`profilepicture` SET `trash` = NULL WHERE `profilepicture`.`id` = ".$this->id;
        $result= mysqli_query($this->conn,$query);
        if($result){
            Message::message("<div class=\"alert alert-info\">
  <strong>Recover!</strong> Data has been recover successfully.
</div>");
            header('Location:index.php');

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been recover  successfully.
    </div>");
            Utility::redirect('index.php');

        }
    }
    
    
    
}

?>
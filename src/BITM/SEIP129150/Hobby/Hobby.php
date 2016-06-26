<?php
namespace App\BITM\SEIP129150\Hobby;
include_once('../../../vendor/autoload.php');
use  App\BITM\SEIP129150\Book\Message;
use  App\BITM\SEIP129150\Book\Utility;
class Hobby{
    public  $id="";
    public  $name="";
    public  $hobby="";
    public  $created="";
    public  $modified="";
    public  $created_by="";
    public  $modified_by="";
    public  $deleted_at="";
    public  $conn;


    public  function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "atomicprojectb21");
    }
    public  function  prepare($data=Array())
    {
        if (array_key_exists("name", $data)) {
            $this->name= $data['name'];
        }

        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }

        if (array_key_exists("hobby", $data)) {
            $this->hobby= $data['hobby'];
        }
    }
    public  function index(){
        $allhobby = array();
        $query = "SELECT * FROM `hobby` WHERE `trash` IS NULL";
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $allhobby[] = $row;
        }
        return $allhobby;
    }
    public  function create(){
        return "i am create from";
    }
    public  function store()
    {
        $query="INSERT INTO `atomicprojectb21`.`hobby`(`name`, `hobby`) VALUES ('".$this->name."','".$this->hobby. "')";
        //echo $query;
        //echo  $query;
       // die();
        $result = mysqli_query($this->conn, $query);
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
    public  function edit(){
        return "i am editing data";
    }
    public  function update(){

        $query="UPDATE `atomicprojectb21`.`hobby` SET `name` = '".$this->name."', `hobby` = '".$this->hobby."' WHERE `hobby`.`id` = ".$this->id;
        $result=mysqli_query($this->conn,$query);
        if($result)
        {
            Message::message("<div class=\"alert alert-info\"> <strong>Updated!</strong> Data has been updated successfully.</div>");
            Utility::redirect("index.php");
        }
        else {
            Message::message("<div class=\"alert alert-info\"> <strong>Updated!</strong> Data has not been updated successfully.</div>");
            Utility::redirect("index.php");
        }
    }
    public  function delete(){
        $query = "DELETE FROM `atomicprojectb21`.`hobby` WHERE `hobby`.`id` = " . $this->id;
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            Message::message("<div class=\"alert alert-info\">
  <strong>Deleted!</strong> Data has been Deleted successfully.
</div>");
            header('Location:index.php');

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been Deleted  successfully.
    </div>");
            Utility::redirect('index.php');

        }
    }
    public  function  veiw(){
        $query = "SELECT * FROM `hobby` WHERE `id`=" . $this->id;
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    
    public  function  trash()
    {
        $this->deleted_at=time();
        $query="UPDATE `atomicprojectb21`.`hobby` SET `trash` = '".$this->deleted_at."' WHERE `hobby`.`id` = ".$this->id;
        $result=mysqli_query($this->conn,$query);
        if($result)
        {
            Message::message("<div class=\"alert alert-success\"> <strong>Trashed!</strong> Data has been trashed successfully.</div>");
            Utility::redirect("index.php");
        }
        else {
            Message::message("<div class=\"alert alert-warning\"> <strong>trashed!</strong> Data has not been trashed successfully.</div>");
            Utility::redirect("index.php");
        }
    }
    public  function trashedveiw()
    {
        $query = "SELECT * FROM `hobby` WHERE `trash` IS NOT NULL";
        $allhobby=array();
        $result=mysqli_query($this->conn,$query);
        while ($row=mysqli_fetch_assoc($result))
        {
            $allhobby[]=$row;
        }
        return $allhobby;
    }

    public  function mutipleRecover($ids){
        $id=implode(",",$ids);

        $query="UPDATE `atomicprojectb21`.`hobby` SET `trash` = NULL  WHERE `hobby`.`id` IN (".$id.")";
//        echo  $query;
//        die();
        $result=mysqli_query($this->conn,$query);
        if($result)
        {
            Message::message("<div class=\"alert alert-info\"> <strong>Restore!</strong> Data has been Restoreed successfully.</div>");
            Utility::redirect("index.php");
        }
        else {
            Message::message("<div class=\"alert alert-info\"> <strong>Restore!</strong> Data has not been Restoreed successfully.</div>");
            Utility::redirect("index.php");
        }
    }
    public  function  mutipleDelete($ids)
    {
        $id=implode(",",$ids);
        $query = "DELETE FROM `atomicprojectb21`.`hobby` WHERE `hobby`.`id`  IN (".$id.")";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            Message::message("<div class=\"alert alert-info\">
  <strong>Deleted!</strong> Data has been Deleted successfully.
</div>");
            header('Location:index.php');

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been Deleted  successfully.
    </div>");
            Utility::redirect('index.php');

        }
    }



}
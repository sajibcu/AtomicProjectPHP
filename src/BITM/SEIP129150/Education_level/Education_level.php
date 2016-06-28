<?php
namespace App\BITM\SEIP129150\Education_level;
include_once('../../../vendor/autoload.php');
use  App\BITM\SEIP129150\Book\Message;
use  App\BITM\SEIP129150\Book\Utility;

class Education_level{
    public  $id="";
    public  $name="";
    public  $level="";
    public  $modified="";
    public  $created_by="";
    public  $modified_by="";
    public  $deleted_at="";
    public $conn;
    public  $dtime;


    public  function __construct()
    {
        $this->conn=mysqli_connect("localhost","root","","atomicprojectb21");

    }

    public  function  prepare($data)
    {
        if(array_key_exists('name',$data))
        {
            $this->name=$data['name'];
        }
        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }
        if(array_key_exists('level',$data))
        {
            $this->level=$data['level'];
        }
    }


    public  function index(){
        $query="SELECT * FROM `city` WHERE `trash` IS NULL";
        $result=mysqli_query($this->conn,$query);
        $alemail=array();
        while ($row=mysqli_fetch_assoc($result))
        {
            $alemail[]=$row;
        }
        return $alemail;

    }
    public  function create(){
        return "i am create from";
    }
    public  function store()
    {
        $sql="INSERT INTO `atomicprojectb21`.`education` (`name`,`level`) VALUES ('".$this->name."','".$this->level."')";
       // Utility::dd($sql);
        $result=mysqli_query($this->conn,$sql);
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
        $query = "UPDATE `atomicprojectb21`.`education` SET `name` = '" . $this->name . "', `level` = '".$this->city."' WHERE `education`.`id` =" . $this->id;
        $result = mysqli_query($this->conn, $query);
        if ($result) {
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
    public  function delete(){
        $query = "DELETE FROM `atomicprojectb21`.`education` WHERE `education`.`id` = " . $this->id;
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
        $query = "SELECT * FROM `education` WHERE `id`=" . $this->id;
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    public function  trash()
    {
        $this->dtime = time();
        $query = "UPDATE `atomicprojectb21`.`education` SET `trash` = '" . $this->dtime . "' WHERE `education`.`id` =" . $this->id;
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            Message::message("<div class=\"alert alert-info\">
  <strong>Trashed!</strong> Data has been Trashed successfully.
</div>");
            header('Location:index.php');

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been Trashed  successfully.
    </div>");
            Utility::redirect('index.php');

        }
    }


    public function  recover()
    {
        $query = "UPDATE `atomicprojectb21`.`education` SET `trash` = NULL  WHERE `education`.`id` = " . $this->id;
        //Utility::dd($query);
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            Message::message("<div class=\"alert alert-success\">
  <strong>Recovered!</strong> Data has been recovered successfully.
</div>");
            header('Location:index.php');

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been recovered successfully.
    </div>");
            Utility::redirect('index.php');

        }
    }

    public function  multipleRecover($idS)
    {
        if ((is_array($idS)) && count($idS) > 0) {
            $IDs = implode(",", $idS);
            $query = "UPDATE `atomicprojectb21`.`education` SET `trash` = NULL  WHERE `education`.`id` IN(" . $IDs . ")";
            //result= mysqli_query($this->conn,$query);
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                Message::message("<div class=\"alert alert-success\">
  <strong>Recovered!</strong> Selected Data has been recovered successfully.
</div>");
                header('Location:index.php');

            } else {
                Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Selected Data has not been recovered successfully.
    </div>");
                Utility::redirect('index.php');

            }


        }
    }

    public function multipleDelect($idS)
    {
        if ((is_array($idS)) && count($idS) > 0) {
            $IDs = implode(",", $idS);
            $query = "DELETE FROM `atomicprojectb21`.`education` WHERE `education`.`id` IN(" . $IDs . ")";
            //result= mysqli_query($this->conn,$query);
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                Message::message("<div class=\"alert alert-success\">
  <strong>Recovered!</strong> Selected Data has been recovered successfully.
</div>");
                header('Location:index.php');

            } else {
                Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Selected Data has not been recovered successfully.
    </div>");
                Utility::redirect('index.php');

            }


        }

    }


    public  function  count()
    {
        $query="SELECT COUNT(*) AS totalItem FROM `education` WHERE `trash` IS NULL";
        $result=mysqli_query($this->conn,$query);
        $row= mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }
    public function paginator($pageStartFrom=0,$Limit=5){
        $query="SELECT * FROM `education` WHERE `trash` IS NULL LIMIT ".$pageStartFrom.",".$Limit;
        $_allBook= array();
        $result= mysqli_query($this->conn,$query);
        //You can also use mysqli_fetch_object e.g: $row= mysqli_fetch_object($result)
        while($row= mysqli_fetch_assoc($result)){
            $_allBook[]=$row;
        }

        return $_allBook;

    }


    public  function trashed(){
        $query="SELECT * FROM `education` WHERE `trash` IS NOT NULL";
        $result=mysqli_query($this->conn,$query);
        $alcity=array();
        while ($row=mysqli_fetch_assoc($result))
        {
            $alcity[]=$row;
        }
        return $alcity;

    }


}
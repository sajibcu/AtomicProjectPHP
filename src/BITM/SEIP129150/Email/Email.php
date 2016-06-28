<?php
namespace App\BITM\SEIP129150\Email;
include_once('../../../vendor/autoload.php');
use  App\BITM\SEIP129150\Book\Message;
use  App\BITM\SEIP129150\Book\Utility;

class Email{
    public  $id="";
    public  $email="";
    public  $created="";
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
        if(array_key_exists('email',$data))
        {
            $this->email = filter_var($data['email'], FILTER_SANITIZE_STRING);
           // $this->email=$data['email'];
        }
        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }
    }


    public  function index(){
        $query="SELECT * FROM `email` WHERE `trash` IS NULL";
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
        $sql="INSERT INTO `atomicprojectb21`.`email` (`email`) VALUES ('".$this->email."');";
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
        $result=false;
        if($this->email) {
            $query = "UPDATE `atomicprojectb21`.`email` SET `email` = '" . $this->email . "' WHERE `email`.`id` =" . $this->id;
            $result = mysqli_query($this->conn, $query);
        }
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
        $query = "DELETE FROM `atomicprojectb21`.`email` WHERE `email`.`id` = " . $this->id;
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
        $query = "SELECT * FROM `email` WHERE `id`=" . $this->id;
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    public function  trash()
    {
        $this->dtime = time();
        $query = "UPDATE `atomicprojectb21`.`email` SET `trash` = '" . $this->dtime . "' WHERE `email`.`id` =" . $this->id;
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

    public function  trashed()
    {

        $allemail = array();
        $query = "SELECT * FROM `email` WHERE `trash` IS NOT NULL";
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $allemail[] = $row;
        }
        return $allemail;
    }


    public function  recover()
    {
        $query = "UPDATE `atomicprojectb21`.`email` SET `trash` = NULL  WHERE `email`.`id` = " . $this->id;
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
            $query = "UPDATE `atomicprojectb21`.`email` SET `trash` = NULL  WHERE `email`.`id` IN(" . $IDs . ")";
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
        else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Selected Data has not been recovered successfully.
    </div>");
            Utility::redirect('index.php');

        }
    }

    public function multipleDelect($idS)
    {
        if ((is_array($idS)) && count($idS) > 0) {
            $IDs = implode(",", $idS);
            $query = "DELETE FROM `atomicprojectb21`.`email` WHERE `email`.`id` IN(" . $IDs . ")";
            //result= mysqli_query($this->conn,$query);
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                Message::message("<div class=\"alert alert-success\">
  <strong>Deleted!</strong> Selected Data has been recovered successfully.
</div>");
                header('Location:index.php');

            } else {
                Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Selected Data has not been Deleted successfully.
    </div>");
                Utility::redirect('index.php');

            }


        }
        else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Selected Data has not been Deleted successfully.
    </div>");
            Utility::redirect('index.php');

        }

    }

    public  function  count()
    {
        $query="SELECT COUNT(*) AS totalItem FROM `email` WHERE `trash` IS NULL";
        $result=mysqli_query($this->conn,$query);
        $row= mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }
    public function paginator($pageStartFrom=0,$Limit=5){
        $query="SELECT * FROM `email` WHERE `trash` IS NULL LIMIT ".$pageStartFrom.",".$Limit;
        $_allemail= array();
        $result= mysqli_query($this->conn,$query);
        //You can also use mysqli_fetch_object e.g: $row= mysqli_fetch_object($result)
        while($row= mysqli_fetch_assoc($result)){
            $_allemail[]=$row;
        }

        return $_allemail;

    }


}
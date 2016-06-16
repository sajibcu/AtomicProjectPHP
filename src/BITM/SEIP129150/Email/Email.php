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


    public  function __construct()
    {
        $this->conn=mysqli_connect("localhost","root","","atomicprojectb21");

    }

    public  function  prepare($data)
    {
        if(array_key_exists('email',$data))
        {
            $this->email=$data['email'];
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
        return "i am updating data";
    }
    public  function delete(){
        return "i delete data";
    }
    public  function  veiw(){
        return  "i am veiwing data ";
    }


}
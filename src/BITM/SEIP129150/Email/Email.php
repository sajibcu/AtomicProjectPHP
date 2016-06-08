<?php
namespace App\BITM\SEIP129150\Email;
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
        return "i am listing data";
    }
    public  function create(){
        return "i am create from";
    }
    public  function store()
    {
        $sql="INSERT INTO `atomicprojectb21`.`email` (`email`) VALUES ('".$this->email."');";
        $result=mysqli_query($this->conn,$sql);
        if($result)
        {
            echo "insert succesfully";
        }
        else{
            echo "eorror";
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
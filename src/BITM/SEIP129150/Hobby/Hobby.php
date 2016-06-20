<?php
namespace App\BITM\SEIP129150\Hobby;
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
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            echo "insert succssful";
        }
        else
        {
            echo "unsuccessful";
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
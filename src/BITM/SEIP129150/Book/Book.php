<?php
namespace App\BITM\SEIP129150\Book;
class Book{
    public  $id="";
    public  $title="";
    public  $created="";
    public  $modified="";
    public  $created_by="";
    public  $modified_by="";
    public  $deleted_at="";
    public  $conn;


    public  function __construct()
    {
        $this->conn=mysqli_connect("localhost","root","","atomicprojectb21");

    }

    public  function  prepare($data)
    {
        if(array_key_exists('title',$data))
        {
            $this->title=$data['title'];
        }
    }
    public  function index(){
        $allBook =array();
        $query="SELECT * FROM `book`";
        $result=mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_assoc($result))
        {
            $allBook[]=$row;
        }
        return $allBook;

    }
    public  function create(){
        return "i am create from";
    }
    public  function store()
    {
        $sql="INSERT INTO `atomicprojectb21`.`book` (`title`) VALUES ('".$this->title."');";
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
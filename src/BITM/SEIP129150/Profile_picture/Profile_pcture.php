<?php
namespace App\BITM\SEIP129150\Profile_pcture;
class Profile_pcture{
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
            $this->imageName = $data['image'];
        }
        if (array_key_exists("id", $data)) {
            $this->id = $data['id'];
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
        $sql ="INSERT INTO `atomicprojectb21`.`profilepicture` (`name`, `imageName`) VALUES ('".$this->name."', '".$this->imageName."')'";
        $result = mysqli_query($this->conn, $sql);
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
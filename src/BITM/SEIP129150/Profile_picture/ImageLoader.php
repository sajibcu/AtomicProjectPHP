<?php 
namespace App\BITM\SEIP129150\Profile_picture;
use APP\BITM\SEIP129150\Book\Message;
use App\BITM\SEIP129150\Book\Utility;
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
            $this->imageName = $data['image'];
        }
        if (array_key_exists("id", $data)) {
            $this->id = $data['id'];
        }
    }
    public function index(){
        $_allInfo= array();
        $query="SELECT * FROM `profilepicture`";
        $result= mysqli_query($this->conn,$query);
        //You can also use mysqli_fetch_object e.g: $row= mysqli_fetch_object($result)
        while($row= mysqli_fetch_assoc($result)){
            $_allInfo[]=$row;
        }

        return $_allInfo;
    }
    
    
    
}

?>
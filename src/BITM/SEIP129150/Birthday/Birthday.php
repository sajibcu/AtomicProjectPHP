<?php
namespace App\BITM\SEIP129150\Birthday;
use App\BITM\SEIP129150\Birthday\Message;
use App\BITM\SEIP129150\Birthday\Utility;
class Birthday
{
    public $id = "";
    public $name = "";
    public $birthday = "";
    public $modified = "";
    public $created_by = "";
    public $modified_by = "";
    public $deleted_at = "";
    public $conn;
    public $dtime;


    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "atomicprojectb21");

    }

    public function  prepare($data)
    {
        if (array_key_exists('name', $data)) {
            $this->name = filter_var($data['name'], FILTER_SANITIZE_STRING);
        }

        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }
        if (array_key_exists('birthday', $data)) {
            $this->birthday = $data['birthday'];
        }
    }

    public function index()
    {
        $allBook = array();
        $query = "SELECT * FROM `birthday` WHERE `trash` IS NULL";
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $allBook[] = $row;
        }
        return $allBook;

    }

    public function create()
    {
        return "i am create from";
    }

    public function store()
    {
        //$sql = "INSERT INTO `birthday` (`name`,`birthday`) VALUES ('" . $this->name .
            $sql="INSERT INTO `atomicprojectb21`.`birthday` (`name`, `birthday`) VALUES ('".$this->name."', '".$this->birthday."')";
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

    public function edit()
    {
        return "i am editing data";
    }

    public function update()
    {
        $query = "UPDATE `atomicprojectb21`.`birthday` SET `name` = '" . $this->name . "', `birthday` = '".$this->birthday."' WHERE `birthday`.`id` =" . $this->id;
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

    public function delete()
    {
        $query = "DELETE FROM `atomicprojectb21`.`birthday` WHERE `birthday`.`id` = " . $this->id;
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

    public function  veiw()
    {
        $query = "SELECT * FROM `birthday` WHERE `id`=" . $this->id;
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function  trash()
    {
        $this->dtime = time();
        $query = "UPDATE `atomicprojectb21`.`birthday` SET `trash` = '" . $this->dtime . "' WHERE `birthday`.`id` =" . $this->id;
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

        $allBook = array();
        $query = "SELECT * FROM `birthday` WHERE `trash` IS NOT NULL";
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $allBook[] = $row;
        }
        return $allBook;
    }

    public function  recover()
    {
        $query = "UPDATE `atomicprojectb21`.`birthday` SET `trash` = NULL  WHERE `birthday`.`id` = " . $this->id;
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            Message::message("<div class=\"alert alert-success\">
  <strong>Recovered!</strong> Data has been recovered successfully.
</div>");
            header('Location:trashVeiw.php');

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been recovered successfully.
    </div>");
            Utility::redirect('trashVeiw.php');

        }
    }

    public function  multipleRecover($idS)
    {
        if ((is_array($idS)) && count($idS) > 0) {
            $IDs = implode(",", $idS);
            $query = "UPDATE `atomicprojectb21`.`birthday` SET `trash` = NULL  WHERE `birthday`.`id` IN(" . $IDs . ")";
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
        else
        {
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
            $query = "DELETE FROM `atomicprojectb21`.`birthday` WHERE `birthday`.`id` IN(" . $IDs . ")";
            //result= mysqli_query($this->conn,$query);
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                Message::message("<div class=\"alert alert-success\">
  <strong>Deleted!</strong> Selected Data has been Deleted successfully.
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
        $query="SELECT COUNT(*) AS totalItem FROM `birthday` WHERE `trash` IS NULL";
        $result=mysqli_query($this->conn,$query);
        $row= mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }
    public function paginator($pageStartFrom=0,$Limit=5){
        $query="SELECT * FROM `birthday` WHERE `trash` IS NULL LIMIT ".$pageStartFrom.",".$Limit;
        $_allBook= array();
        $result= mysqli_query($this->conn,$query);
        //You can also use mysqli_fetch_object e.g: $row= mysqli_fetch_object($result)
        while($row= mysqli_fetch_assoc($result)){
            $_allBook[]=$row;
        }

        return $_allBook;

    }



}
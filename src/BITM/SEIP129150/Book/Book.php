<?php
namespace App\BITM\SEIP129150\Book;
class Book
{
    public $id = "";
    public $title = "";
    public $created = "";
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
        if (array_key_exists('title', $data)) {
            $this->title = $data['title'];
        }

        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }
    }

    public function index()
    {
        $allBook = array();
        $query = "SELECT * FROM `book` WHERE `trash` IS NULL";
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
        $sql = "INSERT INTO `atomicprojectb21`.`book` (`title`) VALUES ('" . $this->title . "');";
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
        $query = "UPDATE `atomicprojectb21`.`book` SET `title` = '" . $this->title . "' WHERE `book`.`id` =" . $this->id;
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
        $query = "DELETE FROM `atomicprojectb21`.`book` WHERE `book`.`id` = " . $this->id;
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
        $query = "SELECT * FROM `book` WHERE `id`=" . $this->id;
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function  trash()
    {
        $this->dtime = time();
        $query = "UPDATE `atomicprojectb21`.`book` SET `trash` = '" . $this->dtime . "' WHERE `book`.`id` =" . $this->id;
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
        $query = "SELECT * FROM `book` WHERE `trash` IS NOT NULL";
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $allBook[] = $row;
        }
        return $allBook;
    }

    public function  recover()
    {
        $query = "UPDATE `atomicprojectb21`.`book` SET `trash` = NULL  WHERE `book`.`id` = " . $this->id;
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
            $query = "UPDATE `atomicprojectb21`.`book` SET `trash` = NULL  WHERE `book`.`id` IN(" . $IDs . ")";
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
            $query = "DELETE FROM `atomicprojectb21`.`book` WHERE `book`.`id` IN(" . $IDs . ")";
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
        $query="SELECT COUNT(*) AS totalItem FROM `book` WHERE `trash` IS NULL";
        $result=mysqli_query($this->conn,$query);
        $row= mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }
    public function paginator($pageStartFrom=0,$Limit=5){
        $query="SELECT * FROM `book` WHERE `trash` IS NULL LIMIT ".$pageStartFrom.",".$Limit;
        $_allBook= array();
        $result= mysqli_query($this->conn,$query);
        //You can also use mysqli_fetch_object e.g: $row= mysqli_fetch_object($result)
        while($row= mysqli_fetch_assoc($result)){
            $_allBook[]=$row;
        }

        return $_allBook;

    }



}
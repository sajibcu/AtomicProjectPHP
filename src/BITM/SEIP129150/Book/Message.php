<?php
namespace APP\BITM\SEIP129150\Book;
if(!isset($_SESSION['message']))
{
    session_start();
}
class Message{
    public  static  function message($message=NULL){
        if(is_null($message)) {
            $_message = self::getMessage();
            return $_message;

        }
        else
        {
            self::setMessage($message);
        }
    }
    public  static  function setMessage($message)
    {
        $_SESSION['message']=$message;
    }
    public  static function  getMessage()
    {
        $_message=$_SESSION['message'];
        $_SESSION['message']="";
        if($_message==NULL) return "";
        return $_message;
    }
}

<?php
namespace App\BITM\SEIP129150\Summary_of_oraganization;
class Summary_of_oraganization{
    public  $id="";
    public  $title="";
    public  $created="";
    public  $modified="";
    public  $created_by="";
    public  $modified_by="";
    public  $deleted_at="";


    public  function __construct()
    {

    }
    public  function index(){
        return "i am listing data";
    }
    public  function create(){
        return "i am create from";
    }
    public  function store()
    {
        return "i am storing data";
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
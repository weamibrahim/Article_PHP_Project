<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
 class MySQLHandler implements DbHandler{

    private $_log;
    private $path="../../";
   private $_db_handler;
   private $_table;
   protected $_primary_key = 'id';
   public function __construct($table)
   {

       $this->_table=$table;
       $this->_log = new Logger('exceptions');
       $this->_log->pushHandler(new StreamHandler($this->path.'exceptions.log', Logger::DEBUG));
       $this->connect();
    }


  public function connect(){

       try{
         $handler=mysqli_connect(__HOST__,__USER__,__PASS__,__DB__,__PORT__);
            if(!$handler)
            {   return false;
              
            }
            $this->_db_handler=$handler;
            return true;
        }
        catch(Exception $e)
        {
            $this->_log->error($e->getMessage(), ['exception' => $e]);
            die('Something went wrong, Please comeback later');
        }
         
    }
 
    public function get_all_record_paginated($field=array(),$start=0)
    {
         $table=$this->_table;
        if(empty($field))
        {
                $sql="select * from `$table`";

        }
        else
        {
             $sql="select *";
             foreach($field as $f){
                                 $sql=" `$f` ,";
                                  }
              $sql.="from `$table`";
              $sql=str_replace(", from","from",$sql);
        }
             //$sql.="limit $start ," . __RECORDS_PER_PAGE__ ;

        return $this->getResult($sql);


    }
    public function get_record_by_id($id) {

     $primary_key = $this->_primary_key;

     $table = $this->_table;
     $sql = "select * from `$table` where `$primary_key` = '$id' ";

     return $this->getResult($sql);
 }
    private function getResult($sql)
    {
      if(__Debug_Mode__=== 1)
      {
           echo "<h3>sent quary:</h3>".$sql."<br>";
      } 
            $_handler_result=mysqli_query($this->_db_handler,$sql);
            $result=[];

           if(!$_handler_result)
           {
                return false;

                
            }
            while($row=mysqli_fetch_array($_handler_result,MYSQLI_ASSOC))
            {

             $result[]=array_change_key_case($row);
             }
            return $result;
         
    }
    public function disconnect() {
     if ($this->_db_handler)
         mysqli_close($this->_db_handler);
 }
 public function save($new_values) {
     if (is_array($new_values)) {
         $table = $this->_table;
         $sql1 = "insert into `$table` (";
         $sql2 = " values (";
         foreach ($new_values as $key => $value) {
             $sql1 .= "`$key` ,";
             if (is_numeric($value))
                 $sql2 .= " $value ,";
             else
                 $sql2 .= " '" . $value . "' ,";
         }
         $sql1 = $sql1 . ") ";
         $sql2 = $sql2 . ") ";
         $sql1 = str_replace(",)", ")", $sql1);
         $sql2 = str_replace(",)", ")", $sql2);
         $sql = $sql1 . $sql2;

     
         if (mysqli_query($this->_db_handler, $sql)) {
             $this->disconnect();
             return true;
         } else {
             $this->disconnect();
             return false;
         }
     }
 }

 public function update($edited_values, $id) {
    $table = $this->_table;
    $primary_key = $this->_primary_key;
    $sql = "update  `" . $table . "` set  ";
    foreach ($edited_values as $key => $value) {
        if ($key != $primary_key) {
            if (!is_numeric($value))
                $sql .= " `$key` = '$value'  ,";
            else
                $sql .= " `$key` = $value ,";
        }
    }

    $sql .= "where `" . $primary_key . "` = $id";
    $sql = str_replace(",where", "where", $sql);

   
    if (mysqli_query($this->_db_handler, $sql)) {
        $this->disconnect();
        return true;
    } else {
        $this->disconnect();
        return false;
    }
   
}

public function search($column, $column_value,$column2, $column2_value){
    $table = $this->_table;
    $sql = "SELECT * FROM `$table` WHERE `$column` = '$column_value' OR `$column2` = '$column2_value'";
    return $this->getResult($sql);
}


 public function delete($id) {
    $table = $this->_table;
   $primary_key =$this->_primary_key;

    //   // check if the group has associated users
    //   $sql = "SELECT COUNT(*) FROM `articles` WHERE `group_id` = $id";
    //   $result = $this->getResult($sql);
    //   if ($result[0]['count(*)'] > 0) {
    //       // display alert message and prevent the group from being deleted
    //       echo "Cannot delete the user as it has associated articles.";
    //       return false;
    //   }
    
    // Check if user has associated articles
    $articles_table = "articles";
    $articles_count_sql = "SELECT COUNT(*) as article_count FROM `$articles_table` WHERE `user_id` = $id";
    $articles_count = $this->getResult($articles_count_sql);
    if (!$articles_count || $articles_count[0]['article_count'] > 0) {
        echo "User has associated articles, can't delete";
        return false;
    }
  
    // check if the group has associated users
    $sql = "SELECT COUNT(*) FROM `users` WHERE `groupId` = $id";
    $result = $this->getResult($sql);
    if ($result[0]['count(*)'] > 0) {
        // display alert message and prevent the group from being deleted
        echo "Cannot delete the group as it has associated users.";
        return false;
    }

    // delete the group if it doesn't have associated users
    $sql = "DELETE FROM `" . $table . "` WHERE `" . $primary_key . "` = " . $id;
    if (mysqli_query($this->_db_handler, $sql)) {
        $this->disconnect();
        return true;
    } else {
        $this->disconnect();
        return false;
    }
}


   }
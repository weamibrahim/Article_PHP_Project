<?php

 class MySQLHandler implements DbHandler{


   private $_db_handler;
   private $_table;
   protected $_primary_key = 'id';
   public function __construct($table)
   {

       $this->_table=$table;
       $this->connect();
    }


  public function connect(){


         $handler=mysqli_connect(__HOST__,__USER__,__PASS__,__DB__,"3307");
         //    var_dump($handler);
            if(!$handler)
            {   return false;
              
            }
            $this->_db_handler=$handler;
            return true;
         
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
    var_dump($id);
   $primary_key =$this->_primary_key;

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
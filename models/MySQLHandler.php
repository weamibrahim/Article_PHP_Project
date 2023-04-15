<?php

 class MySQLHandler implements DbHandler{


   private $_db_handler;
   private $_table;
   public function __construct($table)
   {

       $this->_table=$table;
       $this->connect();
    }


  public function connect(){


         $handler=mysqli_connect(__HOST__,__USER__,__PASS__,__DB__,__PORT__);
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
    
    private function getResult($sql)
    {
      if(__Depug_Mode__=== 1)
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

   }
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


         $handler=mysqli_connect(__HOST__,__USER__,__PASS__,__DB__,__PORT__);
         //    var_dump($handler);
            if(!$handler)
            {   return false;
              
            }
            $this->_db_handler=$handler;
            return true;
         
    }
 


   }
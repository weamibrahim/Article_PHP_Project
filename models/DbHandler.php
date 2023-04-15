<?php
interface DbHandler{
    public function connect();
     public function get_all_record_paginated($field=array(),$start=0);
   
}
<?php
interface DbHandler{
    public function connect();
    public function get_all_record_paginated($field=array(),$start=0);
   public function get_record_by_id($id);
    public function save($new_values);
    public function delete($id) ;

    public function search($column, $column_value,$column2, $column2_value);
   public function update($edited_values, $id);
}  
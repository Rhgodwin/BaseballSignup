<?php

class playersClass {

    public function __construct() {
    }

    public function __destruct() {
    }


    function recordExists($table, $where, $mysqli) {
        $query = "SELECT * FROM `$table` WHERE $where";
        $result = $mysqli->query($query);
    
        if($result->num_rows > 0) {
                return true; // The record(s) do exist
        }
        return false; // No record found
    }



}
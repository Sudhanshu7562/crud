<?php

$connect = mysqli_connect("localhost","root","","crud");

function insert($table, $array){
    global $connect;
    $cols = implode(",",array_keys($array));
    $values = implode("','",array_values($array));

    $q = mysqli_query($connect,"insert into $table ($cols) value ('$values')");
    if($q){
        return true;
    }
    else{
        return false;
    }
}
function calling($table){
     global $connect;
     $array = [];
     $query = "select * from $table";
     $row = mysqli_query($connect,$query);
     while($data = mysqli_fetch_array($row)){
         $array[] = $data;
     }
     return $array;
}
function delete($table, $where){
     global $connect;
     $query = mysqli_query($connect,"delete from $table where $where");
     return true;
}
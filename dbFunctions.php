<?php

class dbFunctions{


private function Get_UserName_From_DB()
{
    $con = mysqli_connect("localhost", "root", "", "pwdb");
    

    $sql = "SELECT accounts.username FROM accounts";

    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    return $result;

}
//start of insert functions (will need to fix this code)
//to add the UID into player name. going to have to 
//do more research
private function Insert_PlayerName_Into_DB($name){
    $con = mysqli_connect("localhost", "root", "", "pwdb");
    
    $sql = "INSERT INTO `players` VALUE $name";

    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    return $result;

}


//DB retrieval functions
private function Get_PlayPos_From_DB() {
$con = mysqli_connect("localhost", "root", "", "pwdb");

$sql = "SELECT players.position FROM players";
$result = mysqli_query($con, $sql);
mysqli_close($con);
return $result;
}

private function Get_PlayerName_From_DB() {
    $con = mysqli_connect("localhost", "root", "", "pwdb");
    
    $sql = "SELECT players.name FROM players";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    return $result;
}

private function Get_Team_From_DB() {
    $con = mysqli_connect("localhost", "root", "", "pwdb");
    
    $sql = "SELECT players.team FROM players";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    return $result;
}
}
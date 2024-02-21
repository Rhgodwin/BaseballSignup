<?php
ob_start();
class dbConnect{
    
    //private vars
    private $HostName;
    private $UserID;
    private $Password;
    private $DBName;
    private $Con;
    private $name;
    public $mysqli;
    
    //constructor
    public function __construct($host = null, $uid = null, $pw = null, $db = null)
    {
        $this->mysqli = new mysqli($host, $uid, $pw, $db);
        $this->HostName = $host;
        $this->UserID = $uid;
        $this->Password = $pw;
        $this->DBName = $db;
        $this->Con = mysqli_connect($host, $uid, $pw, $db);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }
    //destructor
    public function __destruct()
    {
        $this->Con->Close();
    }
    

}




   


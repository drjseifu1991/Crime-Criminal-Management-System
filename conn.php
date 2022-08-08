<?php
class Database extends PDO {

    private $dbtype; 
    private $host;     
    private $user;
    private $pass; 
    private $database; 

    public function __construct(){ 
        $this->dbtype = 'mysql'; 
        $this->host = 'localhost'; 
        $this->user = 'root'; 
        $this->pass = ''; 
        $this->database = 'final_crms'; 
        $dns = $this->dbtype.':dbname='.$this->database.";host=".$this->host; 
        parent::__construct( $dns, $this->user, $this->pass ); 
    }     
}
$database = new Database();
$conn =& $database;
?>
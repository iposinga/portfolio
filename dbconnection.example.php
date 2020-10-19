<?php


class dbconnection extends PDO
{
    private $host = "<meestal localhost>";
    private $dbname = "<databasenaam>";
    private $user = "<gebruikersnaam>";
    private $pass = "<wachtwoord>";

    public function __construct()
    {
        parent::__construct("mysql:host=".$this->host.";dbname=".$this->dbname."; charset=utf8", $this->user, $this->pass);
        $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // always disable emulated prepared statement when using the MySQL driver
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
}

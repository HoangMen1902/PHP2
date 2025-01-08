<?php

namespace Src\Models;

use mysqli;

class Database
{
    private $db_host;
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_port;

    public function __construct() {
        $this->connect();
    }


    public function connect()
    {
        $this->db_host = $_ENV['DB_HOST'];
        $this->db_name = $_ENV['DB_NAME'];
        $this->db_user = $_ENV['DB_USERNAME'];
        $this->db_pass = $_ENV['DB_PASSWORD'];
        $this->db_port = $_ENV['DB_PORT'];

        $conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name, $this->db_port);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }

}

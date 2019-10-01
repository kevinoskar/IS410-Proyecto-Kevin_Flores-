<?php
    require('../../vendor/autoload.php');

    use Kreait\Firebase\Factory;

    class Database{
        private $keyFile = '../../secret/fly-database-93a13-9fb6fdab50f1.json';
        private $URI = 'https://fly-database-93a13.firebaseio.com/';
        private $db;
        public function __construct(){
            $firebase = (new Factory)
                ->withServiceAccount($this->keyFile)
                ->withDatabaseUri($this->URI)
                ->create();
            $this->db = $firebase->getDatabase();
        }
        public function getDB(){
            return $this->db;
        }
    }
?>
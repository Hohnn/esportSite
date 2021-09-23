<?php

class Database {
    private $_dbName = 'esport';
    private $_dbHost = 'localhost';
    private $_dbUser = 'root';
    private $_dbPass = '';
    
    /**
     * connect to database
     * @return PDO
     */
    protected function connectDatabase(){
        try {
            $db = new PDO("mysql:host=$this->_dbHost;dbname=$this->_dbName;charset=utf8", "$this->_dbUser", "$this->_dbPass");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }
}
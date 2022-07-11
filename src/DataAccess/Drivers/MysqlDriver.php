<?php

namespace ModelToTables\DataAccess\Drivers;

use PDO;
use ModelToTables\Interfaces\IDriver;

class MysqlDriver implements IDriver {

    private $host;
    private $user;
    private $port;
    private $password;
    private $database;
    private $client;
    private $options=array();
    
    function setDriver(array $config): IDriver{
        $this->host= (!isset($config['host'])) ? "" : $config['host'];
        $this->port = (!isset($config['port'])) ? "" : $config['port'];
        $this->user = (!isset($config['user'])) ? "" : $config['user'];
        $this->password = (!isset($config['password'])) ? "" : $config['password'];
        $this->database = (!isset($config['database'])) ? "" : $config['database'];
        return $this;
    }

    function getDriver(): IDriver{
        $strConnection="mysql:host=".$this->host.";port=".$this->port.";dbname=".$this->database;
        $this->client = new PDO($strConnection,$this->user,$this->password,$this->options);
        return $this;
    }

    /**
     * Get the value of host
     */ 
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set the value of host
     *
     * @return  self
     */ 
    public function setHost(string $host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser(string $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Set the value of port
     *
     * @return  self
     */ 
    public function setPort(string $port)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of client
     */ 
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Get the value of database
     */ 
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * Set the value of database
     *
     * @return  self
     */ 
    public function setDatabase(string $database)
    {
        $this->database = $database;

        return $this;
    }

    /**
     * Set the value of options
     *
     * @return  self
     */ 
    public function setOptions(array $options)
    {
        $this->options = $options;

        return $this;
    }
}
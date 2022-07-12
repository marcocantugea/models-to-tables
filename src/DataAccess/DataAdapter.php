<?php 

namespace ModelToTables\DataAccess;

use Exception;
use ModelToTables\Interfaces\IDriver;
use ModelToTables\Interfaces\IDataAdapter;

class DataAdapter implements IDataAdapter{

    private $driver = null;
    private $config = null;
    protected $adapter = null;
    
    function setDriver(IDriver $driver){
        $this->driver=$driver;
    }

    function openConnection(){
        if(empty($this->config)) throw new Exception("configuration not ser ");
        $this->driver = DriverFactory::loadDriver($this->config['driver'],$this->config);
        $this->adapter = $this->driver->getClient();
    }

    function closeConnection(){
        $this->adapter=null;
    }

    function getAdapter(){
        return $this->adapter;
    }

    function setConfig(array $config){
        $this->config = $config;
    }
   
    /**
     * Get the value of driver
     */ 
    public function getDriver() : IDriver
    {
        return $this->driver;
    }
}
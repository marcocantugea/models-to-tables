<?php

namespace ModelToTables\DataAccess;

use Exception;
use ModelToTables\DataAccess\Drivers\MysqlDriver;
use ModelToTables\Interfaces\IDriver;

class DriverFactory{

    public const MYSQL='mysql';
    private $driver;

    public static function getDriver(string $driver): IDriver{
        switch ($driver) {
            case self::MYSQL:
                return new  MysqlDriver();
                break;
            
            default:
                return null;
                break;
        }
    }

    public static function loadDriver(string $driver,array $config): IDriver{
        $driver = self::getDriver($driver);
        if(empty($driver)) throw new Exception("Driver selected do not exist", 1);
        return $driver->setDriver($config)->getDriver();
    }

}
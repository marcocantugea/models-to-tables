<?php 

namespace ModelToTables\Interfaces;

interface IDataAdapter{

    function setDriver(IDriver $driver);
    function openConnection();
    function closeConnection();
    function getAdapter();
    function setConfig(array $config);
    
}
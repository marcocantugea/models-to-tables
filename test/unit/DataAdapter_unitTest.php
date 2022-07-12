<?php

use ModelToTables\DataAccess\DataAdapter;
use ModelToTables\DataAccess\DriverFactory;
use PHPUnit\Framework\TestCase;

class DataAdapter_unitTest extends TestCase {

    public function test_OpenConnection_successOpenConnection(){

        $adapter =  new DataAdapter();
        $adapter->setConfig([
                'driver'=>'mysql',
                'host'=>'localhost',
                'user'=>'root',
                'password'=>'root',
                'port'=>3306,
                'database'=>'test'
        ]);

        $adapter->openConnection();
        $values =$adapter->getAdapter()->query("select @@version;");
        foreach($values as $row){
            $val = $row[0];
        }

        $this->assertEquals("8.0.29",$val);
    }

}
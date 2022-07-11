<?php

use ModelToTables\DataAccess\DriverFactory;
use PHPUnit\Framework\TestCase;

class DriverFactory_unitTest extends TestCase{

    public function test_DriverFactory_createDriver(){
        $driver = DriverFactory::loadDriver(DriverFactory::MYSQL,[
            'host'=>'localhost',
            'user'=>'root',
            'password'=>'root',
            'port'=>3306,
            'database'=>'test'
        ]);

        $client = $driver->getClient();

        $values = $client->query("select @@version;");
        foreach($values as $row){
            $val = $row[0];
        }
        
        // $query=$client->prepare("select * from usuarios where id=:id",array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        // $query->execute([":id"=>1]);
        // $values = $query->fetchAll();
        // print_r($stmt);
        $this->assertInstanceOf(PDO::class,$driver->getClient());
        $this->assertEquals("8.0.29",$val);
    }
}
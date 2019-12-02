<?php

use PHPUnit\Framework\TestCase;
require 'DigitalOcean.php';

final class DoTest extends TestCase{



    public function testCanCreateDomain()
    {
        $do=new DigitalOcean();
        $result=$do->createDomain('wakanda.com','127.0.0.1');
        print_r($result);
        $this->assertArrayHasKey('success',$result);
    }


}


?>
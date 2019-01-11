<?php

use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    public function testArrayIsNotEmpty()
    {
        $dataBase = new DataBase;
        
        $arrData = $dataBase->getData();

        $count = count($arrData);

        $this->assertGreaterThanOrEqual(1,$count);
    }
}

?>
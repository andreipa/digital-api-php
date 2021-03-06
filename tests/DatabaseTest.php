<?php

use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{

    public function testArrayIsNotEmpty()
    {
        $dataBase = new DataBase;
        $arrData = $dataBase->getData();
        $this->assertGreaterThanOrEqual(1,count($arrData));

        return $arrData;
    }

    /**
     * @depends testArrayIsNotEmpty
     */
    public function testLastIdIsAnInteger(array $arrData)
    {
        $dataBase = new DataBase;
        $id = $dataBase->getLastId($arrData);
        $this->assertGreaterThanOrEqual(1,$id);
    }
}

?>
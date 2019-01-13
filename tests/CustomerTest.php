<?php

use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    public function testIsFileJsonWritableOnCreation()
    {
        $fileJson = "api/v1/data.json";
        $this->assertFileIsWritable($fileJson);
    }

}


?>
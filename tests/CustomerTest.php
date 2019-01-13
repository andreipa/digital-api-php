<?php

use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    public function testOnlyAllowNumbers()
    {
        $customer = new Customer();
        $id = $customer->deleteCustomer(1);
        $this->assertGreaterThanOrEqual(1,$id);

    }

}


?>
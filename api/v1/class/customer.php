<?php

class Customer
{

    private $data = array();

    public function __construct()
    {
        $db = new DataBase();
        $this->data = $db->getData();
    }

    public function getCustomer(int $id = 0){
        $arrData = array();
        $customersData = $this->data[0]['customers'];
        if($id>0){
            $key = array_search($id, array_column($customersData, 'id'));
            if($key>0){
                $customers[] = $this->data[0]['customers'][$key];
            }else{
                $customers = $customersData;
            }
        }else{
            $customers = $customersData;
        }
        foreach ($customers as $customer) {
            $arrPhones = array();
            $id = $customer['id'];
            $name = $customer['name'];
            $phones = $customer['phones'];
            foreach ($phones as $phone) {
                if($phone['isActive'] == true){
                    $arrPhones[] = $phone['phone'];
                }else{
                    $arrPhones[] = null;
                }
            }
            $arrPhones = array_values(array_filter($arrPhones));
            $arrData[] = array('id'=>$id,'name'=>$name,'phones'=>$arrPhones);
        }
        return $arrData;
    }
}


?>
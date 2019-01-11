<?php

class Customer
{

    private $db;
    private $data = array();

    public function __construct()
    {
        $this->db = new DataBase();
        $this->data = $this->db->getData();
    }

    public function getCustomer(int $id = 0){
        $arrData = array();
        $customersData = $this->data;
        if($id>0){
            $key = array_search($id, array_column($customersData, 'id'));
            if(!empty($key)){
                $customers[] = $this->data[$key];
            }else{
                $customers = $customersData;
            }
        }else{
            $customers = $customersData;
        }
        foreach ($customers as $customer) {
            $arrPhones = array();
            $id = $customer['id'];
            $token = $customer['token'];
            $registered = $customer['registered'];
            $updated = $customer['updated'];
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
            $arrData[] = array('id'=>$id,'token'=>$token,'registered'=>$registered,'updated'=>$updated,'name'=>$name,'phones'=>$arrPhones);
        }
        return $arrData;
    }

    public function createCustomer(string $newData)
    {
        $customersData = $this->data;
        $newData = json_decode($newData,true);
        $newData['id'] = $this->db->getLastId($customersData);
        $newData['registered'] = date('Y-m-d H:i:s');
        $newData['updated'] = date('Y-m-d H:i:s');
        $newData['token'] = uniqid();
        array_push($customersData,$newData);
        $jsonData = json_encode($customersData);
        file_put_contents('data.json',$jsonData);
    }

    public function deleteCustomer(int $id = 0){
        $customersData = $this->data;
        if($id>0){
            $key = array_search($id, array_column($customersData, 'id'));
            array_splice($customersData,$key,1);
            $jsonData = json_encode($customersData);
            file_put_contents('data.json',$jsonData);
        }
    }

    public function updateCustomer(int $id = 0, string $newData){
        $customersData = $this->data;
        if($id>0){
            $key = array_search($id, array_column($customersData, 'id'));
            $arrData = json_decode($newData,true);
            $customersData[$key]['name'] = $arrData['name'];
            $customersData[$key]['updated'] = date('Y-m-d H:i:s');
            $customersData[$key]['phones'] = $arrData['phones'];
            $jsonData = json_encode($customersData);
            file_put_contents('data.json',$jsonData);
        }
    }
}


?>
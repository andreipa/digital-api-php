<?php

class API
{
    private $method = '';
    private $endPoint = '';
    private $args = '';
    private $debug = '';

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $arrUri = explode('/',strtolower(trim($_SERVER['REQUEST_URI'],'/')));
        $this->endPoint = array_slice($arrUri,3);

        $this->getResorce();
    }

    private function getResorce()
    {
        switch ($this->method) {
            case 'GET':
                if($this->endPoint[0] == 'customers'){
                    $customer = new Customer();
                    if(isset($this->endPoint[1])){
                        $id = $this->endPoint[1];
                        $id = intval($id);
                    }else{
                        $id = 0;
                    }
                    $customerPhones = $customer->getCustomer($id);
                    $this->getResponse($customerPhones);
                }
                break;
            case 'POST':
                if($this->endPoint[0] == 'customers'){
                    $customer = new Customer();
                    
                    $postBody = file_get_contents("php://input");
                    $customer->createCustomer($postBody);
                }
            default:
                http_response_code(405);
                break;
        }
    }

    private function getResponse(array $res){
        echo json_encode($res);
    }

    private function debug(){
        var_dump($this->method,$this->endPoint,$this->args,$this->debug);
    }
}


?>
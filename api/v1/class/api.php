<?php

class API
{
    private $method = '';
    private $endPoint = '';
    private $args = '';

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
                    $response = $customer->getCustomer($id);

                    $this->getResponse(200,$response);
                }
                break;
            case 'POST':
                if($this->endPoint[0] == 'customers'){
                    $customer = new Customer();
                    
                    $postBody = file_get_contents("php://input");
                    $customer->createCustomer($postBody);

                    $response = array('message'=>'One or more new resources have been successfully created');
                    $this->getResponse(201,$response);
                }
                break;
            case 'PUT':
                if($this->endPoint[0] == 'customers'){
                    $customer = new Customer();
                    if(isset($this->endPoint[1])){
                        $id = $this->endPoint[1];
                        $id = intval($id);
                    }else{
                        $id = 0;
                    }
                    
                    $postBody = file_get_contents("php://input");
                    $customer->updateCustomer($id,$postBody);

                    $response = array('message'=>'One or more new resources have been successfully updated');
                    $this->getResponse(200,$response);
                }
                break;
            case 'DELETE':
                if($this->endPoint[0] == 'customers'){
                    $customer = new Customer();
                    if(isset($this->endPoint[1])){
                        $id = $this->endPoint[1];
                        $id = intval($id);
                    }else{
                        $id = 0;
                    }
                    $customer->deleteCustomer($id);
                    $response = array('message'=>'One or more new resources have been successfully deleted');
                    $this->getResponse(200,$response);
                }
                break;
            default:
                $response = array('message'=>'Bad request');
                $this->getResponse(400,$response);
                break;
        }
    }

    private function getResponse(int $httpCode,array $response){
        
        http_response_code($httpCode);
        echo json_encode($response);
    }

}


?>
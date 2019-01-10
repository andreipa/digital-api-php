<?php

class DataBase
{

    public function getData()
    {
        $data = file_get_contents("data.json");
        $arrData = json_decode($data,true);

        return $arrData;
    }

    public function appendData($newData){
        $arrData = $this->getData();
        $newData = json_decode($newData,true);
        $newData['id'] = $this->getLastId($arrData);
        array_push($arrData,$newData);
        $jsonData = json_encode($arrData);
        file_put_contents('data.json',$jsonData);
    }

    private function getLastId(array $arrData){
        $count = count($arrData);
        if($count > 0){
            $idx = $count - 1;
            $lastId = $arrData[$idx]['id'] + 1;
        }else{
            $lastId = 1;
        }
        return $lastId;
    }
}

?>
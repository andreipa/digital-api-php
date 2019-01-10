<?php

class DataBase
{
    private $arrData = array();

    public function getData()
    {
        $data = file_get_contents("data.json");
        $this->arrData = json_decode($data,true);

        return $this->arrData;
    }
}

?>
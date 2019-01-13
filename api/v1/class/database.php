<?php

/**
 * Class to simulate a database where data is pulled from json file
 * 
 * @author Andrei Andrade <andrei@andreiandrade.com>
 * @version 1.0.0
 */
class DataBase
{

    /**
     * Return an array of elements from a json file.
     *
     * @version 1.0.0
     * @return array
     */
    public function getData()
    {
        $data = file_get_contents("data.json");
        $arrData = json_decode($data,true);

        return $arrData;
    }

    /**
     * Simulate the autoincrement from a database
     *
     * @version 1.0.0
     * @param array $arrData
     * @return int
     */
    public function getLastId(array $arrData){
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
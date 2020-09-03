<?php

class sql extends PDO {

   private $coon;

    public function __construct() {

    	$this->coon = new PDO("mysql:host=localhost;dbname=dbphp7", "root" , "");
    }


private function setParams($statments, $parameters  = array()){


	foreach ($parameters as $key => $value) {

		$statments->bindParams($key, $value);
	}
}


private function setParam($statments, $key, $value){


	$statments->bindParam($key , $value);
}



public function query($rawQuery, $params = array()){


	$stmt = $this->coon->prepare($rawQuery);

    $this->setParam($stmt, $params);

    $stmt->execute();


    return $stmt;


}

private function select($rawQuery, $params  = array()):array{

	$stmt = $this->$query($rawQuery, $params);

	return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

}


?>
<?php 

namespace Teamdev\Ecommerce\Infra\Helper;

use mysqli;

class MysqliConnect implements Connect {

  const HOST = "localhost";

  public function connect() 
  {
    $conn = new mysqli(self::HOST, "admin", "Bd@admin123", "ecommerce");

    if ($conn->connect_error) {
      echo "Error: ". $conn->connect_error; 
    }

    return $conn;
  }
}
<?php 

class App {

  public function setup() 
  {
    $this->mapperRequest();
  }

  private function mapperRequest() 
  {

    $controller = $this->getController();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $request = $this->mapperRequestPost();

      $ctr = new $controller();
      $ctr->handle($request);
    
    } else {
      $this->mapperRequestGet();
    }
  }

  private function mapperRequestPost() {
    $request = new HttpRequest();
    $request->body = json_decode(file_get_contents('php://input'));
    return $request;
  }

  private function mapperRequestGet() {
    $request = $_SERVER;
    var_dump($request['QUERY_STRING']);
    //$httpRequest = new HttpRequest();
  }

  private function getController() 
  {
    $request = $_SERVER;
    $query = $request['QUERY_STRING'];
    $arrayRoutes = [
      [
        'method' => 'POST', 'route' => 'produto', 'controller' => 'CreateProductController',
        'method' => 'GET', 'route' => 'produto', 'controller' => 'ListProjectController'
      ]
      
    ];
    foreach ($arrayRoutes as $route) {
      if ($route['route'] == $query) {
         return $route['controller'];
      }
    }
  }
}
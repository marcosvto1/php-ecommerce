<?php

use Teamdev\Ecommerce\Main\Factories\Product\ProductFactory;

require __DIR__ . '/../vendor/autoload.php';

  if ($_POST) {
    $factorie = new ProductFactory();
    $controller = $factorie->makeProductController();
    $controller->handle([
      'name' => $_POST['name'],
      'description' => "Desc produto 1",
      'price' => 10,
      'width' => 10,
      'height' => 1.45,
      "lenght" => 3.00,
      "weight" => 300,
      "slug" => "produto_1"
    ]);
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

</head>
<body>
  <h2>Produtos</h2>
  <div id="app">
    <div>
    <form id="formProduct" method="POST">
      <input type="text" name="name">
    </form>
    {{ message }}
    <button @click="submit" >Enviar</button>
    </div>
  </div>

  <script>
    var vue = new Vue({
      el: '#app',
      data: {
        message: 'Olá'
      },
      methods: {
        submit() {
          document.getElementById('formProduct').submit()
        }
      }
    });  
  </script>

</body>
</html>
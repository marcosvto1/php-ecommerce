<?php

namespace Teamdev\Ecommerce\Main\Factories\Product;

use Teamdev\Ecommerce\Data\UseCases\Product\DbCreateProduct;
use Teamdev\Ecommerce\Infra\DB\Mysqli\Product\ProductRepository;
use Teamdev\Ecommerce\Infra\Helper\MysqliConnect;
use Teamdev\Ecommerce\Presentation\Controllers\CreateProductController;

class ProductFactory {
  public function makeProductController() {
    $connect = new MysqliConnect();
    $produtoRepo = new ProductRepository($connect);
    $useCase = new DbCreateProduct($produtoRepo);
    $controller = new CreateProductController($useCase);
    return $controller;
  }
}
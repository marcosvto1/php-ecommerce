<?php

namespace Teamdev\Ecommerce\Presentation\Controllers;

use Teamdev\Ecommerce\Domain\Models\ProductModel;
use Teamdev\Ecommerce\Domain\UseCases\CreateProduct;

class CreateProductController {

  protected $createProductUseCase;

  public function __construct(CreateProduct $createProduct) {
    $this->createProductUseCase = $createProduct;
  }

  public function handle($request, $response, $args)
  {
    $productModel = new ProductModel($request->getBody());
    if (!$productModel) {
        return $response->withStatus(400)
            ->withHeader('Content-Type', 'application/json');
    }
    $response->write($this->createProductUseCase->create($productModel));
    return $response->withHeader('Content-Type', 'application/json');
  }
}
<?php


namespace Teamdev\Ecommerce\Data\UseCases\Product;

use Teamdev\Ecommerce\Data\Protocols\DB\Product\CreateProductRepository;
use Teamdev\Ecommerce\Domain\Models\ProductModel;
use Teamdev\Ecommerce\Domain\UseCases\CreateProduct;

class DbCreateProduct implements CreateProduct {

  private $createProductRepository;

  public function __construct(CreateProductRepository $createProductRepository)
  {
    $this->createProductRepository = $createProductRepository;
  }

  public function create(ProductModel $productModel) {
    $product = $this->createProductRepository->create($productModel);
    return $product;
  }
}
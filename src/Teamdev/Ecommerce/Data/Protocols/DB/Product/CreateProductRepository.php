<?php

namespace Teamdev\Ecommerce\Data\Protocols\DB\Product;

use Teamdev\Ecommerce\Domain\Models\ProductModel;

interface CreateProductRepository {
  function create(ProductModel $productModel);
}
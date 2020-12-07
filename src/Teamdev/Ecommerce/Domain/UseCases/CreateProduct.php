<?php 

namespace Teamdev\Ecommerce\Domain\UseCases;

use Teamdev\Ecommerce\Domain\Models\ProductModel;

interface CreateProduct {
 function create(ProductModel $productModel);
}
<?php 

namespace Teamdev\Ecommerce\Infra\DB\Mysqli\Product;

use Teamdev\Ecommerce\Data\Protocols\DB\Product\CreateProductRepository;
use Teamdev\Ecommerce\Domain\Models\ProductModel;
use Teamdev\Ecommerce\Infra\Helper\Connect;

class ProductRepository implements CreateProductRepository {

  private $connect;

  function __construct(Connect $connect)
  {
    $this->connect = $connect->connect();
  }

  function create(ProductModel $productModel) {
    $product = null;
    try {
      $stmt = $this->connect->prepare("INSERT INTO products (name, description, price, width, height, lenght, weight, slug) values (?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param(
        "ssddddds", 
        $productModel->getName(),
        $productModel->getDescription(),
        $productModel->getPrice(),
        $productModel->getWeight(),
        $productModel->getHeight(),
        $productModel->getLenght(),
        $productModel->getHeight(),
        $productModel->getSlug()
      );
      if ($stmt->execute()) {
        $query = "SELECT * FROM products ORDER BY products.id DESC LIMIT 0, 1";
        if ($result =  $this->connect->query($query)) {
          while ($row = $result->fetch_assoc()) {
            $product = $this->mapperModel($row);
          }
        }
      }

      $stmt->close();

      return $product;

    } catch (\Exception $error) {
      die($error);
    }

  }

  private function mapperModel($data) {
    $productModel = new ProductModel($data);
    return $productModel;
  }
}
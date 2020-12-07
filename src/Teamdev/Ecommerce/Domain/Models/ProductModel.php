<?php 

namespace Teamdev\Ecommerce\Domain\Models;

class ProductModel implements \JsonSerializable {
  private $id;
  private $name;
  private $description;
  private $price;
  private $width;
  private $lenght;
  private $weight;
  private $slug;
  private $height;

  public function getId() 
  {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getDescription() 
  {
    return $this->description;
  }

  public function setDescription($description) {
    $this->description = $description;
  }

  public function getWidth() 
  {
    return $this->width;
  }

  public function setWidth($price) {
    $this->width = $price;
  }


  public function getPrice() 
  {
    return $this->price;
  }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLenght()
    {
        return $this->lenght;
    }

    /**
     * @param mixed $lenght
     */
    public function setLenght($lenght)
    {
        $this->lenght = $lenght;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

  public function setPrice($price) {
    $this->description = $price;
  }


    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }


    public function __construct($objJson)
  {
    if (isset($objJson)) {
      isset($objJson->id) ? $this->setId($objJson->id): $this->setId(null);
      $this->mapper($objJson);
    }
  }

  private function mapper($objJson)
  {
    if (isset($objJson)) {
        $this->setName($objJson['name']);
        $this->setDescription($objJson['description']);
        $this->setPrice($objJson['price']);
        $this->setWeight($objJson['weight']);
        $this->setLenght($objJson['length']);
        $this->setSlug($objJson['slug']);
        $this->setHeight($objJson['height']);
    }
  }

  public function jsonSerialize()
  {
      return [
        'id' => $this->id,
        'name' => $this->name,
        'description' => $this->description,
        'price' => $this->price,
        'width' => $this->width,
        'lenght' => $this->lenght,
         'height' => $this->height,
        'weight' => $this->weight,
        'slug' => $this->slug
      ];
  }
}
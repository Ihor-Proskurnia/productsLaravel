<?php

namespace App\Http\Services;

use App\Http\Repositories\ProductRepository;

class ProductService
{
  /**
  * @var $productRepository
  */
  public $productRepository;

  /** 
  * @param ProductRepository $productRepository
  */
  public function __construct(ProductRepository $productRepository)
  {
    $this->productRepository = $productRepository;
  }
}
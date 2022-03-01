<?php

namespace App\Http\Repositories;

use App\Http\Models\Product;

class ProductRepository extends BaseRepository
{
  /**
  * ProductRepository constructor.
  *
  * @param Product $model
  */
  public function __construct(Product $model)
  {
    $this->model = $model;
  }

  /**
  * Get products.
  *
  * @param string $sort
  *
  * @return array
  */
  public function getAllProducts($sort)
  {
    $products = $this->model->get();

    if($sort !== null){
      if($sort == 'ASC'){
        $resoult = $products->sortBy('price');
      }
      if($sort == 'DESC'){
        $resoult = $products->sortByDesc('price');
      }
    }
    else{
      $resoult = $products;
    }

    return $resoult;
  }

  /**
  * Add a new product.
  *
  * @param array $data
  *
  * @return void
  */
  public function storeProduct($data)
  {
    $product = $this->model;

    return $product->create($data);
  }

  /**
  * Update an existing product by id.
  *
  * @param array $data
  *
  * @return void
  */
  public function updateProduct($data)
  {
    $product = $this->model;

    return $product->where('id', $data['id'])->update($data);
  }

  /**
  * Delete product.
  *
  * @param int $ id
  *
  * @return void
  */
  public function deleteById($id)
  {
    return $this->model->where('id', $id)->delete();
  }
}
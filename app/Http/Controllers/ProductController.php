<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ProductService;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{    
    /**
    * @var $productService
    */
    public $productService;

    /**
    * Create a new controller instance.
    *
    * @param ProductService $productService
    *
    * @return void
    */
    public function __construct(ProductService $productService)
    {
        $this->middleware('auth');
        $this->productService = $productService;
    }

    /**
    * Get all products from the model.
    *
    * @param \Illuminate\Http\Request $request
    *
    * @return \Illuminate\Http\Response
    */
    public function getAllProducts(Request $request)
    {
        $data = $this->productService->productRepository->getAllProducts($request->get('sort'));
        return view('home', compact('data'));
    }

    /**
    * Display a listing for add new product.
    *
    * @return \Illuminate\Http\Response
    */
    public function addForm()
    { 
        return view('addProduct');
    }

    /**
    * Display a listing for update product.
    *
    * @return \Illuminate\Http\Response
    */
    public function updateForm()
    { 
        return view('updateProduct');
    }

    /**
    * Display a listing for delete product.
    *
    * @return \Illuminate\Http\Response
    */
    public function deleteForm()
    {
        return view('deleteProduct');
    }

    /**
    * Add a new product.
    *
    * @param \Illuminate\Http\Request $request
    *
    * @return array
    */
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'desc' => 'required',
        ]);

        $this->productService->productRepository->storeProduct($request->all());
    
        return redirect()->route('getAllProducts');
    }

    /**
    * Update an existing product by id.
    *
    * @param \Illuminate\Http\Request $request
    *
    * @return void
    */
    public function updateProduct(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required|max:255',
            'price' => 'required',
            'desc' => 'required',
        ]);

        $this->productService->productRepository->updateProduct($request->only(['id','name', 'price', 'desc']));
    
        return redirect()->route('getAllProducts');
    }

    /**
    * Delete a product by id.
    *
    * @param \Illuminate\Http\Request $request
    *
    * @return void
    */
    public function deleteById(Request $request)
    {
        $this->productService->productRepository->deleteById($request->get('id'));

        return redirect()->route('getAllProducts');
    }
}
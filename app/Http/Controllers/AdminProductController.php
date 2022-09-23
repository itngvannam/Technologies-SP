<?php

namespace App\Http\Controllers;
use App\Compunents\Recusive;
use Illuminate\Http\Request;
use App\Category;

class AdminProductController extends Controller
{   
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index(){

        return view('admin.product.index');
    }
    public function create()

    {
        $htmlOp = $this->getCategory($parentId = '');
        return view('admin.product.add', compact('htmlOp'));
    }
    public function getCategory($parentId)
   {
      $data = $this->category->all();
      $recusive  = new Recusive($data);
      $htmlOp = $recusive->categoryRecusive($parentId);  
      return $htmlOp;
   }
   
}

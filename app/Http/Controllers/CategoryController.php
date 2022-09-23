<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Compunents\Recusive;

class CategoryController extends Controller
{
   private $category;
   public function __construct(Category $category)
   {
     // $this -> htmlSelect = '';
      $this->category = $category; 
   }

   public function create()
   {
      $htmlOp = $this->getCategory($parentId = '');
      return view( 'admin.category.add', compact('htmlOp'));

  
   //return view('category.add');
   //dd('created');
   }
   public function index()
   {
      $categories = $this->category->latest()->paginate(5);
      return view('admin.category.index', compact('categories'));
   }
   public function store(Request $request){
      $this ->category->create([
         'name' => $request->name,
         'parent_id' => $request->parent_id,
         'slug' => str_slug($request->name)
      ]);
      return redirect()->route('categories.index');
   }
   public function getCategory($parentId)
   {
      $data = $this->category->all();
      $recusive  = new Recusive($data);
      $htmlOp = $recusive->categoryRecusive($parentId);  
      return $htmlOp;
   }
   public function edit($id)
   {
      $category = $this->category->find($id);
      $htmlOp = $this-> getCategory($category->parent_id);
     
      return view('admin.category.edit', compact('category', 'htmlOp'));
   }
   public function update($id, Request $request)
   {
      $this->category->find($id)->update([
         'name' => $request->name,
      'parent_id' => $request->parent_id,
      'slug' => str_slug($request->name)
      ]);
      return redirect()->route('categories.index');
   }
   public function delete($id)
   {
      $this->category->find($id)->delete();
      return redirect()->route('categories.index');
   }
}

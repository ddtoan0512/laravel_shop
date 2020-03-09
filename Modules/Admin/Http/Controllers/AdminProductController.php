<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminProductController extends Controller
{
    public function index()
    {
        return view('admin::product.index');
    }
    
    public function create(){
        $categories = $this->getCategories();
        return view('admin::product.create', compact('categories'));
    }

    public function store(RequestProduct $request){
        // dd($request->all());
        $this->insertOrUpdate($request);
        return redirect()->back();
    }

    public function insertOrUpdate($request, $id='')
    {
        $product = new Product();

        if($id){
            $product = Product::find($id);
        }

        $product->pro_name = $request->pro_name;
        $product->pro_slug = str_slug($request->pro_name);
        $product->pro_category_id = $request->pro_category_id;
        $product->pro_price = $request->pro_price;
        $product->pro_sale = $request->pro_sale;
        $product->pro_description = $request->pro_description;
        $product->pro_title_seo = $request->pro_title_seo ? $request->pro_title_seo : '';
        $product->pro_description_seo = $request->pro_description_seo ? $request->pro_description_seo : '';

        $product->save();
    }

    public function getCategories(){
        return Category::all();
    }

}

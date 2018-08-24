<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables as Datatables;


class HomeController extends Controller
{
    public function index(){
       $categories = Category::all();
       return view('index')
           ->with(['categories' => $categories]);
    }

    public function getData(Request $request){

        $data = Product::select('products.*',  'categories.alias',  'categories.title AS cat_title' )
            ->join('product_category', 'product_category.product_id', '=', 'products.id')
            ->join('categories', 'product_category.category_id', '=', 'categories.id')
            ->where('alias', 'like', '%'.$request->get('category').'%')
            ->groupBy('products.id')
            ->get();


        return Datatables::of($data)
            ->editColumn('description', function($product) {
                if(strlen($product->description)  > 50)
                    return  mb_substr($product->description, 0, 50).'...';
                else
                    return $product->description;
            })
            ->editColumn('image', function($product) {
               return '<img src="'.$product->image.'" title="'.$product->title.'" width="60%">';
            })
            ->rawColumns(['image'])
            ->make(true);
    }
}

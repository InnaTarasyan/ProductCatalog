<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables as Datatables;
use DB;

class HomeController extends Controller
{
    public function index(){
       $categories = Category::all();
       return view('index')
           ->with(['categories' => $categories]);
    }

    public function getData(Request $request){

        $data = Product::select('products.*',  'categories.alias',  'categories.title AS cat_title', DB::raw('SUM(offers.sales) as popular') )
            ->join('product_category', 'product_category.product_id', '=', 'products.id')
            ->join('categories', 'product_category.category_id', '=', 'categories.id')
            ->join('product_offer', 'products.id', '=', 'product_offer.product_id')
            ->join('offers', 'product_offer.offer_id', '=', 'offers.id')
            ->where('alias', 'like', '%'.$request->get('category').'%')
            ->orderBy('popular', 'DESC')
            ->groupBy('products.id')
            ->get();


        return Datatables::of($data)
            ->editColumn('description', function($product) {
                if(strlen($product->description)  > 50)
                    return  mb_substr($product->description, 0, 50).'...';
                else
                    return $product->description;
            })
            ->editColumn('url', function($product) {
                if(strlen($product->url)  > 25)
                    return  mb_substr($product->url, 0, 25).'...';
                else
                    return $product->url;
            })
            ->editColumn('image', function($product) {
               return '<img src="'.$product->image.'" title="'.$product->title.'" width="70%">';
            })
            ->rawColumns(['image'])
            ->make(true);
    }
}

<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables as Datatables;

class HomeController extends Controller
{
    public function index(){
       return view('index');
    }

    public function getData(){
        return Datatables::of(Product::all())
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

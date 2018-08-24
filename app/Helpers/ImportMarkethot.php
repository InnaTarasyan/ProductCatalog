<?php

namespace App\Helpers;

use App\Category;
use App\Product;
use App\Offer;
use GuzzleHttp;
use DB;

class ImportMarkethot{

    public function retrieveData(){
        $client = new GuzzleHttp\Client();
        $response = json_decode($client->get(config('settings.url'))
            ->getBody(), true);

//        DB::table('categories')->delete();
//        DB::table('offers')->delete();

        foreach($response['products'] as $product){

            foreach($product['offers'] as $offer){
                if (!count(Offer::find($offer['id']))) {
                    Offer::create($offer);
                }
            }

            foreach($product['categories'] as $category){
                if (!count(Category::find($category['id']))) {
                    Category::create($category);
                }
            }

            $offers = array_map(function($element){return $element['id'];}, $product['offers']);
            $categories = array_map(function($element){return $element['id'];}, $product['categories']);


            $pr = Product::find($product['id']);

            if(empty($pr)){
                $pr = Product::create($product);
            } else {
                $pr->update($product);
            }

            $pr->categories()->attach($categories);
            $pr->offers()->attach($offers);


        }

    }
}
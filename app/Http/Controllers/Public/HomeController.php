<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index()
    {
        $products =  Product::find(3);
        $mediaItems = $products->getMedia("product_images");
        dd($mediaItems);
    }
}

<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index()
    {
        $products =  Product::all();

        dd($products);
    }
}

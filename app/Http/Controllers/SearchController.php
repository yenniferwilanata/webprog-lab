<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if (empty($request->all()))
            return view('search');
        else
            return $this->search($request);
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);
        $last_query = $request->search;

        $categories_b = [
            'Main Course' => $request->main,
            'Beverage' => $request->beverage,
            'Dessert' => $request->dessert,
        ];
        $categories = [];
        
        foreach ($categories_b as $key => $value)
        {
            if (!$value)
                continue;
            $categories[] = $key;
        }
        
        $products = Item::where("name", "LIKE", "%$request->search%")->whereIn('type', $categories);
        $products = $products->get();
        return view('searchresults', compact('products', 'last_query', 'categories_b'));
    }
}

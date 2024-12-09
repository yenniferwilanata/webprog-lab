<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $main_dishes = Item::where('type', 'Main Course')->paginate(6, ['*'], 'main');
        $beverages = Item::where('type', 'Beverage')->paginate(6, ['*'], 'beverage');
        $desserts = Item::where('type', 'Dessert')->paginate(6, ['*'], 'dessert');
        return view('index', compact('main_dishes', 'beverages', 'desserts'));
    }
}

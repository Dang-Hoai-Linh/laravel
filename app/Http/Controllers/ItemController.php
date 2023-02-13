<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Item;

class ItemController extends Controller
{
    public function addItem(Request $request)
    {
        $item = new Item;
        $item->name = $request->name;
        $item->url = $request->url;
        $item->active = $request->active;
        $item->passive = $request->passive;
        $item->price = $request->price;
        $item->price_enhance = $request->price_enhance;
        $item->save();

        return response()->json(
            [
                'message' => 'add item success'
            ],
            200
        );
    }

    public function getItem(Request $request)
    {
        $item = Item::all();

        return response()->json(
            [
                'message' => 'get item success',
                'itemData' => $item
            ],
            200
        );
    }
}

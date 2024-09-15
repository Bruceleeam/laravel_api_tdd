<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return $items;
    }

    public function store(Request $request)
    {
        return Item::create($request->all());
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return response('', HttpFoundationResponse::HTTP_NO_CONTENT);
    }
}

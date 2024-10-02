<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class ItemController extends Controller
{
    public function index(User $user)
    {
        $items = Item::where(['user_id' => $user->id])->get();

        return $items;
    }

    public function store(Request $request, User $user)
    {
        $request['user_id'] = $user->id;
        return Item::create($request->all());
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return response('', HttpFoundationResponse::HTTP_NO_CONTENT);
    }

    public function update(Request $request, Item $item)
    {
        $item->update($request->all());

        return response($item);
    }
}

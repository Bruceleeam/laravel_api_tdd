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
        $item = $user->items;

        return response($item);
    }

    public function store(Request $request, User $user)
    {
        return $user->items()->create($request->all());
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

<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil mendapatkan data barang',
            'data' => Item::all()
        ]);
    }

    public function store(Request $request)
    {
        $item = Item::create($request->all());
        return response()->json($item, 201);
    }

    public function show($id)
    {
        return Item::find($id);
    }

    public function update(Request $request, $id)
    {
    $item = Item::find($id);
    if (!$item) {
        return response()->json(["message" => "Item not found"], 404);
    }

    $item->update($request->all());
    return response()->json($item, 200);
    }

    public function destroy($id)
    {
        Item::destroy($id);
        return response()->json(null, 204);
    }
}

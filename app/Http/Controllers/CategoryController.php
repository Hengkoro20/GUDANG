<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil mendapatkan data katego',
            'data' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return response()->json($category, 201);
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(["message" => "Category not found"], 404);
        }

        return response()->json($category, 200);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(["message" => "Category not found"], 404);
        }

        $category->update($request->all());
        return response()->json($category, 200);
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(["message" => "Category not found"], 404);
        }

        $category->delete();
        return response()->json(["message" => "Category deleted successfully"], 200);
    }
}

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
            'message' => 'Berhasil mendapatkan data kategori',
            'data' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category = Category::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'Kategori berhasil ditambahkan',
            'data' => $category
        ]);
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status' => 404,
                'message' => 'Kategori tidak ditemukan'
            ]);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Berhasil mendapatkan data kategori',
            'data' => $category
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status' => 404,
                'message' => 'Kategori tidak ditemukan'
            ]);
        }

        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Kategori berhasil diperbarui',
            'data' => $category
        ]);
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status' => 404,
                'message' => 'Kategori tidak ditemukan'
            ]);
        }

        $category->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Kategori berhasil dihapus'
        ]);
    }
}

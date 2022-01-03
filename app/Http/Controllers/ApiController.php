<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $books = BooksModel::all();

        return response()->json($books);
    }

    public function store(Request $request)
    {
        $data = $request->json()->all();
        BooksModel::create($data);
        return response()->json(['messages' => 'Data berhasil ditambahkan !'], 201);
        try {
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }
    }


    public function show(Request $request)
    {
        $books = BooksModel::find($request->id);
        return response()->json($books, 200);
    }

    public function update(Request $request, $id)
    {
        $books_data = BooksModel::find($id);
        if ($books_data) {
            $books_data->title = $request->json('title');
            $books_data->published = $request->json('published');
            $books_data->author = $request->json('author');
            $books_data->update();
            return response()->json(['messages' => 'data berhasil diupdate'], 200);
        } else {
            return response()->json(['messages' => 'data gagal diupdate'], 400);
        }
    }

    public function destroy($id)
    {
        $books_data = BooksModel::find($id);

        if ($books_data) {
            $books_data->delete();
            return response()->json(['messages' => 'data berhasil dihapus'], 200);
        } else {
            return response()->json(['messages' => 'data gagal diupdate'], 400);
        }
    }
}

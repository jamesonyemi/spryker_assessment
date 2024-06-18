<?php

namespace App\Http\Controllers;

use App\Models\PyzBook;
use Illuminate\Http\Request;

class PyzBookController extends Controller
{
    public function index()
    {
        $books = PyzBook::all();
        return response()->json($books);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'publication_date' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $book = PyzBook::create($validated);
        return response()->json($book, 201);
    }

    public function show($id)
    {
        $book = PyzBook::findOrFail($id);
        return response()->json($book);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'publication_date' => 'sometimes|required|date_format:Y-m-d H:i:s',
        ]);

        $book = PyzBook::findOrFail($id);
        $book->update($validated);

        return response()->json($book);
    }

    public function destroy($id)
    {
        $book = PyzBook::findOrFail($id);
        $book->delete();

        return response()->json(['message' => 'Book deleted successfully']);
    }
}

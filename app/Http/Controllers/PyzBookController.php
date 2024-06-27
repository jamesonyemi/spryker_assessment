<?php

namespace App\Http\Controllers;

use App\Models\PyzBook;
use Illuminate\Database\QueryException;
use App\Http\Requests\StorePyzBookRequest;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PyzBookController extends Controller
{
    /**
     * Display a listing of the books.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function index()
    {
        try {
            $books = PyzBook::all();
            return response()->json($books, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Database connection error',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created book in storage.
     *
     * @param  \App\Http\Requests\StorePyzBookRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(StorePyzBookRequest $request)
    {
        try {
            $book = PyzBook::create($request->validated());
            return response()->json(['data' => $book, 'status' => 'success',], Response::HTTP_CREATED);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'messages' => $e->validator->errors()->first(),
                'errors' => $e->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to create book',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified book.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $book = PyzBook::findOrFail($id);
            return response()->json($book, Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Book not found',
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Database connection error',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified book in storage.
     *
     * @param  \App\Http\Requests\StorePyzBookRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StorePyzBookRequest $request, $id)
    {
        try {
            $book = PyzBook::findOrFail($id);
            $book->update($request->validated());
            return response()->json(['data' => $book, 'message' => 'updated successfully'], Response::HTTP_OK );
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Book not found',
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'messages' => $e->validator->errors()->first(),
                'errors' => $e->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to update book',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified book from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $book = PyzBook::findOrFail($id);
            $book->delete();
            return response()->json(['message' => 'Book deleted successfully'], Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Book not found',
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to delete book',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

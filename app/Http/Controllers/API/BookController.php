<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BookRepository;
use App\Http\Resources\BooksResource;

class BookController extends Controller
{
    protected $book;

    public function __construct(BookRepository $book) {
        $this->book = $book;
    }

    public function store(Request $request)
    {
        try {
            $book = $this->book->store($request->all());

            if ($book) {
                return response()->json([
                    'message' => 'success',
                    'content' => $book,
                    'code' => 200
                ]);
            } else {
                return response()->json([
                    'message' => 'failed',
                    'code' => 401
                ]);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'success',
                'content' => $th,
                'code' => 500
            ]);
        }
    }

    public function index()
    {
        try {
            $books = $this->book->getBooks();

            return response([
                'message' => 'success',
                'content' => new BooksResource($books),
                'code' => 200
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th,
                'code' => 500
            ]);
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $book = $this->book->update($request->all(), $id);

            return response([
                'message' => 'success',
                'code' => 200
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th,
                'code' => 500
            ]);
        }
    }

    public function show(int $id)
    {
        try {
            $book = $this->book->show($id);

            return response()->json([
                'message' => 'success',
                'data' => $book,
                'code' => 200
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th,
                'code' => 500
            ]);
        }
    }

    public function destroy(int $id)
    {
        try {
            $book = $this->book->delete($id);

            return response([
                'message' => 'success',
                'code' => 200
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th,
                'code' => 500
            ]);
        }
    }
}

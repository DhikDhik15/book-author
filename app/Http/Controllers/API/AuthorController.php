<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorResource;
use App\Repositories\AuthorRepository;

class AuthorController extends Controller
{
    protected $author;

    public function __construct(AuthorRepository $author) {
        $this->author = $author;
    }

    public function store(Request $request)
    {
        try {
            $author = $this->author->store($request->all());

            if ($author) {
                return response()->json([
                    'message' => 'success',
                    'content' => $author,
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
            $authors = $this->author->getAuthors();

            return response([
                'message' => 'success',
                'content' => new AuthorResource($authors),
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
            $author = $this->author->update($request->all(), $id);

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
            $author = $this->author->show($id);

            return response()->json([
                'message' => 'success',
                'data' => $author,
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
            $author = $this->author->delete($id);

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

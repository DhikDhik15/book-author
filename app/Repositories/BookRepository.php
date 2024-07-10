<?php

namespace App\Repositories;

use App\Models\Books;
use App\Models\Authors;
use Illuminate\Support\Facades\Cache;

class BookRepository
{
    public function store (array $data)
    {
        return Books::create($data);
    }

    public function getBooks()
    {
        $cache = Cache::remember('Books', now()->addMinutes(), function () {
            return Books::orderBy('id','DESC')->get();
        });

        return $cache;
    }

    public function update(array $data, int $id)
    {
        $author = Books::find($id);

        return $author->update($data);
    }

    public function show(int $id)
    {
        $cache = Cache::remember('book', now()->addMinutes(), function () use($id) {
            return Books::find($id);
        });

        return $cache;
    }

    public function delete($id)
    {
        $find = Books::find($id);

        return $find->delete();
    }
}

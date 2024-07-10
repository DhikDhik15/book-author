<?php

namespace App\Repositories;

use App\Models\Authors;
use Illuminate\Support\Facades\Cache;

class AuthorRepository
{
    public function store (array $data)
    {
        return Authors::create($data);
    }

    public function getAuthors()
    {
        $cache = Cache::remember('authors', now()->addMinutes(150), function () {
            return Authors::orderBy('id','DESC')->get();
        });

        return $cache;
    }

    public function update(array $data, int $id)
    {
        $author = Authors::find($id);

        return $author->update($data);
    }

    public function show(int $id)
    {
        $cache = Cache::remember('author', now()->addMinutes(150), function () use($id) {
            return Authors::find($id);
        });

        return $cache;
    }

    public function delete($id)
    {
        $find = Authors::find($id);

        return $find->delete();
    }
}

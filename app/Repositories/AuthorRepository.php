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
}

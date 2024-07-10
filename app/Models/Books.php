<?php

namespace App\Models;

use App\Models\Authors;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Books extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'mysql';

    protected $table = 'books';

    protected $guarded = ['id'];

    public function author()
    {
        return $this->hasOne(Authors::class, 'id', 'author_id'); //relation to author
    }
}

<?php

namespace App\Models;

use App\Models\Books;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Authors extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'mysql';

    protected $table = 'users';

    protected $guarded = ['id'];

    public function books()
    {
        return $this->hasMany(Books::class, 'author_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BooksModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'books';
    protected $guarded = ['id'];
}

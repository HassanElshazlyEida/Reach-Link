<?php

namespace App\Classes;

use App\Models\Category;
use Prettus\Repository\Eloquent\BaseRepository;

class CategoryRepository extends BaseRepository
{
    function model()
    {
        return Category::class;
    }
}

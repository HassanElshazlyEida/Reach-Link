<?php

namespace App\Classes;


use App\Models\Tag;
use Prettus\Repository\Eloquent\BaseRepository;

class TagRepository extends BaseRepository
{
    function model()
    {
        return Tag::class;
    }
}

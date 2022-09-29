<?php

namespace App\Classes;

use App\Models\Ads;
use Prettus\Repository\Eloquent\BaseRepository;

class AdsRepository extends BaseRepository
{
    function model()
    {
        return Ads::class;
    }
}

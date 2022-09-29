<?php

namespace App\Models;

use App\Models\Ads;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    protected $guarded=[];
    protected $table="tags";
    protected $dateFormat = 'Y-m-d';

    use HasFactory;

    public function ad(){
        return $this->belongsTo(Ads::class);
    }
}

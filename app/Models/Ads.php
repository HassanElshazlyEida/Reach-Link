<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{

    protected $fillable = [
        'title',
        'description',
        'type',
        'category_id',
        'advertiser_id',
        'start_date'
     ];

    protected $table="ads";

    protected $dates = ['start_date'];
    use HasFactory;

    public function scopeNotReminder($q) {
        $date_now = date('Y-m-d H:i');
        $date_tomorrow= date("Y-m-d H:i", strtotime("+1 day"));
        return $q->where("start_date",">",$date_now)->where("start_date","<",$date_tomorrow);
    }

    public function getInfoAttribute()
    {
        return [
            $this->title,
            $this->start_date->format('m-d-Y , H:i A')
        ];
    }
}

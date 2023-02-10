<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SidebarAd extends Model
{
    use HasFactory;

    protected $fillable = [
        'sidebar_ad',
        'sidebar_ad_url',
        'sidebar_ad_status',
        'sidebar_ad_loaction'
    ];
}

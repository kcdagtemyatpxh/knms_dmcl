<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news_expe_cate extends Model
{
    use HasFactory;
    protected $table='news_expe_cate';
    protected $fillable = [
        'id',
        'name',
        'alias',
        'cid_parent',
        'seo',
        'status',
        'id_cate',
        'bannertop',
        'bannerright',
        'productbot',
        'created_at',
        'updated_at'
    ];
    public function ExpeCate(){
        return $this->belongsTo('App\Models\news_expe_cate', 'id_cate', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class news_expe_article extends Model
{
    use HasFactory;
    protected $table='news_expe_article';
    protected $fillable = [
        'id',
        'name',
        'alias',
        'cid_parent',
        'content',
        'description',
        'rate',
        'status',
        'name_user',
        'created',
        'updated',
        'seo',
        'is_hot',
        'cid_cate',
        'index_page',
        'canonical',
        'count_view',
        'apply_all',
        'total_rate',
        'product',
        'product2',
        'product3',
        'created_at',
        'updated_at',
        'flag_index',
        'flag_content',
        'type',
        'position',
        'video',
        'cid_collaborator'
    ];
    public function ExpeCate(){
        return $this->belongsTo('App\Models\news_expe_cate', 'cid_cate', 'id');
    }

    public static function FE_Home()
    {
        $leagues = DB::table('news_expe_article as p')
        ->Join('news_expe_cate AS a', 'a.id', '=', 'p.cid_cate')
        ->select('p.id','p.name','p.alias','p.count_view','p.description','p.created_at','p.type','p.video','a.id_cate','a.cid_parent')
        ->get()->toArray();
        return $leagues;
    }

    public static function FE_expe_top_view($date_start = "",$date_end="")
    {
        $leagues = DB::table('news_expe_article as p')
        ->Join('news_expe_cate AS a', 'a.id', '=', 'p.cid_cate')
        ->select('p.id','p.name','p.alias','p.count_view','p.description','p.created_at','p.type','p.video','a.id_cate','a.cid_parent')
        ->where('p.status', '1')
        ->where('p.created_at', '>=', $date_start)
        ->where('p.created_at', '<=', $date_end)
        ->orderBy("p.count_view","DESC")
        ->skip(0)->take(5)
        ->get()->toArray();
        return $leagues;
    }
}

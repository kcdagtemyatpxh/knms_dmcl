<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class news_expe_utility extends Model
{
    use HasFactory;
    protected $table='news_expe_utility';
    protected $fillable = [
        'id',
        'name',
        'alias',
        'description',
        'content',
        'picture',
        'video',
        'name_user',
        'count_view',
        'cid_cate',
        'ordering',
        'status',
        'flag_index',
        'flag_content',
        'created_at',
        'updated_at'
    ];
    public function ExpeCate(){
        return $this->belongsTo('App\Models\news_expe_cate', 'cid_cate', 'id');
    }

    public static function FE_home_utility($limit=5)
    {
        $leagues = DB::table('news_expe_article as p')
        ->Join('news_expe_cate AS a', 'a.id', '=', 'p.cid_cate')
        ->select('p.id','p.name','p.alias','p.count_view','p.content','p.video','p.type','p.description','p.created_at','a.id_cate','a.cid_parent')
        ->Join('news_expe_cate AS a', 'a.id', '=', 'p.cid_cate')
        ->where('p.status','1')
        ->where('a.status','1')
        ->where('p.type','2')
        ->orderBy('p.position','DESC')
        ->skip(0)->take($limit)
        ->get()->toArray();
        return $leagues;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\news_expe_cate;
use App\Models\news_expe_article;
use App\Models\news_expe_utility;
class ApiController extends Controller
{
	public function trangchu(Request $request)
    {
        $news_hot       = news_expe_article::FE_Home();
        $news_cate      = news_expe_cate::where('cid_parent','0')->where('status','1')->orderBy('id', 'desc')->get()->toArray();
        $date_start     = date('Y-m-d', strtotime('-7 days'));
        $date_end       = date('Y-m-d');
        $news_top_view  = news_expe_article::FE_expe_top_view($date_start,$date_end);
        $list_utility   = news_expe_utility::FE_home_utility();
        $data           = array(
            'news_hot'      => $news_hot,
            'news_cate'     => $news_cate,
            'news_top_view' => $news_top_view,
            'list_utility'  => $list_utility
        );
        return response()->json($data);
    }
}
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
class LayoutController extends Controller
{
	public function trangchu(Request $request)
    {
        return View('layout.trangchu');
    }
}
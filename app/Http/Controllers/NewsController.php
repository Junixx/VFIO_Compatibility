<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function getNewsItems(){
	$news_items = DB::select('SELECT * from news order by timestamp desc limit 5;');
	return view('homepage',['news_items' => $news_items]); 
    }
}

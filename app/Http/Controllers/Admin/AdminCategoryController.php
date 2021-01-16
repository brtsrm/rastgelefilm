<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\genres;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $genres = genres::with("filmGenre")->get();
        
        return view("back.category.index",compact("genres"));
    }
}

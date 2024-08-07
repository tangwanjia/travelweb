<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories(){
        $categories = [
            'food',
            'views',
            'archetectures',
        ];

        return view('dashboard', ['categories' => $categories]);
    }
}

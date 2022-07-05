<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
    public function index()
    {
        $provinces = Province::pluck('name', 'province_id');
        return view('sprint-app', compact('provinces'));
    }
}
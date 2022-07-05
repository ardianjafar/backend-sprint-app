<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
    public function province()
    {
        $province = Province::all();

        if ($province) {
            return response()->json([
                'success' => true,
                'message' => 'Detail id!',
                'data'    => $province
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'id Tidak Ditemukan!',
                'data'    => ''
            ], 401);
        }
    }
    public function provinceById(Request $request)
    {
        $province = Province::whereId($request)->first();

        if ($province) {
            return response()->json([
                'success' => true,
                'message' => 'Detail id!',
                'data'    => $province
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'id Tidak Ditemukan!',
                'data'    => ''
            ], 401);
        }
    }
}
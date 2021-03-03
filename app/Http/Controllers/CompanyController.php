<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function show()
    {
        return response()->json([
            'status' => '200'
        ], 200);
    }
}

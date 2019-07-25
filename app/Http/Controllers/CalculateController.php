<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public function __invoke(Request $request) {
    	$path = base_path();
    	$all = json_encode($request->all());
    	$test= json_decode(shell_exec("python3 $path/server.py '$all'"));
    	return response()->json($test);
    }
}

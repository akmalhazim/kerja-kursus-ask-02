<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public function __invoke(Request $request) {
    	$path = base_path();
		$all = json_encode($request->months);
		$price = intval($request->price);

		$result= json_decode(shell_exec("python3 $path/server.py '$all' $price"));
		
    	return response()->json($result);
    }
}

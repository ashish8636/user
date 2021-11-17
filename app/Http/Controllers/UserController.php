<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\ModImages;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Feature;
use App\Models\Product;

class UserController extends Controller
{

	
	
    
    public function users(){
    	return view('user');
    }
	
}
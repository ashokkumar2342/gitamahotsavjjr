<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class FrontController extends Controller
{
	public function index()
	{
		return view('index');
	}
}
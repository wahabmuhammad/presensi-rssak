<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        return view('admin.adminDashboard');
    }

    public function user(){
        return view('admin.kepegawaian.user');
    }
}

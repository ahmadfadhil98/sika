<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Report extends Controller
{
    public function report($period,$month){

        return view('report.neraca');
    }
}

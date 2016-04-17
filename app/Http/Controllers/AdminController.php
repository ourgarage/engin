<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{

    public function getBlank()
    {
        return view('admin.blank');
    }

}
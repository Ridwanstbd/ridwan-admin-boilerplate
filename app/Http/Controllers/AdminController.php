<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function settings(){
        return view("pages.Admin.setting-system");
    }
}

<?php
// app/Http/Controllers/ManageController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index()
    {
        return view('role-permission.nav-links');
    }
}
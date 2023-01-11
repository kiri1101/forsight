<?php

namespace App\Http\Controllers\Core\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {
        notify()->success('this is good', 'hi!');
        return Inertia::render('core/admin/index');
    } 
}

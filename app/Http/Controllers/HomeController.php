<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use App\Models\Customers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Project;
use DB;
use Carbon\Carbon;



class HomeController extends Controller
{
    public function index()
    {
        return view('auth.selection');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

}

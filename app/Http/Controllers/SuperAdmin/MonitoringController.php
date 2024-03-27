<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MonitoringController extends Controller
{
    public function index()
    {
        return view('super_admin.monitoring.index');
    }
}

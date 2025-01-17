<?php

namespace App\Http\Controllers;
use App\Models\Asset;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() {
        $totalUser = User::count();
        $totalAsset = Asset::count();
        return view('pages.dashboard.admin',[

            "totalAsset" => $totalAsset,
            "totalUser" => $totalUser

          ]);
    }
}

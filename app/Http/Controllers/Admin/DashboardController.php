<?php

namespace App\Http\Controllers;
use App\Models\Asset;
use Illuminate\Http\Request;
use App\Models\User;
class DashboardController extends Controller
{
    public function index() {
        $Assets = Asset::with('category')->get();
        $totalAsset = Asset::count();

        return view('pages.dashboard.admin',[
        "Assets" => $Assets,
        "totalAsset" => $totalAsset

      ]);
    }
}

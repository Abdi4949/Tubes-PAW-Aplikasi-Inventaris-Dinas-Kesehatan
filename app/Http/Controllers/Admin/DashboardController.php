<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

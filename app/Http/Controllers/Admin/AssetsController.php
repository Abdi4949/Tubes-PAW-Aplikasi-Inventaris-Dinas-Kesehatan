<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Asset;

class AssetsController extends Controller
{
    public function index() {
        $Assets = Asset::with('category')->get();

        return view('pages.Assets.index', [
            "Assets" => $Assets,
        ]);
    }
}

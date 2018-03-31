<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panduan;

class PanduanController extends Controller
{
		public function __construct()
    {
        $this->middleware('auth');  //user guard
    }
    
    public function now()
    {
        return Carbon::now('Asia/Jakarta')->format('d/m/Y H:i:s');
    }

    public function index()
    {
    	$panels = Panduan::all();
    	return view('panduan.user-dashboard', ['panels'=>$panels]);
    }

    public function view($id)
    {
    	$panels = Panduan::all();
    	$panduan = Panduan::findOrFail($id);
    	return view('panduan.user-view', ['panduan'=>$panduan, 'panels'=>$panels]);
    }
}

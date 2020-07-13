<?php

namespace App\Http\Controllers;

use Artisan;
use Illuminate\Http\Request;

class SocketController extends Controller
{
  public function index()
  {
    //
  }

  public function serve(Request $reuest)
  {
    $call = Artisan::call('websockets:serve --port=6321 --host=127.0.0.1');
    dd($call);
    return ($call == 0)
      ? redirect()->back()->with('success', 'socket successfully runing')
      : redirect()->back()->with('error', 'failed when runing socket');
  }
}

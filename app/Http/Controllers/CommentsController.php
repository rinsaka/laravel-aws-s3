<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommentsController extends Controller
{
  public function index()
  {
    $path001 = Storage::disk('s3')->url('001.png');
    $path002 = Storage::disk('s3')->url('002.png');
    $path003 = Storage::disk('s3')->url('003.png');
    // dd($path);
    return view('comments.index')
      ->with('path001', $path001)
      ->with('path002', $path002)
      ->with('path003', $path003);
  }
}

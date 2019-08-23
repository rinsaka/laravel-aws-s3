<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommentsController extends Controller
{
  public function index()
  {
    $path = Storage::disk('s3')->url('001.png');
    // dd($path);
    return view('comments.index')
      ->with('path', $path);
  }
}

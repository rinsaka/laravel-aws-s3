<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;

class CommentsController extends Controller
{
  public function index()
  {
    // 共有ファイルは単純
    $path001 = Storage::disk('s3')->url('001.png');
    // $path002 = Storage::disk('s3')->url('002.png');
    // 共有ファイルに有効期限を付けてみる
    $path002 = Storage::disk('s3')->temporaryUrl('002.png', now()->addMinutes(5));
    // 非公開ファイル
    $path003 = Storage::disk('s3')->url('iam01.png');
    // 非公開ファイルに有効期限を付けてみる
    $path004 = Storage::disk('s3')->temporaryUrl('iam01.png', now()->addMinutes(5));

    // この書き方でも良い
    $s3Client= App::make('aws')->createClient('s3');
    $cmd = $s3Client->getCommand('GetObject', [
      'Bucket' => env('AWS_BUCKET'),
      'Key' => 'iam01.png',
    ]);
    $request = $s3Client->createPresignedRequest($cmd, '+1 minutes');
    $path005 = (string) $request->getUri();

    return view('comments.index')
      ->with('path001', $path001)
      ->with('path002', $path002)
      ->with('path003', $path003)
      ->with('path004', $path004)
      ->with('path005', $path005);
  }
}

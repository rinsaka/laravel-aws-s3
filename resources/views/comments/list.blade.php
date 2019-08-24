<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>S3 からファイルを取得する</title>
</head>
<body>
  <h1>S3 の list ディレクトリからファイルの一覧を取得する</h1>

  <hr>
  @foreach ($images as $img)
    <p>
      {{ $img->path }}<br>
      {{ $img->url }}<br>
      <img src="{{ $img->url }}">
    </p>
    <hr>
  @endforeach




</body>
</html>

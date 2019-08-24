<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ファイルアップロード</title>
</head>
<body>
  <h1>ファイルをアップロードする</h1>

  <form method="post" action="{{ url('/comments') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" required>
    <button type="submit">アップロード</button>
  </form>


</body>
</html>

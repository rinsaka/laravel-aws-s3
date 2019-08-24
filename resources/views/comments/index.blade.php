<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>S3 からファイルを取得する</title>
</head>
<body>
  <h1>S3 からファイルを取得する</h1>
  <h3>共有ファイルは簡単</h3>
  <p>
    {{$path001}}<br>
    <img src="{{$path001}}">
  </p>
  <h3>共有ファイルに有効期限を付けることもできる</h3>
  <p>
    再読み込みをすると上に比べてちょっと時間がかかる<br>
    読込みのたびに X-Amz-Date と X-Amz-Signature が更新される．<br>
    {{$path002}}<br>
    <img src="{{$path002}}">
  </p>
  <h3>非公開ファイル</h3>

  <p>
    ファイルの URL が正しくても表示できない（これでよい）<br>
    {{$path003}}<br>
    <img src="{{$path003}}">
  </p>

  <h3>非公開ファイルに有効期限を設定</h3>

  <p>
    ファイルの URL に有効期限だけでなく署名も付くので表示できた<br>
    {{$path004}}<br>
    <img src="{{$path004}}">
  </p>

  <h3>別の書き方</h3>

  <p>
    別の書き方でも良い<br>
    いずれにせよ，URLの有効期限があるので，有効期限が切れると別のブラウザでは表示できなくなる<br>
    {{$path005}}<br>
    <img src="{{$path005}}">
  </p>
</body>
</html>

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for helping fund on-going Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell):

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# S3 を使う
## S3用のIAMを作成する
- 「セキュリティ資格情報」を開く
<p align="center"><img src="storage/app/figs/iam01.png"></p>

-「ユーザー」を開く
<p align="center"><img src="storage/app/figs/iam02.png"></p>
<p align="center"><img src="storage/app/figs/iam03.png"></p>

-「ユーザーを追加」を開く

<p align="center"><img src="storage/app/figs/iam04.png"></p>

-「ユーザー名」を入力し，「プログラムによるアクセス」にチェックを入れる．「次のステップ」をクリック

<p align="center"><img src="storage/app/figs/iam05.png"></p>

- 「既存のポリシーを直接アタッチ」を選び，ポリシー名から「AmazonS3FullAccess」にチェックを入れる．「次のステップ」をクリック

<p align="center"><img src="storage/app/figs/iam05.png"></p>
<p align="center"><img src="storage/app/figs/iam06.png"></p>
<p align="center"><img src="storage/app/figs/iam08.png"></p>


- タグの追加で「キー」と「値」を適当に入れる．「次のステップ」をクリック．

<p align="center"><img src="storage/app/figs/iam09.png"></p>

- ユーザーを追加：内容を確認する．「ユーザーの作成」をクリック．

<p align="center"><img src="storage/app/figs/iam10.png"></p>

- ユーザーを追加（成功）：アクセスキーIDとシークレットアクセスキーが発行されるので，これを控えておく．また.csvファイルもダウンロードする．

<p align="center"><img src="storage/app/figs/iam11.png"></p>
<p align="center"><img src="storage/app/figs/iam12.png"></p>
<p align="center"><img src="storage/app/figs/iam13.png"></p>

## パッケージのインストール

~~~
[vagrant@localhost laravel-aws-s3]$ php ../composer.phar require league/flysystem-aws-s3-v3
~~~

## .env に設定を追加する

~~~
AWS_ACCESS_KEY_ID=Access key ID
AWS_SECRET_ACCESS_KEY=Secret access key
AWS_DEFAULT_REGION=ap-northeast-1
AWS_BUCKET=bucket name
~~~

## S3 でのアクセス権の設定
- S3 におけるファイルのアクセス権は変更する必要はない
- つまり「パブリックアクセスをすべてブロック」でよい
- これにより，URLがわかっただけではファイルの閲覧ができない
- URL に署名をつけることでようやくアクセスできるようになり，その署名には有効期限も設定される

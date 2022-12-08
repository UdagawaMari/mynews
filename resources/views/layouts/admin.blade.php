<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <!--これで囲まれたコードは、PHPで書かれた内容を表示するという意味-->
    <!--中身を文字列に置き換え、HTMLの中に記載する-->
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--windowsの基本ブラウザであるedgeに対応する、の意-->
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--JavaScriptで駆動するアプリケーションを構築する場合、-->
        <!--JavaScript HTTPライブラリーに対し、すべての送信リクエストを-->
        <!--CSRFトークンを自動的に追加させると便利-->
        <!--JavaScript HTTPライブラリーとは開発作業におけるいわば部品を集めたもの-->
        
        <title>@yield('title')</title>
        <!--@の記載はメソッド（Action)を読み込む-->
        <!--指定したセッションの内容を表示するために使用する-->
        <!--今回はtitleというセッションの内容を表示、各ページごとにタイトル変更できるようにするため-->
        
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <!--secure_assetはpublicディレクトリのパスを返す関数のこと-->
        <!--/js/app.js というパスを生成する-->
        
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css? family=Raleway:300,400,600" rel="stylesheet"
 type="text/css">
 
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
 </head>
 <body>
     <div id="app">
         <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
             <div class="container">
                 <a class="navbar-brand" href="{{ url('/') }}">
                     <!--そのままURLを返すメソッド-->
                     {{ config('app.name', 'Laravel') }}
                     <!--secure_assetと似た関数。configフォルダのapp.phpの中にあるnameにアクセスする-->
                     <!--基本的にはアプリケーションの名前Laravelが格納されている-->
                 </a>
                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                 </button>
                 
                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav ms-auto">
                         <!--ナビバー左側-->
                     </ul>
                     <ul class="navbar-nav">
                         
                         <!--ログインしてなかったらログイン画面へのリンクを表示-->
                         @guest
                         <li>
                             <a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}
                             </a>
                         </li>
                         
                         <!--ログインしていたらユーザー名とログアウトボタンを表示-->
                         @else
                         <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                 {{ Auth::user()->name }}
                                 <span class="caret"></span>
                             </a>
                             
                             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                 <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                     {{ __('messages.logout') }}
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     @csrf
                                 </form>
                             </div>
                         </li>
                         @endguest
                     </ul>
                 </div>
             </div>
         </nav>
         <!--ナビゲーションバーここまで-->
         <main class="py-4">
             @yield('content')
         </main>
     </div>
 </body>
 
</html>
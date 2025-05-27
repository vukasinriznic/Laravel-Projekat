<!DOCTYPE html>
<html>
<head>
  <title>{{ $product->name }}</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <style>
    body {
      margin: 0;
      font-family: "Montserrat", sans-serif;
    }

    header.topbar {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      height: 70px;
      background-color: #f1f1f1;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 200px;
      z-index: 100;
      box-sizing: border-box;
    }

    .topbar a {
      margin: 0 12px;
      text-decoration: none;
      color: #1b1b18;
      font-weight: 600;
      font-size: 16px;
    }

    .topbar a:hover {
      text-decoration: underline;
    }

    main.content {
      max-width: 900px;
      margin: 100px auto 40px;
      padding: 0 24px;
    }

    h1 {
      margin-bottom: 16px;
    }

    p {
      font-size: 18px;
      margin: 10px 0;
    }

    a.back-link {
      display: inline-block;
      margin-top: 20px;
      text-decoration: none;
      color: #3b82f6;
      font-weight: 600;
    }

    a.back-link:hover {
      text-decoration: underline;
    }

    footer {
      text-align: center;
      padding: 16px;
      background-color: #f1f1f1;
      font-size: 14px;
      color: #444;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header class="topbar">
    <nav class="left-links">
      <a href="/">Početna stranica</a>
      <a href="/katalog">Katalog</a>
      <a href="/kontakt">Kontakt</a>
    </nav>
    <nav class="right-links">
      @if (Route::has('login'))
        @auth
          <a href="{{ url('/dashboard') }}">Dashboard</a>
        @else
          <a href="{{ route('login') }}">Login</a>
          @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
          @endif
        @endauth
      @endif
    </nav>
  </header>

  <!-- Glavni sadržaj -->
  <main class="content">
    <h1>{{ $product->name }}</h1>
    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
    <p><strong>Kategorija:</strong> {{ $product->category->name }}</p>
    <p><strong>Opis:</strong> {{ $product->description ?? 'Nema opisa' }}</p>
    <p><strong>Cena:</strong> {{ $product->price }} RSD</p>

    <a href="/" class="back-link">← Nazad na početnu</a>
  </main>

  <!-- Futer -->
  <footer>
    © 2025 Vukasin Riznic
  </footer>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>
        @yield('title')
    </title>
</head>
<body>
    
    {{-- NavBar --}}
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="/">Questions-Réponses</a>
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="/">Contenus</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/login">Se Connecter</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/register">Créer un Compte</a>
            </li>
          </ul>
        </div>
        <div>
          <form class="form-inline my-2 my-lg-0" action="" method="get">
            <input class="form-control mr-sm-2" type="text" name="search" id="search" placeholder="Search..." value="{{ request('search') }}">
          </form>
        </div>
      </nav>

      

    {{-- Header --}}
    <header>
        @yield('banner')
    </header>

    {{-- Contenus --}}
    <div class="container">
        @yield('content')
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>The library</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="beginning">Libreria</a>
              {if !isset($smarty.session.USER_NAME)}
                <a class="nav-link" aria-current="page" href="login">Login</a>
                {else}
                   <a class="nav-link nav-item navbar-nav mb-2 mb-lg-0" href="logout">Logout {$smarty.session.USER_NAME}</a>
              {/if}

            </div>
          </nav>
    </header>

    <!-- inicio main container -->
    <main class="container">

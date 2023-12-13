 <!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="assetts/css/bootstrap.min.css" rel="stylesheet">
    <link href="assetts/css/font-awesome.min.css" rel="stylesheet">
    <link href="assetts/css/style.css" rel="stylesheet">

    <title>Cellule Informatique (DNTCP)</title>
  </head>
  <body>
    <section class="form-02-main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="_lk_de">
              <div class="form-03-main">
                <div class="logo">
                  <img src="assetts/images/user.png">
                </div>
                <form method="POST" action="{{ route('auth.login') }}">
                  @csrf
                <div class="form-group">
                  <input type="email" name="email" class="form-control _ge_de_ol" type="text" 
                  placeholder=" Email" required="" aria-required="true" value="{{old('email')}}">
                  @error("email")
                    {{$message}}
                  @enderror
                </div>

                <div class="form-group">
                  <input type="password" name="password" class="form-control _ge_de_ol" type="text"
                   placeholder="Mot de Passe" required="" aria-required="true">
                   @error("email")
                    {{$message}}
                  @enderror
                </div>
                <div class="checkbox form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="">
                    <label class="form-check-label" for="">
                      Mémoriser 
                    </label>
                  {{-- </div>
                  <a href="#">Forgot Password</a>
                </div> --}}

                <div class="form-group">
                  <div class="_btn_04">
                   <button type="submit">Connecter</button>
                    </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
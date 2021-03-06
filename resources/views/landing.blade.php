<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <title>ACADA!</title>
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
  </head>
  <body>
    <header>
      <div class="flex-center position-ref full-height">
          @if (Route::has('login'))
              <div class="top-right links">
                  @if (Auth::check())
                      <a href="{{ url('/home') }}">Home</a>
                  @else
                      <a href="{{ url('/login') }}">Login</a>

                      <a href="auth/facebook" class="btn btn-info" role="button">Facebook?<a/>

                      <a href="auth/google" class="btn btn-lg waves-effect waves-light btn-block google">Google?</a>

                      <a href="{{ url('/register') }}">Register</a>
                  @endif
              </div>
          @endif
          <div class="jumbotron">
            <blockquote>
              <h4>ACADA</h4>
              <small>A video sharing platform</small>
            </blockquote>
          </div>
      </div>

    </header>
    <section>
    </section>
    <footer></footer>
  </body>
</html>

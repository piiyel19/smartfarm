<!doctype html>
<html class="no-js h-100" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Shards Dashboard Lite - Free Bootstrap Admin Template – DesignRevision</title>
        <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="<?= url('/')?>/asset/styles/shards-dashboards.1.1.0.min.css">
        <link rel="stylesheet" href="<?= url('/')?>/asset/styles/extras.1.1.0.min.css">
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.snow.css"> 
    </head>
  
    <body class="h-100" style="padding-top: 50px; padding-bottom: 50px;">

        <div class="offset-md-3 col-md-6 offset-md-3" style="padding-bottom: 50px;">
            <form method="POST" action="">
                <div class="card">
                    <div class="card-header" style="background: #0dc560f0; padding-bottom: 0px;">
                        <h4 style="color:#fff; font-weight:700; font-family: monospace;">Welcome To Smart Farm</h4>
                    </div>
                    <div class="card-body" style="padding-top: 30px;">

                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="card-title">Manage Your Farm</h5>
                                <p class="card-text">
                                    <ul style="padding-left: 10px;">
                                        <li style="color: #0d954a; font-family: monospace;"> IOT Technology</li>
                                        <li style="color: #0d954a; font-family: monospace;"> Task Activities</li>
                                        <li style="color: #0d954a; font-family: monospace;"> Prediction & Prescription</li>
                                        <li style="color: #0d954a; font-family: monospace;"> Data Analytics Solution</li>
                                    </ul>
                                </p>
                            </div>
                            <div class="col-md-4">
                                <img src="<?= url('/')?>/asset/bg.png" width="100%">
                            </div>
                        </div>



                        @csrf
                        <div class="col-12" style="padding-bottom: 30px;">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>


                        <div class="col-12" >
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>


                        <div class="col-12">
                            @if (Session('error'))
                                <p class="text-danger">{{ session('error') }}</p>
                            @endif
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="col-12">
                            <span style="font-family: monospace;"> &copy; Power By Nexquadrant Sdn Bhd </span>
                            <button class="btn btn-success" style="float: right; font-family: monospace;">Login</button>
                        </div>
                    </div>  
                </div>

            </form>
        </div>

    </body>
</html>


<style type="text/css">
    ul {
      list-style: none;
    }

    ul li:before {
      content: '✓';
      font-size: 15px;
      font-weight: 700;
    }
</style>
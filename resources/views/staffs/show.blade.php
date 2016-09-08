<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>{{ $staff->company . ' :: ' . $staff->display_name }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style type="text/css">
      body {
        background-image: url('https://dl.dropboxusercontent.com/u/26808427/cdn/bg.jpg');
        background-size: cover;
        background-attachment: fixed;
      }
      /* Small Devices, Tablets */
      @media only screen and (min-width : 768px) {
        .valign {
          margin-top: 5px;
        }
      }
      .valign {
        margin-top: 60px;
      }
      .card {
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        background: white;
      }

      .card {
        margin-top: 10px;
        box-sizing: border-box;
        border-radius: 2px;
        background-clip: padding-box;
      }
      .card span.card-title {
          color: #fff;
          font-size: 24px;
          font-weight: 300;
          text-transform: uppercase;
      }

      .card .card-image {
        position: relative;
        overflow: hidden;
      }
      .card .card-image img {
        border-radius: 2px 2px 0 0;
        background-clip: padding-box;
        position: relative;
        z-index: -1;
      }
      .card .card-image span.card-title {
        position: absolute;
        bottom: 0;
        left: 0;
        padding: 16px;
      }
      .card .card-content {
        padding: 16px;
        border-radius: 0 0 2px 2px;
        background-clip: padding-box;
        box-sizing: border-box;
      }
      .card .card-content p {
        margin: 0;
        color: inherit;
      }
      .card .card-content span.card-title {
        line-height: 48px;
      }
      .card .card-action {
        border-top: 1px solid rgba(160, 160, 160, 0.2);
        padding: 16px;
      }
      .card .card-action a {
        color: #ffab40;
        margin-right: 16px;
        transition: color 0.3s ease;
        text-transform: uppercase;
      }
      .card .card-action a:hover {
        color: #ffd8a6;
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="valign">
        <div class="row vertical-align-center">
          <div class="col-md-offset-2 col-md-8">
            <div class="card">
              <div class="card-content">
                <div class="row">
                  <div class="col-sm-4 text-center">
                    <img src="{{ asset('assets/img/logo_'.strtolower($staff->company).'.png') }}" width="100">
                  </div>
                  <div class="col-sm-8">
                    <h2>{{ config('awt.companies')[$staff->company]['name'] }}</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-5 col-sm-offset-1">
                    <br>
                    <h3>ID : {{ $staff->id }}</h3>
                    <p><b>Email</b> : {{ empty($staff->email) ? '-' : $staff->email }}</p>
                    <p><b>Phone</b> : {{ empty($staff->phone) ? '-' : $staff->phone }}</p>
                    <p><b>Address</b> : {{ empty($staff->address) ? '-' : $staff->address }}</p>
                    <p><b>Blood Group</b> : {{ empty($staff->bloodgroup) ? '-' : $staff->bloodgroup }}</p>
                  </div>
                  <div class="col-sm-5 text-center">
                    <img src="{{ $staff->image->thumbnail }}" class="img-circle">
                    <h3>{{ $staff->display_name }}</h3>
                  </div>
                </div>
              </div>
              <div class="card-action">
                <div class="row">
                  <div class="col-xs-6">
                    <img src="https://b2bxconnect.com/wp-content/uploads/2013/09/verified.png" height="40"> Verified Staff
                  </div>
                  <div class="col-xs-6 text-right">
                    Visit <a href="{{ config('awt.companies')[$staff->company]['url'] }}">{{ config('awt.companies')[$staff->company]['name'] }}</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GITA MAHOTASAV JHAJJAR| Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin_asset/dist/css/AdminLTE.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<style type="text/css">
    .card{
        border-radius:1rem;
    }
    .form-control{
      border-radius:1rem;  
    }
    .modal-content{
      border-radius:2rem;  
    }
    .btn{
      border-radius:0.90rem;  
    }
</style>
<body class="hold-transition login-page" style="background:url('{{ asset('img/curved14.jpg') }}');background-repeat: no-repeat, repeat;background-size: cover;background-position: center;">
    <div class="login-box">
        <div class="card">
            <div class="card-header text-center pt-4">
                <h4><strong>GITA MAHOTASAV JHAJJAR</strong></h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.login.post') }}" method="post" class="add_form">
                    {{ csrf_field() }}
                    <div class="mb-2">
                        <input type="text" name="mobile_no" class="form-control" placeholder="Enter Mobile No." required maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    </div>
                    <p class="text-danger">{{ $errors->first('mobile_no') }}</p>
                    <div class="mb-2">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <p class="text-danger">{{ $errors->first('password') }}</p>
                    <div class="mb-2 lg-3">
                         <div class="captcha">
                          <span id="refresh">{!! captcha_img('flat') !!}</span>
                          {{-- <i class="fas fa-1x fa-sync-alt" ></i> --}}
                        </div>
                    </div>
                    <div class="mb-2">
                        <input type="text" id="captcha" name="captcha" required="" class="form-control" placeholder="Enter Captcha" aria-label="Password" aria-describedby="password-addon">
                    </div>
                    <p class="text-danger">{{ $errors->first('captcha') }}</p>
                    <div class="mb-2">
                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Login</button>
                        <a href="{{ route('front.index') }}" class="btn bg-gradient-danger w-100 my-4 mb-2">Home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="{{ asset('admin_asset/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin_asset/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('admin_asset/dist/js/toastr.min.js') }}"></script>
@include('admin.include.message')
<script type="text/javascript">
    $('#refresh').click(function(){
        $.ajax({
            type:'GET',
            url:'{{ route('admin.refresh.captcha') }}',
            success:function(data){
                $(".captcha span").html(data);
            }
        });
    });
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h4 class="my-2">Registration Form</h4>
    <form action="{{route('register-user')}}" method="post">
        @if (Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if (session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        @csrf
       

        <div class="form-group">
            <label for="email">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Your Name" value="{{old('name')}}">
            <span class="text-danger">@error('name'){{$message}}@enderror</span>
        </div>


        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" value="{{old('email')}}">
            <span class="text-danger">@error('email'){{$message}}@enderror</span>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Your password" value="{{old('password')}}">
            <span class="text-danger">@error('password'){{$message}}@enderror</span>
        </div>
        <div class="form-group">
            <button class="btn btn-block btn-primary my-2">Register</button>
        </div>
        <a href="login">Already Registered Login Here</a>
    </form>
    </div>
    
    
</body>
</html>
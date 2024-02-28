<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/sass/app.scss'])
</head>
<body>
    <form action="{{route('Login')}}" class="form-data" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="">Login</label>
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="password" placeholder="Password">
        <div class="btn">
            <a id="btn-login">Login</a>
            <a id="btn-register">Register</a>
        </div>
    </form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#btn-login').click(() => {
            var data = $('.form-data').serialize();
            $.ajax({
                type: "post",
                url: "{{route('LoginApi')}}",
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response.success){
                        window.location.href = "{{route('home')}}";
                    }
                }
            });
        });
    });
</script>
</html>

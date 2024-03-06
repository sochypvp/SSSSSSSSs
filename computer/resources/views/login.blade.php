<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>

    <div class="container w-25" style="margin-top: calc(50vh - 370px)">
        <!-- Default form subscription -->
        <form method="POST" enctype="multipart/form-data" class="form-data text-center border border-light p-5 rounded-2" style="background-color: #ececec" action="#!">
            @csrf
            <p class="h4 mb-4">Authentication</p>

            <p>Please enter your username and password for join the services</p>


            <!-- Name -->
            <input type="text" name="email" class="form-control mb-4" placeholder="Username">

            <!-- Email -->
            <input type="password" name="password" class="form-control mb-4" placeholder="Password">

            <!-- Sign in button -->
            <a id="btn-login" class="btn btn-info btn-block w-100">Login</a>


        </form>
        <!-- Default form subscription -->
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#btn-login').click(() => {
            var data = $('.form-data').serialize();
            $.ajax({
                type: "post",
                url: "{{ route('LoginApi') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        window.location.href = "{{ route('home') }}";
                    }
                }
            });
        });
    });
</script>

</html>

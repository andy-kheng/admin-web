<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Responsive Login Form</title>
    <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
    <div class="login">
        <div class="login-header">
        </div>
        <div class="login-form">
            @if(Session::has('success-message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{Session::get('success-message')}}
            </div>
            @endif @if(Session::has('error-message'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{Session::get('error-message')}}
            </div>
            @endif
            <form method="POST" action="/login" id="frm-login">
                {{ csrf_field() }}
                <h3>Username:</h3>
                <input type="text" name="email" id="email" placeholder="Username" /><br>
                <h3>Password:</h3>
                <input type="password" name="password" id="password" placeholder="Password" />
                <br>
                <input type="submit" value="Login" class="login-button" />
            </form>
        </div>
    </div>
</body>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
<script type="text/javascript" src="{!! asset('bower_components/jquery-validation/dist/jquery.validate.min.js') !!}"></script>
<script>
    $(document).ready(function () {
        $("#frm-login").validate({
            rules: {
                email: "required",
                password: "required"
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>

</html>
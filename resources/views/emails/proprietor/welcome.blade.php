<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
<body>

<p>Your Proprietor Profile has been created on the Edo State Ministry of Education Application Portal</p>

<p>To make application for approval to establish a new private educational institution, please login with the following details:</p>

<p><b>Login URL:</b> <a href="{{route('login')}}">{{route('login')}}</a></p>

<p><b>Login Email:</b> {{$user->email}}</p>
<p><b>Login Username:</b> {{$user->meta['username']??''}}</p>

<p><b>Login Password:</b> {{$user->meta['password']??''}} </p>

</body>
</html>
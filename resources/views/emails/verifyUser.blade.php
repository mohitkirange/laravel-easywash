<!DOCTYPE html>
<html>
<head>
    <title class="text-uppercase">Welcome to Easywash</title>

<style>
.btn {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.img{
   text-align: center;
}
</style>

</head>

<body>
<img class="retina logo" src="{{asset('app/img/logo.png')}}" alt=""/>
<h2 class="text-uppercase">Welcome {{$user['name']}}</h2>
<br/>
Your registered email-id is {{$user['email']}} , Please click on the below link to verify your email account
<br/>
<a class="btn btn-dark-solid" href="{{url('user/verify', $user->verifyUser->token)}}">Verify Email</a>
<br/>

<p class="text-uppercase">Thank you for using Easywash.</p><br>
<p>Now wash your worries away.</p>


</body>

</html>

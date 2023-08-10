
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>CAS Mail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        *{
            font-family: 'Raleway', sans-serif;
        }
        .bg-body{
            background: rgb(52, 52, 52) !important;
            color: aliceblue;
            margin-left: 20px;
            padding-left: 10px;
        }
        .quoteText{
            padding: 10px;
            border: 1px solid  rgb(133, 61, 50);
            border-radius: 8px;
            color: rgba(254, 250, 250, 0.978);
            width: 75%;
        }
        .closing{
            border-bottom: 2px solid  rgb(133, 61, 50);
            padding-bottom: 10px;
        }
        .signature{
            color:  rgb(133, 61, 50);
            padding-top: 25px;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-right: 15%; 
        }
    </style>
</head>
<body class="ms-5 bg-body mt-5">
    <h4 class="mt5">{{__('ui.admin')}}</strong></h4>
    <h5>{{__('ui.h5Email')}}</h5>
    <p>{{__('ui.pEmail')}}</p>
    <p class="quoteText">{{__('ui.nameAndSurname')}}: {{$user->name}}</p>
    <p class="quoteText">Email: {{$user->email}}</p>
    <p>{{__('ui.clickRevisor')}}</p>
    <a class="btn btn-danger text-white" href="{{route('make.revisor' , compact('user'))}}">{{__('ui.makeRevisor')}}</a>

    <p class="text-center signature display-3">{{__('ui.byeEmail')}}</p>
    <p class="text-center signature display-3">PrestoBot.it!</p>
   
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        
    </head>
    <body>
        <p>
            Hello,<br><br>
            You are successfully registered, your login details are as follows :<br>
            Email: {{$email}}<br>
            Password : your choosen password<br>
            <a href="{{url('confirm-user').'?email='.$email.'&confirmation_code='.$confirmation_code}}">Click here</a> to activate your account<br><br>
            Regards,<br>
            Company Name
            
            
        </p>
    </body>
</html>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Login</title>
    <link rel='stylesheet' href='view/style.css'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz' crossorigin='anonymous'></script>
</head>
<body class='loginImage'>
    <div class='container loginForm'>
        <h1 class='loginHeading'>Login</h1>
        <!-- Login Form -->
        <form method='post' action='index.php?mod=authentication&view=login' class='form_align' onsubmit="validateLogin()">
            <div class='form-group'>
                <label class='loginText'><b>
                        Username:
                    </b>
                </label><br>
                <input type='text' class='form-control' placeholder='Username/Email' name='email' id='username' required>
                <div class='loginerror' id='usernameError'></div>
            </div>
            <div class='form-group'>
                <label class='loginText'><b>
                        Password:
                    </b>
                </label><br>
                <input type='password' class='form-control' placeholder='Password' name='password' id='password' required>
                <div class='loginerror' id='passwordError'></div>
            </div><br>
            <input type='submit' class='btn btn-primary loginButton' name='submit'><br>
        </form>
    </div>
    <script src="view\script.js"></script>
</body>
</html>
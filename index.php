<!DOCTYPE html PUBLIC '-//W3C//Dtd XHTML 1.0 Transitional//EN' 'http://www.w3.org/tr/xhtml1/Dtd/xhtml1-Transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='utf-8' lang='utf-8' dir='ltr'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login to continue</title>
    <style>

        * {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        
        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .dialog-box {
            background: linear-gradient(180deg, #081b4d, #001780);
            padding: 20px;
            border-radius: 5px;
        }

        .dialog-box .title {
            color: #fff;
            font-size: 25px;
            font-weight: bolder;
            text-shadow: 0px 0 20px #000;
            margin-top: 0;
            text-align: center;
        }

        .form-locked {
            background-color: #fff;
            padding: 15px 25px;
            font-size: 12px;
            text-align: center;
            display: none;
        }

        .form {
            background-color: #fff;
            padding: 15px 25px;
        }

        .form table {
            margin-block-end: 15px;
        }

        .form .incorrect-information {
            font-size: 12px;
            color: #ff0000;
            text-align: center;
            margin: 0;
            margin-block-end: 15px;
            display: none;
        }

        .dialog-box .submit {
            border-radius: 10px;
            background: #001780;
            padding: 7px 28px;
            color: #fff;
            font-weight: bold;
            font-size: 10px;
            border: none;
        }

        .footer {
            color: #fff;
            font-size: 13px;
            margin-block-start: 1em;
            margin-block-end: 1em;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        $errorMsg = '';
        $failedAttempts = 0;
        $validUser = $_SESSION['login'] === true;
        if(isset($_POST['submit'])) {
          $validUser = $_POST['username'] == 'admin' && $_POST['password'] == 'dxyvahotra';
          if(!$validUser){
            $errorMsg = 'Your username or password is incorrect. Please try again.';
            $failedAttempts++;
          }
          else $_SESSION['login'] = true;
        }
        if($validUser) {
            header('LOCATION:download.php'); die();
        }
    ?>
    <div class='wrapper'>
        <div class='dialog-box'>
            <p class='title' id='title'>PLEASE LOGIN TO CONTINUE !</p>
            <div class='form-locked' id='formlocked'>
                <span id='timer'>5 failed attempts, you have been blocked from signing in, try again in 60 seconds.</span>
            </div>
            <form action='' class='form' id='form' method='POST'>
                <?php echo '<p id=\'incorrect\' class=\'incorrect-information\'>'.$errorMsg.'</p>' ?>
                <table>
                    <tbody>
                        <tr>
                            <td width='200'>Username</td>
                            <td>
                                <input name='username' type='text' id='username' style='width:150px'>
                            </td>
                        </tr>
                        <tr>
                            <td width='200'>Password</td>
                            <td>
                                <input name='password' type='password' id='password' autocomplete='off' style='width:150px'>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input type='submit' value='Login' name='submit' id='btnlogin' class='submit'>
            </form>
            <div style='text-align: center; margin-block-start: 1em; margin-block-end: 1em;'>
                <span class='footer'>Copyright by dbr.ee, 2000 - </span><span class='footer' id='year'></span><span class='footer'>, All Rights Reserved.</span>
            </div>
        </div>
    </div>
</body>
<script>
    var title = document.querySelector('#title');
    var countdown = document.querySelector('#timer');
    var btn_login = document.querySelector('#btnlogin')
    var year = document.querySelector('#year');
    var incorrect = document.querySelector('#incorrect');
    var locked = document.querySelector('#formlocked');
    var form = document.querySelector('#form');
    year.innerText = new Date().getFullYear();

    function startTimer(duration, display) {
        var timer = duration, seconds;
        setInterval(function () {
            seconds = parseInt(timer % 60, 10);

            seconds = seconds == 1 ? seconds + ' second': seconds + ' seconds'

            display.innerText = `5 failed attempts, you have been blocked from signing in, try again in ${seconds}.`

            if (--timer < 0) {
                unlockForm();
                window.location = 'login.php';
            }

        }, 1000);
    }

    function lockForm(){
        form.style.display = 'none';
        locked.style.display = 'block';
        title.style.display = 'none';
        var time = 59;
        startTimer(time, countdown);
    }

    function unlockForm(){
        form.style.display = 'block';
        locked.style.display = 'none';
        title.style.display = 'block';
    }
    
    var failedAttempts = 0;

    if(failedAttempts > 0){
        incorrect.style.display = 'block';
    }
</script>
</html>
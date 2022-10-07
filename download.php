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
            margin: 20px auto;
            padding: 7px 28px;
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            font-size: 10px;
        }

        .footer {
            color: #fff;
            font-size: 13px;
            margin-block-start: 1em;
            margin-block-end: 1em;
        }
    </style>
    <meta http-equiv="refresh" content ="3; url=/morse.wav">
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['login'])) {
            header('LOCATION:index.php'); die();
        }
        
        function destroy(){
            session_destroy();
            header('LOCATION:index.php'); die();
        }

        if(array_key_exists('destroy_request', $_POST)){
            destroy();
        }
    ?>
    <p>Sending request...</p>
    <form method="POST">
        <input type="submit" name="destroy_request" value="Destroy Session" />
    </form>
</body>
</html>
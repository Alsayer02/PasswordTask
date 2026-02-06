<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f2f2f2;
            font-family: Arial;
        }
        form {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        input {
            padding: 10px;
            width: 100%;
            margin-bottom: 15px;
        }
        button {
            padding: 10px;
            width: 100%;
            background: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form method="post">
        <?php
        $date = date_create('now');
        $password = (int)date_format($date, 'U') % 100000;
        $inputPass = 0;
        if (isset($_POST['password'])) {
            $inputPass = $_POST['password'];
        }
        if ($inputPass == $password) {
            header('Location:welcome.php');
        }
        ?>
        <h3>ادخل كلمة السر</h3>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">دخول</button>
    </form>
</body>
</html>
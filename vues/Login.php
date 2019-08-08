<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="./vues/styles/css/clean-blog.css">
        <title>Document</title>
    </head>
    <body>
        <form action="index.php?page=login" method="post">
            <table align="center" border="0">
                <tr>
                    <td>Login :</td>
                    <td><input type="text" name="login" id="login" maxlength="250" /></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td><input type="password" name="pass" id="pass" maxlength="10" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="log in" /></td>
                </tr>
            </table>
        </form> 
    </body>
</html>
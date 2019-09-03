<?php require_once('./vues/partials/head.php'); ?>
<?php require_once('./vues/partials/nav.php'); ?>
<?php require_once('./vues/partials/header.php'); ?>
    <?php error_reporting(E_ALL); ?> 
    <?php ini_set('display_errors', 1); ?>    
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
        <?php require_once('./vues/partials/footer.php'); ?>
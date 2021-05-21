
<?php
include('headercommun.php');
if(session_status() == PHP_SESSION_NONE){
    session_start();
}?>
<link property rel="stylesheet" href="style/login.css" media="screen" />
<main>

<?php
if (isset($_GET['route'])) {

    switch ($_GET['route']) {
        case 'login':
            include('mods/admin/AdminMod.php');
            break;
        case 'signup':
            if (isset($_POST['signup'])) {
                include("mods/signup.php");
                if(isset($_SESSION['registered']) && $_SESSION['registered']){
                    include("views/signup_confirm.php");
                    header('refresh:2;url=login.php?');
                }

            } else{
                include("views/signup_form.php");
            }
            break;
        
        case 'logout':
            include("mods/logout.php");
            header('refresh:0;url=login.php');
            break;

        default:
            echo "erreur page not found";
            break;
    }

}else{
    include('views/login_form.php');
}?>

</main>

<?php include('footercommun.php');?>
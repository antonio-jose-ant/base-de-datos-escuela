<?php
include_once 'includes/user.php';
include_once 'includes/user_session.php';
$userSession = new UserSession();
$user = new User();
if(isset($_SESSION['user'])){
    //echo "hay sesion";
    $user->setUser($userSession->getCurrentUser());
?>
<style>
/*****inicio.php************/
    body{
        margin:0;
    }
    .inicio{
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.inicio img{
    width: 60%;
}
.inicio h2{
    font-family:arial;
    font-size: 40px;
    color: #5b2b26;
    text-align: center;
}
/*****inicio.php fin************/
</style>
<div class="inicio">
    <img src="./assets/img/logo/logo.png" alt="">
    <h2>ESCUELA PRIMARIA <br> REY POETA</h2>
</div>
<?php
}else{
    //echo "login";
    echo "<script> alert('no existe un inicio de secion'); window..history.go(-1);</script>";
}
?>
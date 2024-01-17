<?php

    include('CcsoInscrpcion.php');
    include('tken.php');
    include('prcsos/sstma/rgstroCcso.php');
    

   
    $user=$_REQUEST["user"];
    $paswd=$_REQUEST["pswd"];

    
    $ip=$_SERVER['REMOTE_ADDR'];
    $idregistro=date('YmdHis');


    $ingresar = new Csso();
    $ingresar->setUser($user);
    $ingresar->setPasswd($paswd);
    $ingresar->acceso();

    
 

    $_SESSION['idusuario'] = $ingresar->getPrsona();
    $_SESSION['nomusuario'] = $ingresar->getNompersona()." ".$ingresar->getApeprsona();
    $_SESSION['tokenin']=$tokenIngreso;
    $ingreso=$ingresar->getEntroAcceso();

    if($ingreso=='acceso_ok'){

        $token = new TokenLogin();
        $tokenIngreso = $token->tokeningreso();

        $registroAcceso=new ResgistrarAcceso();
        $registroAcceso->setAccIp($ip);
        $registroAcceso->setAccCodigo($idregistro);
        $registroAcceso->setAccToken($tokenIngreso);
        $registroAcceso->setAccPersona($ingresar->getPrsona());
        $registroAcceso->setAccSystem('acceso');
        $registroAcceso->insertAcceso();
    }
    else{
        $registro='noOk';
    }


    echo $ingresar->getEntroAcceso();
   //echo $ingresar->getPrsona();

?>
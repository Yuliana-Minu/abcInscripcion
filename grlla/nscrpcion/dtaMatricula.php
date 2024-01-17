
<!-- *************** Inicio de page container ************************************************ -->
<?php 
if($eni_estado == 2){
    $title = "DATOS DE MATRICULA";
}

if($eni_estado == 3){
    $title = "MATRICULADO";
}

?>

<div class="row">
    <div class="col-sm-12 text-center">
        <h2 style="color: #0c438f;"><strong>GIMNASIO AMERICANO ABC</strong></h2>
        <h3 style="color: #0c438f;"><strong><?php echo $title; ?></strong></h3>
        <h5 style="color: red; display:<?php echo $ver_boton_cargar_foto; ?> "><strong>Recuerde cargar las fotos para finalizar el proceso !</strong></h3>
        <input type="hidden" id="ideNinio" value="<?php echo $per_identificacion; ?>">
    </div>
</div>


<!-- **********************          Inicio Modal Forma    *********************************** -->
<div class="modal fade" tabindex="-1" id="frmModal" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            Cargando...
        </div>
    </div>
</div>
<!-- **********************          Fin Modal Forma       *********************************** -->


<div class="row">
    <div class="col-sm-12" style="padding-top: 10px; text-align: right; display:<?php echo $ver_boton_cargar_foto; ?> ">
        <button type="button" class="btn btn-danger btn-sm" onclick="finalizarMatricula();" title="Finalizar"><strong><i class="fas fa-save"></i> &nbsp;&nbsp;Finalizar Proceso </strong></button>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 texto" style="color: red; font-size: 17px;">

    </div>
</div>


<div class="row">
    <div class="col-sm-12" id="Padre" style="padding-top: 10px; overflow: auto;">
        <div class="row">
            <div class="col-sm-12">
            <?php
                $personaSistema = $_SESSION['idusuario'];
                $datos_estudiante=$objRsMatricula->datos_ninio($personaSistema);
                foreach($datos_estudiante as $data_estudiantes){
                    $per_codigo=$data_estudiantes['per_codigo'];
                    $per_nombre=$data_estudiantes['per_nombre'];
                    $per_primerapellido=$data_estudiantes['per_primerapellido'];
                    $per_segundonombre=$data_estudiantes['per_segundonombre'];
                    $per_segundoapellido=$data_estudiantes['per_segundoapellido'];
                    $per_identificacion=$data_estudiantes['per_identificacion'];
                    $per_fechanacimiento=$data_estudiantes['per_fechanacimiento'];
                    $per_municipionacimiento=$data_estudiantes['per_municipionacimiento'];
                    $per_foto=$data_estudiantes['per_foto'];
                    $dba_direccion=$data_estudiantes['dba_direccion'];
                    $dba_municipioresidencia=$data_estudiantes['dba_municipioresidencia'];
                    $dba_correo=$data_estudiantes['dba_correo'];
                    $dba_telefono=$data_estudiantes['dba_telefono'];
                    $dba_celular=$data_estudiantes['dba_celular'];
                    $dba_ocupacion=$data_estudiantes['dba_ocupacion'];
                    $per_nacionalidad=$data_estudiantes['per_nacionalidad'];
                    $per_otranacionalidad=$data_estudiantes['per_otranacionalidad'];
                    $per_tipoidentificacion=$data_estudiantes['per_tipoidentificacion'];
                    $dba_lugarexpedicion=$data_estudiantes['dba_lugarexpedicion'];
                    $dba_eps=$data_estudiantes['dba_eps'];
                    $dba_estrato=$data_estudiantes['dba_estrato'];
                    $dba_sisben=$data_estudiantes['dba_sisben'];
                    $dba_rh=$data_estudiantes['dba_rh'];

                    $foto_ninio = str_replace('abcInscripcion/','',$per_foto);

                    if(file_exists($foto_ninio)) {
                        $existe_fto_ninio = 1;
                    }
                    else {
                        $existe_fto_ninio = 0;
                    }

                    $eps=$objRsMatricula->eps_nombre($dba_eps);

                    $rh=$objRsMatricula->rh_nombre($dba_rh);

                    if($dba_sisben==1){
                        $sisbenSi="<strong>X</strong>";
                        $sisbenNo="";
                    }
                    else{
                        $sisbenSi="";
                        $sisbenNo="<strong>X</strong>";
                    }
                    
                    $tipo_identificacion=$objRsMatricula->nombre_tipo_identificacion($per_tipoidentificacion);


                    $nombre_completo=$per_nombre." ".$per_segundonombre." ".$per_primerapellido." ".$per_segundoapellido;


                    if($per_nacionalidad==1){
                        $lugar_nacimiento=$objRsInscripcion->lugar_nacimiento($per_municipionacimiento);
                    }
                    else{
                        $lugar_nacimiento=$per_otranacionalidad;
                    }
                    

                    if($per_fechanacimiento){

                        $fecha_de_nacimiento = $per_fechanacimiento;
                        $fecha_actual = date ("Y-m-d");

                        // separamos en partes las fechas
                        $form1 = explode ( "-", $fecha_de_nacimiento );
                        $form2 = explode ( "-", $fecha_actual );

                        $anos = $form2[0] - $form1[0]; // calculamos años
                        $meses = $form2[1] - $form1[1];

                        if($meses<0){
                            $anos = $anos - 1;
                            $meses = 0;
                        }
                        else{
                            $anos = $anos;
                            $meses = $meses; 
                        }
                        
                        

                        $edad= $anos." años y  ".$meses." meses";
                    }
                    else{
                        echo $edad=' ';
                    }
                }

                $datos_matricula=$objRsMatricula->datos_matricula($personaSistema, $calendario_apertura);

                if($datos_matricula){
                    foreach($datos_matricula as $data_inscripcion){
                        $dma_codigo=$data_inscripcion['dma_codigo'];
                        $dma_fechamatricula=$data_inscripcion['dma_fechamatricula'];
                        $gra_nombre=$data_inscripcion['gra_nombre'];
                    }
                }
               
            ?>  
                <input type="hidden" id="ideNinio" value="<?php echo $per_identificacion;?>">
                <h5 style="color: #0c438f;"><strong>INFORMACI&Oacute;N PERSONAL DEL ESTUDIANTE</strong></h5>
                <hr style="border: 2px solid red; ">
                <input type="hidden" id="user" value="<?php echo $personaSistema; ?>">
                <input type="hidden" name="existe_fto_ninio" id="existe_fto_ninio" value="<?php echo $existe_fto_ninio; ?>">
                <table class="table table-bordered table-striped">
                    <tr>
                        <td colspan="2">GRADO A INGRESAR: <?php echo $gra_nombre; ?></td>
                        <td colspan="2">FECHA PRE MATRICULA: <?php echo $dma_fechamatricula; ?></td>
                        <td rowspan="7">
                            <div class="col-sm-12" style=" display:<?php echo $ver_boton_cargar_foto; ?>;">
                                <button type="button" class="btn btn-danger btn-sm" onclick="foto('<?php echo $personaSistema; ?>','<?php echo $per_identificacion; ?>');" title="foto Nin@"><strong><i class="fas fa-image fa-lg"></i>&nbsp;FOTO NIÑ@ </strong></button>
                            </div>
                            <img src="<?php echo $foto_ninio;?>" alt="<?php echo $nombre_completo; ?>" width="300">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">NOMBRES Y APELLIDOS COMPLETOS: (COMO APARECE EN EL REGISTRO): <?php echo $nombre_completo; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">TIPO IDENTIFICACIÓN <?php echo $tipo_identificacion; ?></td>
                        <td colspan="1">No°  <?php echo $lugar_nacimiento; ?></td>
                        <td colspan="1">LUGAR DE EXPEDICIÓN <?php echo $dba_lugarexpedicion; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">LUGAR Y FECHA DE NACIMIENTO: <?php echo $lugar_nacimiento." ".substr($per_fechanacimiento,0,10); ?></td>
                        <td colspan="2">EDAD: <?php echo $edad; ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">DIRECCION DE RESIDENCIA: <?php echo $dba_direccion." ".$residencia=$objRsInscripcion->lugar_nacimiento($dba_municipioresidencia); ?></td>
                    </tr>
                    <tr>
                        <td>TELÉFONO: <?php echo $dba_telefono; ?></td>
                        <td>CELULAR: <?php echo $dba_celular; ?></td>
                        <td colspan="2">CORREO: <?php echo $dba_correo; ?></td>
                    </tr>
                    <tr>
                        <td>EPS: <?php echo $eps; ?></td>
                        <td>RH: <?php echo $rh; ?></td>
                        <td>ESTRATO: <?php echo $dba_estrato; ?></td>
                        <td>SISBEN: SI: <?php echo $sisbenSi; ?> &nbsp;&nbsp; NO: <?php echo $sisbenNo; ?> </td>
                    </tr>
                </table>
            </div>
        </div>
        

        <!--DATOS PAPÁS-->
        <div class="row">
            <div class="col-sm-12">
                <h5 style="color: #0c438f;"><strong>INFORMACI&Oacute;N DEL PAP&Aacute;</strong></h5>
                <hr style="border: 2px solid red; ">

                <?php 
                    $datos_papito=$objRsMatricula->datos_papa($personaSistema);
                    if($datos_papito){
                        foreach($datos_papito as $data_papito){
                            $per_codigoPapa=$data_papito['per_codigo'];
                            $per_nombrePapa=$data_papito['per_nombre'];
                            $per_segundonombrePapa=$data_papito['per_segundonombre'];
                            $per_primerapellidoPapa=$data_papito['per_primerapellido'];
                            $per_segundoapellidoPapa=$data_papito['per_segundoapellido'];
                            $per_generoPapa=$data_papito['per_segundoapellido'];
                            $per_fechanacimientoPapa=$data_papito['per_fechanacimiento'];
                            $per_municipionacimientoPapa=$data_papito['per_municipionacimiento'];
                            $per_fotoPapa=$data_papito['per_foto'];
                            $per_identificacionPapa=$data_papito['per_identificacion'];
                            $dba_celularPapa=$data_papito['dba_celular'];
                            $dba_telefonoPapa=$data_papito['dba_telefono'];
                            $dba_correoPapa=$data_papito['dba_correo'];
                            $dba_direccionPapa=$data_papito['dba_direccion'];
                            $dba_ocupacionPapa=$data_papito['dba_ocupacion'];
                            $per_nacionalidadPapa=$data_papito['per_nacionalidad'];
                            $per_otranacionalidadPapa=$data_papito['per_otranacionalidad'];
                        }

                        $foto_papa = str_replace('abcInscripcion/','',$per_fotoPapa);

                        if(file_exists($foto_papa)) {
                            $existe_fto_papa = 1;
                        }
                        else {
                            $existe_fto_papa = 0;
                        }

                        $nombre_papito=$per_nombrePapa." ".$per_segundonombrePapa." ".$per_primerapellidoPapa." ".$per_segundoapellidoPapa;
                        
                        if($per_nacionalidadPapa==1){
                            $papaDe=$objRsInscripcion->lugar_nacimiento($per_municipionacimientoPapa);
                        }
                        else{
                            $papaDe=$per_otranacionalidadPapa;
                        }

                        
                        //echo "Nace --< ".$per_fechanacimientoPapa;
                        if($per_fechanacimientoPapa){
                            $fecha_actual = date('Y-m-d');
                            
                            $diferencia_fechas= abs(strtotime($fecha_actual) - strtotime($per_fechanacimientoPapa));
                            
                            $edadPapa = floor($diferencia_fechas / (365*60*60*24));
                        }
                        else{
                            echo $edadPapa="";
                        }

                        $info_adicional_papito=$objRsInscripcion->info_adicional_papito($per_codigoPapa);
                        foreach($info_adicional_papito as $data_info_adicional_papito){
                            $dpa_vivePapa=$data_info_adicional_papito['dpa_vive'];
                            $dpa_cargoPapa=$data_info_adicional_papito['dpa_cargo'];
                            $dpa_empresaPapa=$data_info_adicional_papito['dpa_empresa'];
                            $dpa_direccionoficinaPapa=$data_info_adicional_papito['dpa_direccionoficina'];
                            $dpa_telefonooficinaPapa=$data_info_adicional_papito['dpa_telefonooficina'];
                            $dpa_niveleducativoPapa=$data_info_adicional_papito['dpa_niveleducativo'];
                        }

                    }
                    
                ?>
                <input type="hidden" name="existe_fto_papa" id="existe_fto_papa" value="<?php echo $existe_fto_papa; ?>">
                <table class="table table-bordered table-striped">
                    <tr>
                        <td colspan="4">NOMBRE Y APELLIDOS COMPLETOS: <?php echo $nombre_papito; ?></td>
                        <td rowspan="5">
                            <div class="col-sm-12" style=" display:<?php echo $ver_boton_cargar_foto; ?>;">
                                <button type="button" class="btn btn-danger btn-sm" onclick="foto('<?php echo $per_codigoPapa; ?>','<?php echo $per_identificacion; ?>');" title="foto Papá"><strong><i class="fas fa-image fa-lg"></i>&nbsp;FOTO PAPÁ </strong></button>
                            </div>
                            <img src="<?php echo $foto_papa;?>" alt="<?php echo $nombre_papito; ?>" width="300">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">No° IDENTIFICACIÓN <?php echo $per_identificacionPapa ?></td>
                        <td>DE: <?php echo $papaDe; ?></td>
                        <td>EDAD: <?php echo $edadPapa; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">PROFESIÓN: <?php echo $dba_ocupacionPapa; ?></td>
                        <td colspan="2">EMPRESA DONDE TRABAJA: <?php echo $dpa_empresaPapa; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">TELÉFONO: <?php echo $dba_telefonoPapa; ?></td>
                        <td colspan="2">CELULAR:  <?php echo $dba_celularPapa; ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">CARGO QUE DESEMPEÑA: <?php echo $dpa_cargoPapa; ?></td>
                       
                    </tr>
                </table>
            </div>
        </div>

        <!--DATOS MAMÁ-->

        <div class="row">
            <div class="col-sm-12">
                <h5 style="color: #0c438f;"><strong>INFORMACI&Oacute;N DE LA MAM&Aacute;</strong></h5>
                <hr style="border: 2px solid red; ">
                <?php 
                    $datos_mamita=$objRsMatricula->datos_mama($personaSistema);

                    if($datos_mamita){
                        foreach($datos_mamita as $data_mamita){
                            $per_codigoMama=$data_mamita['per_codigo'];
                            $per_nombreMama=$data_mamita['per_nombre'];
                            $per_segundonombreMama=$data_mamita['per_segundonombre'];
                            $per_primerapellidoMama=$data_mamita['per_primerapellido'];
                            $per_segundoapellidoMama=$data_mamita['per_segundoapellido'];
                            $per_generoMama=$data_mamita['per_segundoapellido'];
                            $per_fechanacimientoMama=$data_mamita['per_fechanacimiento'];
                            $per_municipionacimientoMama=$data_mamita['per_municipionacimiento'];
                            $per_fotoMama=$data_mamita['per_foto'];
                            $per_identificacionMama=$data_mamita['per_identificacion'];
                            $dba_celularMama=$data_mamita['dba_celular'];
                            $dba_telefonoMama=$data_mamita['dba_telefono'];
                            $dba_correoMama=$data_mamita['dba_correo'];
                            $dba_direccionMama=$data_mamita['dba_direccion'];
                            $dba_ocupacionMama=$data_mamita['dba_ocupacion'];
                            $per_nacionalidadMama=$data_mamita['per_nacionalidad'];
                            $per_otranacionalidadMama=$data_mamita['per_otranacionalidad'];

                        }
                        $foto_mama = str_replace('abcInscripcion/','',$per_fotoMama);

                        $nombre_mamita=$per_nombreMama." ".$per_segundonombreMama." ".$per_primerapellidoMama." ".$per_segundoapellidoMama;
                        
                        if($per_nacionalidadMama==1){
                            $mamaDe=$objRsInscripcion->lugar_nacimiento($per_municipionacimientoMama);
                        }
                        else{
                            $mamaDe=$per_otranacionalidadMama;
                        }

                        if(file_exists($foto_mama)) {
                            $existe_fto_mama = 1;
                        }
                        else {
                            $existe_fto_mama = 0;
                        }


                        if($per_fechanacimientoMama){
                            $fecha_actual = date('Y-m-d');
                            
                            $diferencia_fechas= abs(strtotime($fecha_actual) - strtotime($per_fechanacimientoMama));
                            
                            $edadMama = floor($diferencia_fechas / (365*60*60*24));
                        }
                        else{
                            echo $edadMama="";
                        }

                        $info_adicional_mamita=$objRsInscripcion->info_adicional_papito($per_codigoMama);
                        foreach($info_adicional_mamita as $data_info_adicional_mamita){
                            $dpa_viveMama=$data_info_adicional_mamita['dpa_vive'];
                            $dpa_cargoMama=$data_info_adicional_mamita['dpa_cargo'];
                            $dpa_empresaMama=$data_info_adicional_mamita['dpa_empresa'];
                            $dpa_direccionoficinaMama=$data_info_adicional_mamita['dpa_direccionoficina'];
                            $dpa_telefonooficinaMama=$data_info_adicional_mamita['dpa_telefonooficina'];
                            $dpa_niveleducativoMama=$data_info_adicional_mamita['dpa_niveleducativo'];
                        }
                    }
                    
                ?>
                <input type="hidden" name="existe_fto_mama" id="existe_fto_mama" value="<?php echo $existe_fto_mama; ?>">
                <table class="table table-bordered table-striped">
                    <tr>
                        <td colspan="4">NOMBRE Y APELLIDOS COMPLETOS: <?php echo $nombre_mamita;?></td>
                        <td rowspan="5">
                            <div class="col-sm-12" style=" display:<?php echo $ver_boton_cargar_foto; ?>;">
                                <button type="button" class="btn btn-danger btn-sm" onclick="foto('<?php echo $per_codigoMama; ?>','<?php echo $per_identificacion; ?>');" title="foto Mamá"><strong><i class="fas fa-image fa-lg"></i>&nbsp;FOTO MAMÁ </strong></button>
                            </div>
                            <img src="<?php echo $foto_mama;?>" alt="<?php echo $nombre_mamita; ?>" width="300">
                        </td>
                    </tr>
                    <tr>
                    <td colspan="2">No° IDENTIFICACIÓN <?php echo $per_identificacionMama ?></td>
                        <td>DE: <?php echo $mamaDe; ?></td>
                        <td>EDAD: <?php echo $edadMama; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">PROFESIÓN: <?php echo $dba_ocupacionMama; ?></td>
                        <td colspan="2">EMPRESA DONDE TRABAJA: <?php echo $dpa_empresaMama; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">TELÉFONO: <?php echo $dba_telefonoMama; ?></td>
                        <td colspan="2">CELULAR:  <?php echo $dba_celularMama; ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">CARGO QUE DESEMPEÑA: <?php echo $dpa_cargoMama; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    

     <!--DATOS ACUDIENTE-->

        <div class="row">
            <div class="col-sm-12">
                <h5 style="color: #0c438f;"><strong>INFORMACI&Oacute;N DEL ACUDIENTE</strong></h5>
                <hr style="border: 2px solid red; ">
                <?php 
                    $datos_acudiente=$objRsMatricula->datos_acudiente($personaSistema);

                    if($datos_acudiente){
                        foreach($datos_acudiente as $data_acudiente){
                            $per_codigoAcudiente=$data_acudiente['per_codigo'];
                            $per_nombreAcudiente=$data_acudiente['per_nombre'];
                            $per_segundonombreAcudiente=$data_acudiente['per_segundonombre'];
                            $per_primerapellidoAcudiente=$data_acudiente['per_primerapellido'];
                            $per_segundoapellidoAcudiente=$data_acudiente['per_segundoapellido'];
                            $per_generoAcudiente=$data_acudiente['per_segundoapellido'];
                            $per_fechanacimientoAcudiente=$data_acudiente['per_fechanacimiento'];
                            $per_municipionacimientoAcudiente=$data_acudiente['per_municipionacimiento'];
                            $per_fotoAcudiente=$data_acudiente['per_foto'];
                            $per_identificacionAcudiente=$data_acudiente['per_identificacion'];
                            $dba_celularAcudiente=$data_acudiente['dba_celular'];
                            $dba_telefonoAcudiente=$data_acudiente['dba_telefono'];
                            $dba_correoAcudiente=$data_acudiente['dba_correo'];
                            $dba_direccionAcudiente=$data_acudiente['dba_direccion'];
                            $dba_ocupacionAcudiente=$data_acudiente['dba_ocupacion'];
                            $per_nacionalidadAcudiente=$data_acudiente['per_nacionalidad'];
                            $per_otranacionalidadAcudiente=$data_acudiente['per_otranacionalidad'];

                        }

                        $foto_acudiente = str_replace('abcInscripcion/','',$per_fotoAcudiente);
                    
                        $nombre_acudiente=$per_nombreAcudiente." ".$per_segundonombreAcudiente." ".$per_primerapellidoAcudiente." ".$per_segundoapellidoAcudiente;
                        
                        if($per_nacionalidadAcudiente==1){
                            $acudienteDe=$objRsInscripcion->lugar_nacimiento($per_municipionacimientoAcudiente);
                        }
                        else{
                            $acudienteDe=$per_otranacionalidadPapa;
                        }

                        if(file_exists($foto_acudiente)) {
                            $existe_fto_acudiente = 1;
                        }
                        else {
                            $existe_fto_acudiente = 0;
                        }


                        if($per_fechanacimientoAcudiente){
                            $fecha_actual = date('Y-m-d');
                            
                            $diferencia_fechas= abs(strtotime($fecha_actual) - strtotime($per_fechanacimientoAcudiente));
                            
                            $acudienteEdad = floor($diferencia_fechas / (365*60*60*24));
                        }
                        else{
                            echo $acudienteEdad="";
                        }

                        $info_adicional_Acudiente=$objRsInscripcion->info_adicional_papito($per_codigoAcudiente);
                        foreach($info_adicional_Acudiente as $data_info_adicional_Acudiente){
                            $dpa_viveAcudiente=$data_info_adicional_Acudiente['dpa_vive'];
                            $dpa_cargoAcudiente=$data_info_adicional_Acudiente['dpa_cargo'];
                            $dpa_empresaAcudiente=$data_info_adicional_Acudiente['dpa_empresa'];
                            $dpa_direccionoficinaAcudiente=$data_info_adicional_Acudiente['dpa_direccionoficina'];
                            $dpa_telefonooficinaAcudiente=$data_info_adicional_Acudiente['dpa_telefonooficina'];
                            $dpa_niveleducativoAcudiente=$data_info_adicional_Acudiente['dpa_niveleducativo'];
                        }

                    }
                    
                ?>
                <input type="hidden" name="existe_fto_acudiente" id="existe_fto_acudiente" value="<?php echo $existe_fto_acudiente; ?>">
                <table class="table table-bordered table-striped">
                    <tr>
                        <td colspan="4">NOMBRE Y APELLIDOS COMPLETOS: <?php echo $nombre_acudiente;?></td>
                        <td rowspan="5">
                            <div class="col-sm-12" style=" display:<?php echo $ver_boton_cargar_foto; ?>;">
                                <button type="button" class="btn btn-danger btn-sm" onclick="foto('<?php echo $per_codigoAcudiente; ?>','<?php echo $per_identificacion; ?>');" title="foto Mamá"><strong><i class="fas fa-image fa-lg"></i>&nbsp;FOTO ACUDIENTE </strong></button>
                            </div>
                            <img src="<?php echo $foto_acudiente;?>" alt="<?php echo $nombre_acudiente; ?>" width="300">
                        </td>
                    </tr>
                    <tr>
                    <td colspan="2">No° IDENTIFICACIÓN <?php echo $per_identificacionAcudiente ?></td>
                        <td>DE: <?php echo $acudienteDe; ?></td>
                        <td>EDAD: <?php echo $acudienteEdad; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">PROFESIÓN: <?php echo $dba_ocupacionAcudiente; ?></td>
                        <td colspan="2">EMPRESA DONDE TRABAJA: <?php echo $dpa_empresaAcudiente; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">TELÉFONO: <?php echo $dba_telefonoAcudiente; ?></td>
                        <td colspan="2">CELULAR:  <?php echo $dba_celularAcudiente; ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">CARGO QUE DESEMPEÑA: <?php echo $dpa_cargoAcudiente; ?></td>
                    </tr>
                </table>
            </div>
        </div>


    </div>
</div>					
    
<script src="vjs/matricula/finalizarMatricula.js"></script>
<script>
    function foto(codigo_persona, identificacion_ninio){
        var codigo_persona= codigo_persona;
        var identificacion_ninio = identificacion_ninio;
        $('#frmModal').modal({
            keyboard: true
        });
        
        $.ajax({
            url:"formfoto",
            type:"POST",
            data:"codigo_persona="+codigo_persona+'&identificacion_ninio='+identificacion_ninio,
            async:true,

            success: function(message){
                $(".modal-content").empty().append(message);
            }
        });
    }

    function agregar(){
        var user=$('#user').val();
        window.location.replace('datosinscripcionimp');
        /*var seccion=1;
        $('#frmModal').modal({
            keyboard: true
        });
        $.ajax({
            url:"frmpadres",
            type:"POST",
            data:"seccion="+seccion,
            async:true,

            success: function(message){
                $(".modal-content").empty().append(message);
            }
        });*/
    }
</script>



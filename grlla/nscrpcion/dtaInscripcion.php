<?php
    $personaSistema = $_SESSION['idusuario'];

    $datos_estudiante=$objRsInscripcion->informacion_estudiante($personaSistema);
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

        $foto_ninio = str_replace('abcInscripcion/','',$per_foto);

        if(file_exists($foto_ninio)) {
            $existe_fto_ninio = 1;
        }
        else {
            $existe_fto_ninio = 0;
        }

        $nombre_completo=$per_nombre." ".$per_segundonombre." ".$per_primerapellido." ".$per_segundoapellido;

        $lugar_nacimiento=$objRsInscripcion->lugar_nacimiento($per_municipionacimiento);

        if($per_fechanacimiento){

            $fecha_de_nacimiento = $per_fechanacimiento;
            $fecha_actual = date ("Y-m-d");

            // separamos en partes las fechas
            $form1 = explode ( "-", $fecha_de_nacimiento );
            $form2 = explode ( "-", $fecha_actual );

            $anos = $form2[0] - $form1[0]; // calculamos años
            $meses = $form2[1] - $form1[1];
            $fecha_actual = date('Y-m-d');
            
            

            $edad= $anos." años y  ".$meses." meses";
        }
        else{
            echo $edad=' ';
        }
    }

    $datos_inscripcion=$objRsInscripcion->datos_inscripcion($personaSistema, $calendario_apertura);

    foreach($datos_inscripcion as $data_inscripcion){
        $din_codigo=$data_inscripcion['din_codigo'];
        $din_vivecon=$data_inscripcion['din_vivecon'];
        $din_tienefamiliar=$data_inscripcion['din_tienefamiliar'];
        $din_parentesco=$data_inscripcion['din_parentesco'];
        $din_gradoingresar=$data_inscripcion['din_gradoingresar'];
        $din_gradoactual=$data_inscripcion['din_gradoactual'];
        $din_estudiaen=$data_inscripcion['din_estudiaen'];
        $din_motivoretiro=$data_inscripcion['din_motivoretiro'];

    }

    if($din_tienefamiliar==1){
        $si_familiar="X";
        $no_familiar="";
        $parentesco_nombre=$objRsInscripcion->parentesco_nombre($din_parentesco);
    }
    else{
        $si_familiar="";
        $no_familiar="X";
        $parentesco_nombre="";
    }

    $grado_ingresar=$objRsInscripcion->grado_ingresar($din_gradoingresar);
?>  
<div class="row">
    <div class="col-sm-12 text-center">
        <h1 style="color: #0c438f;"><strong>GIMNASIO AMERICANO ABC</strong></h1>
        <h3 style="color: #0c438f;"><strong>DATOS INSCRIPCI&Oacute;N</strong></h3>
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
    <div class="col-sm-12" style="padding-top: 10px; text-align: right; display:<?php echo $ver_boton_imprimir; ?> ">
        <button type="button" style="width: 140px" class="btn btn-danger btn-sm" onclick="agregar();" title="Documento"><strong><i class="far fa-file-pdf"></i> &nbsp;&nbsp;Documento </strong></button>
    </div>
</div>

<div class="row">
    <div class="col-sm-12" style="padding-top: 10px; text-align: right; display:<?php echo $ver_boton_cargar_foto; ?> ">
        <button type="button" class="btn btn-danger btn-sm" onclick="finalizarInscripcion();" title="Finalizar"><strong><i class="fas fa-save"></i> &nbsp;&nbsp;Finalizar Proceso </strong></button>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 texto" style="color: red; font-size: 17px;">

    </div>
</div>

<div class="row">
    <div class="col-sm-12" id="Padre" style="padding-top: 10px; overflow: auto;">
        <input type="hidden" name="existe_fto_ninio" id="existe_fto_ninio" value="<?php echo $existe_fto_ninio; ?>">
        <div class="row">
            <div class="col-sm-12">
            
                <h5 style="color: #0c438f;"><strong>INFORMACI&Oacute;N PERSONAL DEL ESTUDIANTE</strong></h5>
                <hr style="border: 2px solid red; ">
                <input type="hidden" id="user" value="<?php echo $personaSistema; ?>">
                <table class="table table-bordered table-striped table-sm">
                    <tr>
                        <td>GRADO A INGRESAR: <?php echo $grado_ingresar; ?></td>
                        <td colspan="2">REGISTRO Y/O TARJETA DE IDENTIDAD: <?php echo $per_identificacion; ?></td>
                        <td rowspan="7">
                            <div class="col-sm-12" style=" display:<?php echo $ver_boton_cargar_foto; ?>;">
                                <button type="button" class="btn btn-danger btn-sm" onclick="foto('<?php echo $personaSistema; ?>','<?php echo $per_identificacion; ?>');" title="foto Nin@"><strong><i class="fas fa-image fa-lg"></i>&nbsp;FOTO NIÑ@ </strong></button>
                            </div>

                            <img src="<?php echo $foto_ninio;?>" alt="<?php echo $nombre_completo; ?>" width="300">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">NOMBRES Y APELLIDOS COMPLETOS: (COMO APARECE EN EL REGISTRO): <?php echo $nombre_completo; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">LUGAR Y FECHA DE NACIMIENTO: <?php echo $lugar_nacimiento." ".substr($per_fechanacimiento,0,10); ?></td>
                        <td>EDAD: <?php echo $edad; ?></td>
                    </tr>
                    <tr>
                        <td>ACTUALMENTE CURSA EL GRADO:  <?php echo $din_gradoactual; ?></td>
                        <td>EN:  <?php echo $din_estudiaen; ?></td>
                        <td>MOTIVO DEL RETIRO:  <?php echo $din_motivoretiro; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">ACTUALMENTE VIVE CON: <?php echo $din_vivecon; ?></td>
                        <td>TEL&Eacute;FONO: <?php echo $dba_telefono; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">DIRECCION Y BARRIO: <?php echo $dba_direccion; ?></td>
                        <td>CORREO ELECTRONICO: <?php echo $dba_correo; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">TIENE FAMILIARES EN ESTA INSTITUCION:  SI:  <?php echo "<strong>".$si_familiar."</strong>" ; ?>  NO:   <?php echo "<strong>".$no_familiar."</strong>" ; ?></td>
                        <td>PARENTESCO: <?php echo $parentesco_nombre; ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <!--DATOS ESTUDIOS ANTERIORES-->
        <div class="row">
            <div class="col-sm-12">
                <h5 style="color: #0c438f;"><strong>EDUCACI&Oacute;N ANTERIOR DEL ESTUDIANTE</strong></h5>
                <hr style="border: 2px solid red; ">
                <table class="table table-bordered table-striped table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th>GRADO</th>
                            <th>COLEGIO</th>
                            <th>DIRECCIÓN</th>
                            <th>TELÉFONO</th>
                            <th>CUIDAD</th>
                            <th>AÑO</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $educacion_anterior=$objRsInscripcion->educacion_anterior($personaSistema);
                        if($educacion_anterior){
                            foreach($educacion_anterior as $data_estudio_anterior){
                                $ean_codigo=$data_estudio_anterior['ean_codigo'];
                                $ean_grado=$data_estudio_anterior['ean_grado'];
                                $ean_colegio=$data_estudio_anterior['ean_colegio'];
                                $ean_direccion=$data_estudio_anterior['ean_direccion'];
                                $ean_telefono=$data_estudio_anterior['ean_telefono'];
                                $ean_ciudad=$data_estudio_anterior['ean_ciudad'];
                                $ean_year=$data_estudio_anterior['ean_year'];
                                $ean_ninio=$data_estudio_anterior['ean_ninio'];
                    ?>
                        <tr>
                            <td><?php echo $ean_grado; ?></td>
                            <td><?php echo $ean_colegio; ?></td>
                            <td><?php echo $ean_direccion; ?></td>
                            <td><?php echo $ean_telefono; ?></td>
                            <td><?php echo $ean_ciudad; ?></td>
                            <td><?php echo $ean_year; ?></td>
                        </tr>
                    <?php
                            }
                        }
                        else{

                    ?>
                        <tr>
                            <td colspan="6">No hay datos de Estudios anteriores</td>
                        </tr>
                    <?php
                            
                        }
                    ?>
                    </tbody>
                    <tfoot>
                    <?php 
                        $info_anio_perdido=$objRsInscripcion->info_anio_perdido($personaSistema);
                        if($info_anio_perdido){
                            foreach($info_anio_perdido as $data_info_anio_perdido){
                                $dcp_haperdido=$data_info_anio_perdido['dcp_haperdido'];
                                $dcp_cual=$data_info_anio_perdido['dcp_cual'];
                            }

                            if($dcp_haperdido==1){
                                $si_perdio="X";
                                $no_perdio="";
                            }
                            else{
                                $si_perdio="";
                                $no_perdio="X";
                            }
                        }
                    ?>
                        <tr>
                            <td colspan="3">¿HA PERDIDO CURSOS? SI:  <?php echo "<strong>".$si_perdio."</strong>" ; ?>  NO:   <?php echo "<strong>".$no_perdio."</strong>" ; ?></td>
                            <td colspan="3">¿CUÁL(ES)?</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <!--DATOS ACOMPAÑAMIENTO -->

        <div class="row">
            <div class="col-sm-12">
                <h5 style="color: #0c438f;"><strong>¿En el colegio anterior recibió algún tipo de seguimiento y acompañamiento? </strong></h5>
                <hr style="border: 2px solid red; ">
                
                <?php
                    $academico=$objRsInscripcion->datos_acompaniamiento($personaSistema, 1);
                    if($academico==1){
                        $si_academico="<strong>X</strong>";
                    }
                    else{
                        $si_academico="";
                    }

                    $orientacion_escolar=$objRsInscripcion->datos_acompaniamiento($personaSistema, 2);
                    if($orientacion_escolar==1){
                        $si_orientacion_escolar="<strong>X</strong>";
                    }
                    else{
                        $si_orientacion_escolar="";
                    }

                    $comportamental=$objRsInscripcion->datos_acompaniamiento($personaSistema, 3);
                    if($comportamental==1){
                        $si_comportamental="<strong>X</strong>";
                    }
                    else{
                        $si_comportamental="";
                    }

                    $otro_acompaniamiento=$objRsInscripcion->datos_acompaniamiento($personaSistema, 4);
                    if($otro_acompaniamiento==1){
                        $si_otro_acompaniamiento="<strong>X</strong>";
                        $descripcion_acompaniamiento=$objRsInscripcion->cual_acompaniamiento($personaSistema, 4);
                    }
                    else{
                        $descripcion_acompaniamiento="";
                        $si_otro_acompaniamiento="";
                    }


                ?>
                <table class="table table-bordered table-striped table-sm">
                    <tr>
                        <td>ACAD&Eacute;MICO:&nbsp;<?php echo $si_academico; ?> &nbsp;&nbsp;  ORIENTACI&Oacute;N ESCOLAR:&nbsp; <?php echo $si_orientacion_escolar; ?> &nbsp;&nbsp; COMPORTAMENTAL:&nbsp;<?php echo $si_comportamental; ?> &nbsp;&nbsp; OTRO:  <?php echo $si_otro_acompaniamiento; ?>   &nbsp;&nbsp;   ¿CU&Aacute;L? &nbsp; <?php echo $descripcion_acompaniamiento; ?>  </td>
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
                    $datos_papito=$objRsInscripcion->info_papito($personaSistema);
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
                        }

                        $foto_papa = str_replace('abcInscripcion/','',$per_fotoPapa);

                        $nombre_papito=$per_nombrePapa." ".$per_segundonombrePapa." ".$per_primerapellidoPapa." ".$per_segundoapellidoPapa;
                        
                        if(file_exists($foto_papa)) {
                            $existe_fto_papa = 1;
                        }
                        else {
                            $existe_fto_papa = 0;
                        }

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

                        if($dpa_vivePapa==1){
                            $si_vivepapa="X";
                            $no_vivepapa="";
                        }
                        else{
                            $si_vivepapa="";
                            $no_vivepapa="X";
                        }
                    }
                ?>
                <input type="hidden" name="existe_fto_papa" id="existe_fto_papa" value="<?php echo $existe_fto_papa; ?>">
                <table class="table table-bordered table-striped table-sm">
                    <tr>
                        <td colspan="2">NOMBRE Y APELLIDOS COMPLETOS: <?php echo $nombre_papito; ?></td>
                        <td colspan="2">CC. No. <?php echo $per_identificacionPapa; ?></td>
                        <td rowspan="7">
                            <div class="col-sm-12" style=" display:<?php echo $ver_boton_cargar_foto; ?>;">
                                <button type="button" class="btn btn-danger btn-sm" onclick="foto('<?php echo $per_codigoPapa; ?>','<?php echo $per_identificacion; ?>');" title="foto Papá"><strong><i class="fas fa-image fa-lg"></i>&nbsp;FOTO PAPÁ </strong></button>
                            </div>
                            <img src="<?php echo $foto_papa;?>" alt="<?php echo $nombre_papito; ?>" width="300">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">FECHA DE NACIMIENTO: <?php echo substr($per_fechanacimientoPapa,0,10);; ?></td>
                        <td>EDAD: <?php echo $edadPapa; ?></td>
                        <td>¿VIVE? SI: <strong><?php echo $si_vivepapa; ?></strong>  NO: <strong><?php echo $no_vivepapa; ?></strong></td>
                    </tr>
                    <tr>
                        <td colspan="4">NIVEL EDUCATIVO TITULO: <?php echo $dpa_niveleducativoPapa; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">CORREO ELECTRONICO: <?php echo $dba_correoPapa; ?></td>
                        <td colspan="2">OCUPACIÓN: <?php echo $dba_ocupacionPapa; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">EMPRESA: <?php echo $dpa_empresaPapa; ?></td>
                        <td colspan="2">CARGO:  <?php echo $dpa_cargoPapa; ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">DIRECCIÓN OFICINA: <?php echo $dpa_direccionoficinaPapa; ?></td>
                        <td>TELÉFONO OFICINA: <?php echo $dpa_telefonooficinaPapa; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">DIRECCIÓN RESIDENCIA: <?php echo $dba_direccionPapa; ?></td>
                        <td>TELÉFONO RESIDENCIA: <?php echo $dba_telefonoPapa; ?></td>
                        <td>N° CELULAR: <?php echo $dba_celularPapa; ?></td>
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
                    $datos_mamita=$objRsInscripcion->info_mamita($personaSistema);

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

                            
                        }

                        $foto_mama = str_replace('abcInscripcion/','',$per_fotoMama);

                        $nombre_mamita=$per_nombreMama." ".$per_segundonombreMama." ".$per_primerapellidoMama." ".$per_segundoapellidoMama;

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
                            $edadMama="";
                        }

                        $info_adicional_mamita=$objRsInscripcion->info_adicional_mamita($per_codigoMama);

                        foreach($info_adicional_mamita as $data_info_adicional_mamita){
                            $dpa_viveMama=$data_info_adicional_mamita['dpa_vive'];
                            $dpa_cargoMama=$data_info_adicional_mamita['dpa_cargo'];
                            $dpa_empresaMama=$data_info_adicional_mamita['dpa_empresa'];
                            $dpa_direccionoficinaMama=$data_info_adicional_mamita['dpa_direccionoficina'];
                            $dpa_telefonooficinaMama=$data_info_adicional_mamita['dpa_telefonooficina'];
                            $dpa_niveleducativoMama=$data_info_adicional_mamita['dpa_niveleducativo'];
                        }

                        if($dpa_viveMama==1){
                            $si_vivemama="X";
                            $no_vivemama="";
                        }
                        else{
                            $si_vivemama="";
                            $no_vivemama="X";
                        }

                    }
                    
                ?>
                <input type="hidden" name="existe_fto_mama" id="existe_fto_mama" value="<?php echo $existe_fto_mama; ?>">
                <table class="table table-bordered table-striped table-sm">
                    <tr>
                        <td colspan="2">NOMBRE Y APELLIDOS COMPLETOS: <?php echo $nombre_mamita;?></td>
                        <td colspan="2">CC. No. <?php echo $per_identificacionMama;?></td>
                        <td rowspan="7">
                            <div class="col-sm-12" style=" display:<?php echo $ver_boton_cargar_foto; ?>;">
                                <button type="button" class="btn btn-danger btn-sm" onclick="foto('<?php echo $per_codigoMama; ?>','<?php echo $per_identificacion; ?>');" title="foto Mamá"><strong><i class="fas fa-image fa-lg"></i>&nbsp;FOTO MAMÁ </strong></button>
                            </div>
                            <img src="<?php echo $foto_mama;?>" alt="<?php echo $nombre_mamita; ?>" width="300"></td>
                    </tr>
                    <tr>
                        <td colspan="2">FECHA DE NACIMIENTO: <?php echo substr($per_fechanacimientoMama,0,10); ?></td>
                        <td>EDAD: <?php echo $edadMama; ?></td>
                        <td>¿VIVE? SI: <strong><?php echo $si_vivemama;  ?></strong>  NO: <strong><?php echo $no_vivemama;  ?></strong>  </td>
                    </tr>
                    <tr>
                        <td colspan="4">NIVEL EDUCATIVO TITULO: <?php echo $dpa_niveleducativoMama; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">CORREO ELECTRONICO: <?php echo $dba_correoMama; ?></td>
                        <td colspan="2">OCUPACIÓN: <?php echo $dba_ocupacionMama; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">EMPRESA: <?php echo $dpa_empresaMama; ?></td>
                        <td colspan="2">CARGO: <?php echo $dpa_cargoMama; ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">DIRECCIÓN OFICINA: <?php echo $dpa_direccionoficinaMama; ?></td>
                        <td>TELÉFONO OFICINA: <?php echo $dpa_telefonooficinaMama; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">DIRECCIÓN RESIDENCIA: <?php echo $dba_direccionMama; ?></td>
                        <td>TELÉFONO RESIDENCIA: <?php echo $dba_celularMama; ?></td>
                        <td>N° CELULAR: <?php echo $dba_celularMama; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        
        <!--DATOS MATRIMONIO-->

        <div class="row">
            <div class="col-sm-12">
                <h5 style="color: #0c438f;"><strong>MATRIMONIO</strong></h5>
                <hr style="border: 2px solid red; ">
                <?php 
                    $datos_matrimonio=$objRsInscripcion->datos_matrimonio($personaSistema);

                    if($datos_matrimonio){
                        foreach($datos_matrimonio as $data_matrimonio){
                            $dma_codigo=$data_matrimonio['dma_codigo'];
                            $dma_fechamatrimonio=$data_matrimonio['dma_fechamatrimonio'];
                            $dma_tipomatrimonio=$data_matrimonio['dma_tipomatrimonio'];
                            $dma_cual=$data_matrimonio['dma_cual'];
                            $dma_vivenjuntos=$data_matrimonio['dma_vivenjuntos'];                                             

                        }

                        if($dma_tipomatrimonio==1){
                            $catolico="<strong>x</strong>";
                            $civil="<strong></strong>";
                            $otro="<strong></strong>";
                            $cual="";
                        }
                        if($dma_tipomatrimonio==2){
                            $catolico="<strong></strong>";
                            $civil="<strong>x</strong>";
                            $otro="<strong></strong>";
                            $cual="";
                        }
                        if($dma_tipomatrimonio==3){
                            $catolico="<strong></strong>";
                            $civil="<strong></strong>";
                            $otro="<strong>x</strong>";
                            $cual=$dma_cual;
                        }

                        if($dma_vivenjuntos==1){
                            $si_vivenjuntos="<strong>x</strong>";
                            $no_vivenjuntos="";
                        }
                        else{
                            $si_vivenjuntos="";
                            $no_vivenjuntos="<strong>x</strong>";
                        }

                    }
                    
                ?>
                <table class="table table-bordered table-striped table-sm">
                    <tr>
                        <td>FECHA: <?php echo $dma_fechamatrimonio; ?></td>
                        <td colspan="2">CAT&Oacute;LICO: <?php echo $catolico; ?>   CIVIL: <?php echo $civil; ?>    OTRO: <?php echo $otro; ?>     ¿CUAL? <?php echo $cual; ?> </td>
                    </tr>
                    <tr>
                        <td colspan="3">¿VIVEN JUNTOS?   SI: <?php echo $si_vivenjuntos; ?>     NO: <?php echo $no_vivenjuntos; ?> </td>
                    </tr>
                </table>
            </div>
        </div>

        <!--DATOS RECOMENDACION DEL COLEGIO-->
        <div class="row">
            <div class="col-sm-12">
                <h5 style="color: #0c438f;"><strong>¿QUIEN LE RECOMEND&Oacute; EL COLEGIO? </strong></h5>
                <hr style="border: 2px solid red; ">
                <?php 
                    $datos_recomendacion=$objRsInscripcion->datos_recomendacion($personaSistema, $calendario_apertura);

                    if($datos_recomendacion){
                        foreach($datos_recomendacion as $data_datos_recomendacion){
                            $rec_codigo=$data_datos_recomendacion['rec_codigo'];
                            $rec_nombre=$data_datos_recomendacion['rec_nombre'];
                            $rec_telefono=$data_datos_recomendacion['rec_telefono'];
                            $rec_celular=$data_datos_recomendacion['rec_celular'];
                            $rec_motivoeleccion=$data_datos_recomendacion['rec_motivoeleccion'];
                        }

                    }
                    
                ?>
                <table class="table table-bordered table-striped table-sm">
                    <tr>
                        <td colspan="2">NOMBRE Y APELLIDOS COMPLETOS: <?php echo $rec_nombre; ?></td>
                        
                    </tr>
                    <tr>
                        <td>TEL&Eacute;FONO RESIDENCIA: <?php echo $rec_telefono; ?></td>
                        <td>N° DE CELULAR: <?php echo $rec_celular; ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <!--DATOS DE ELECCION-->

        <div class="row">
            <div class="col-sm-12">
                <h5 style="color: #0c438f;"><strong>¿POR QU&Eacute; ELIGI&Oacute; AL GIMNASIO AMERICANO ABC? </strong></h5>
                <hr style="border: 2px solid red; ">
                
                <table class="table table-bordered table-striped table-sm">
                    <tr>
                        <td><?php echo $rec_motivoeleccion; ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">&nbsp;</div>
        </div>

        <div class="row">
            <div class="col-sm-12">&nbsp;</div>
        </div>
    </div>
</div>					
<script src="vjs/inscripcion/finalizarInscripcion.js"></script>
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



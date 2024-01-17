<?php
include('classPrsna.php');
class RgsrtoNnio  extends Persona{

    private $insertNinio;
    private $insertDatosBasicos;
    private $codigoPersona;
    private $codigoDatosBasicos;
    private $codigoEstadoNinio;
    private $use_codigo;
    private $aleatoreo;


    public function __construct(){
        $this->cnxion = Dtbs::getInstance();
        $this->codigoPersona=date('YmdHis').rand(99,999);
        $this->codigoDatosBasicos=date('YmdHis').rand(99,999);
        $this->aleatoreo=date('YmdHis').rand(99,999);
        $this->use_codigo=date('YmdHis').rand(99,999);
        $this->ptp_codigo=date('YmdHis').rand(99,999);
        $this->codigoEstadoNinio=date('YmdHis').rand(99,999);
    }

    function passwrd($paswd){
        $string=$paswd;
        $largo = strlen($paswd);
        $final_array = array();
        for($i = 0; $i < $largo; $i++)  {
           $caracter = $string[$i];
           array_push($final_array,$caracter);
        }
    
    
    
        for($arr=$largo; $arr >= 0; $arr--){
           $clave.=$final_array[$arr];
        }
    
        $pass=md5($clave);
        return $pass;
    }

    public function insertNinio(){

        $fechaNace=$this->getFechaNacimientoPersona();
        if($fechaNace){
            $columnaNacimiento=", per_fechanacimiento";
            $valorColumnaNacimiento=", '$fechaNace'";
        }

        $insertNinio="INSERT INTO principal.persona(
                                    per_codigo, per_nombre, per_primerapellido, 
                                    per_segundoapellido, per_personacreo, per_personamodifico, 
                                    per_fechacreo, per_fechamodifico, per_genero, 
                                    per_tipoidentificacion, per_identificacion, per_estado, 
                                    per_segundonombre, per_municipionacimiento, 
                                    per_aleatoreo $columnaNacimiento)
                            VALUES (".$this->codigoPersona.", '".$this->getNombrePersona()."', '".$this->getPrimerapellidoPersona()."',
                                    '".$this->getSegundoApellidoPersona()."', '".$this->getPersonaSistema()."', '".$this->getPersonaSistema()."',
                                    NOW(), NOW(), '".$this->getGeneroPersona()."',
                                    ".$this->getTipoIdentificacionPersona().", '".$this->getNumeroIdentificacionPersona()."', '".$this->getEstadoPersona()."',
                                    '".$this->getSegundoNombrePersona()."', ".$this->getMunicipioNacimientoPersona().",
                                    ".$this->aleatoreo." $valorColumnaNacimiento);";

        $this->cnxion->ejecutar($insertNinio);

        $insertDatosBasicos="INSERT INTO principal.datos_basicos(
                                        dba_codigo, dba_persona, 
                                        dba_rh, dba_direccion,
                                        dba_municipioresidencia, dba_correo, dba_telefono,
                                        dba_celular, dba_estado, dba_fechacreo,
                                        dba_fechamodifico, dba_personacreo, dba_personamodifico,
                                        dba_lugarexpedicion, dba_eps, dba_sisben, dba_actualizacion, dba_estrato)
                                VALUES (".$this->codigoDatosBasicos.",".$this->codigoPersona.", 
                                        ".$this->getRhPersona().", '".$this->getDireccionPersona()."',
                                        ".$this->getMunicipioResidenciaPersona().", '".$this->getCorreoPersona()."', '".$this->getTelefonoPersona()."',
                                        ".$this->getCelularPersona().", 1, NOW(),
                                        NOW(), ".$this->getPersonaSistema().", ".$this->getPersonaSistema().",
                                        '".$this->getLugarExpedicionPersona()."', ".$this->getEpsPersona().",
                                        ".$this->getSisbenPersona().", 0, '".$this->getEstratoPersona()."');";

        $this->cnxion->ejecutar($insertDatosBasicos);


        $psswd=$this->getNumeroIdentificacionPersona();

        $clavePersona=sha1($psswd);

        $claveInsertar=$this->passwrd($clavePersona);


        $insertUser="INSERT INTO principal.usepersona(
                                 use_codigo, per_codigo, use_pswd, 
                                 use_estado, use_fechacreo, use_alias)
                          VALUES (".$this->use_codigo.", ".$this->codigoPersona.", '".$claveInsertar."',
                                  '1', NOW(), '".$this->getNumeroIdentificacionPersona()."');";
                                
        $this->cnxion->ejecutar($insertUser);

        $inserttpPer="INSERT INTO principal.persona_tipopersona(
                                  ptp_codigo, ptp_tipopersona, ptp_persona, 
                                  ptp_estado, ptp_fechacreo, ptp_fechamodifico, 
                                  ptp_personacreo, ptp_personamodifico)
                         VALUES (".$this->ptp_codigo.", ".$this->getPerfil().", ".$this->codigoPersona.",
                                 1, NOW(), NOW(),
                                 ".$this->getPersonaSistema().", ".$this->getPersonaSistema().");";
           
        $this->cnxion->ejecutar($inserttpPer);

        $inisertEstadoNinio="INSERT INTO principal.estado_ninio(
                                        eni_codigo, eni_ninio, eni_estado,
                                        eni_fechacreo, eni_fechamodifico,
                                        eni_personacreo, eni_personamodifico,
                                        eni_estadoproceso)
                                VALUES (".$this->codigoEstadoNinio.", ".$this->codigoPersona.", 1, 
                                        NOW(), NOW(), 
                                        ".$this->getPersonaSistema().", ".$this->getPersonaSistema().",
                                        0);";

        $this->cnxion->ejecutar($inisertEstadoNinio);


        return $insertNinio." <br><br> ".$insertDatosBasicos." <br><br> ".$insertUser." <br><br> ".$inisertEstadoNinio;

    }
}
?>

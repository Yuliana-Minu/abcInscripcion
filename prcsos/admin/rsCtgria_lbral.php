<?php
include('classCtgriaLbral.php');
class RsCtgriaLbral extends CategoriaLaboral{

    public function selectCategoriaLaboral(){

        $sql_selectCategoriaLaboral="SELECT cla_codigo, cla_nombre, cla_estado
                                       FROM administrador.categoria_laboral;";

        $query_selectCategoriaLaboral=$this->cnxion->ejecutar($sql_selectCategoriaLaboral);

        while($data_selectCategoriaLaboral=$this->cnxion->obtener_filas($query_selectCategoriaLaboral)){
            $dataselectCategoriaLaboral[]=$data_selectCategoriaLaboral;
        }
        return $dataselectCategoriaLaboral;
    }

    public function selectCategoriaLaboralForm(){

        $sql_selectCategoriaLaboralForm="SELECT cla_codigo, cla_nombre, cla_estado
                                           FROM administrador.categoria_laboral
                                          WHERE cla_codigo=".$this->getCodigoCategoriaLaboral().";";

        $query_selectCategoriaLaboralForm=$this->cnxion->ejecutar($sql_selectCategoriaLaboralForm);

        while($data_selectCategoriaLaboralForm=$this->cnxion->obtener_filas($query_selectCategoriaLaboralForm)){
            $dataselectCategoriaLaboralForm[]=$data_selectCategoriaLaboralForm;
        }
        return $dataselectCategoriaLaboralForm;
    }

    public function dataCategoriaLaboral(){
        $rs_categoriaLaboral=$this->selectCategoriaLaboral();
        foreach ($rs_categoriaLaboral as $dataCategoriaLaboral) {
            $cla_codigo=$dataCategoriaLaboral['cla_codigo'];
            $cla_nombre=$dataCategoriaLaboral['cla_nombre'];
            $cla_estado=$dataCategoriaLaboral['cla_estado'];

            if($cla_estado==1){
                $estado="Activo";
            }
            if($cla_estado==0){
                $estado="Inactivo";
            }

            $rsCategoriaLaboral[] = array('cla_codigo'=> $cla_codigo,
                                 'cla_nombre'=> $cla_nombre,
                                 'estado'=> $estado
                               );
        }
        $datCategoriaLaboralJson=json_encode(array("data"=>$rsCategoriaLaboral));
        return $datCategoriaLaboralJson;
    }
}
?>
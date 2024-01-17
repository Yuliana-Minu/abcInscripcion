<?php
    class CategoriaLaboral{
        private $codigoCategoriaLaboral;
        private $nombreCategoriaLaboral;
        private $estadoCategoriaLaboral;
        private $personaSistemaCategoriaLaboral;

        public function CategoriaLaboral(){}

        public function getCodigoCategoriaLaboral(){
            return $this->codigoCategoriaLaboral;
        }
        public function setCodigoCategoriaLaboral($codigoCategoriaLaboral){
            $this->codigoCategoriaLaboral=$codigoCategoriaLaboral;
        }

        public function getNombreCategoriaLaboral(){
            return $this->nombreCategoriaLaboral;
        }
        public function setNombreCategoriaLaboral($nombreCategoriaLaboral){
            $this->nombreCategoriaLaboral=$nombreCategoriaLaboral;
        }

        public function getEstadoCategoriaLaboral(){
            return $this->estadoCategoriaLaboral;
        }
        public function setEstadoCategoriaLaboral($estadoCategoriaLaboral){
            $this->estadoCategoriaLaboral=$estadoCategoriaLaboral;
        }

        public function getPersonaSistemaCategoriaLaboral(){
            return $this->personaSistemaCategoriaLaboral;
        }
        public function setPersonaSistemaCategoriaLaboral($personaSistemaCategoriaLaboral){
            $this->personaSistemaCategoriaLaboral=$personaSistemaCategoriaLaboral;
        }
    }
?>

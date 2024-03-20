<?php
    class Conectar{

        protected $dbh;

        protected function Conexion(){
            try{
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=sistema_blog","root","");
                return $conectar;
            }catch(Exception $e){
                print "¡Error BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        public function set_names(){
			return $this->dbh->query("SET NAMES 'utf8'");
        }

        public function ruta(){
            //Local
            return "http://localhost/SISTEMA/";
            //Produccion
            //return "http://www.tudominio.com/";
        }

    }
?>
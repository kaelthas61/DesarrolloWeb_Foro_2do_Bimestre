<?php

    //CREACIÓN DE LA CLASE CONECT
    class conect {

        //PROPIEDADES NECESARIAS PARA LA CONEXIÓN
        private $DBNAME;
        private $DBUSER;
        private $DBHOST;
        private $DBPASS;

        //PROPIEDADES PARA CONTROLAR LA CONEXIÓN
        private $Conexion;
        private $Consulta;

        //CONSTRUCTOR
        public function _conect(){
            $this->DBNAME = "";
            $this->DBUSER = "";
            $this->DBHOST = "";
            $this->DBPASS = "";
            $this->Conexion = 0;
            $this->Consulta = 0;
        }

        //GETTERS AND SETTERS
        public function setDbname($_dbname){
            $this->DBNAME = $_dbname;
        }

        public function setDbuser($_dbuser){
            $this->DBUSER = $_dbuser;
        }

        public function setDbpass($_dbpass){
            $this->DBPASS = $_dbpass;
        }

        public function setDbhost($_dbhost){
            $this->DBHOST = $_dbhost;
        }

        public function getDbname(){
            return $this->DBNAME;
        }

        public function getDbhost(){
            return $this->DBHOST;
        }

        public function getDbuser(){
            return $this->DBUSER;
        }

        public function getDbpass(){
            return $this->DBPASS;
        }

        public function getConsulta(){
            return $this->Consulta;
        }

        //FUNCIONES ADICIONALES PARA LA CONEXIÓN Y CONSULTA
        public function conectar (){

            try{
                //ESBLECEMOS LA CONEXIÒN
                $this->Conexion = new mysqli($this->DBHOST,$this->DBUSER,$this->DBPASS,$this->DBNAME);

                //VERIFICAMOS LA CONEXIÓN
                if($this->Conexion->connect_errno){
                    die ("Conexión fallida" . $this->Conexion->connect_errno);
                }else{
                    echo "Conectado";
                }
            } catch (Exception $e){ //capta y detalla el error al iniciar la conexión
                die ("Error de conexión: ".$e->getMessage());
            }
        }

        public function consulta($sql){
            try {
                //VERIFICACIÓN DE QUE HAYA UNA PETICIÓN
                if($sql==""){
                    return "No hay ninguna sentencia sql";
                } else {

                    
                    $this->Consulta = $this->Conexion->query($sql); //realiza la consulta

                    //EN CASO DE HABER UNA CONSULTA, VALIDÁ SI HAY LA INFORMACIÓN
                    if ($this->Consulta === false){
                        die ("Error en la consulta: " . $this->Conexion->error);
                    } else {

                        //PRESENTACIÓN DE LA INFORMACIÓN DESPUES DE LA CONSULTA
                        echo '<table>';
                        $columna = $this->Consulta->fetch_assoc(); //obtiene el nombre de la columna
                        echo '<tr>';
                        foreach ($columna as $nombreColumna => $valor){ 
                            echo '<th>' . $nombreColumna . '</th>'; //muestra el nombre de la columna
                        }
                        echo '</tr>';

                        while ($fila = $this->Consulta->fetch_assoc()){ //obtine los valores
                            echo '<tr>';
                            foreach ($fila as $valor){
                                echo '<td>' . $valor . '</td>'; //muestra los valores
                            }
                            echo '</tr>';
                        }
                        echo '</table>';
                    }
                }
            } catch (Exception $e){ //capta y detalla el error en la cosulta
                die ("Error de consulta: " . $e->getMessage());
            }
        }

    }

?>

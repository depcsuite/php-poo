<?php

class Archivo{
    protected $nombre;
    protected $aDatos;

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
        return $this;
    }

    public function imprimir(){
        print_r($this->aDatos);
        //Mostrar en pantalla una tabla con los datos del array aDatos


    }
}

class Json extends Archivo{
    private $strJson;

    public function importarDesdeArchivo($nombreArchivo){
        //Solo si el archivo existe vamos a:

            //Leer un archivo del tipo json
            $this->strJson = file_get_contents($nombreArchivo);
            //Almacenar los datos a aDatos
            $this->aDatos = json_decode($this->strJson);
        //Sino
            //Mostrar un mensaje "El archivo no existe."
    }

    public function exportarToArchivo($nombreArchivo){
        //Convertir el array de datos a json

        //Almacenar el json en un archivo


    }
}

class Csv extends Archivo{

    private $strCsv;

    public function importarDesdeArchivo($nombreArchivo){
        //Solo si el archivo existe vamos a:

            //Leer un archivo del tipo csv
            $this->strCsv= file_get_contents($nombreArchivo);

            //Almacenar los datos en aDatos (pasar de un formato string csv a un array)


        //Sino
            //Mostrar un mensaje "El archivo no existe."
    }

    public function exportarToArchivo($nombreArchivo){
        //Convertir el array de datos a csv

        //Almacenar el strCsv en un archivo

    }
}

//Programa
$obj1 = new Json();
$obj1->importarDesdeArchivo("clientes.txt");
$obj1->imprimir();



?>
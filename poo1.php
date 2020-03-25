<?php
//Definicion
class Persona{
    //Propiedades
    protected $documento;
    protected $nombre;
    protected $edad;
    protected $nacionalidad;

    const NAC_ARG = "Argentina";
    const NAC_BRA = "Brasilera";
    const NAC_FRA = "Francesa";

    public function __construct(){
        $this->nacionalidad = self::NAC_ARG;
    }

    public function setDocumento($doc){ $this->documento = $doc; }
    public function getDocumento(){ return $this->documento; }

    public function setNombre($nom){ $this->nombre = $nom; }
    public function getNombre(){ return $this->nombre; }
    
    public function setNacionalidad($nac){ $this->nacionalidad = $nac; }
    public function getNacionalidad(){ return $this->nacionalidad; }

    public function setEdad($edad){ $this->edad = $edad; }
    public function getEdad(){ return $this->edad; }

}

class Docente{
    //Propiedades
    private $especialidad;
    const ESPECILIADAD_WP = "Wordpress";
    const ESPECILIADAD_ECO = "Economía aplicada";
    const ESPECILIADAD_BBDD = "Base de datos";
    const ESPECILIADAD_FS = "Programador Full Stack";

    
    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
        return $this;
    }

    //Métodos o funciones
    public function imprimir(){
        echo "Especialidad: " . $this->especialidad . "<br>";
    }

    public function imprimirEspecialidadesHabilitadas(){
        echo self::ESPECILIADAD_WP . "<br>";
        echo self::ESPECILIADAD_ECO . "<br>";
        echo self::ESPECILIADAD_BBDD . "<br>";
        echo self::ESPECILIADAD_FS . "<br>";
    }
}

class Alumno extends Persona{ /* Alumno es una persona */
    //Propiedades
    private $legajo;
    private $nota_portfolio;
    private $nota_php;
    private $nota_proyecto;
    private $promedio;

    //Métodos o funciones
    public function __construct(){
	    $this->nota_portfolio = 0.0;
	    $this->nota_php = 0.0;
        $this->nota_proyecto = 0.0;
        $this->nacionalidad = self::NAC_ARG;
    }

    public function __destruct() {
       print "Destruyendo el objeto " . $this->nombre . "<br>";
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
        return $this;
    }

    public function imprimir(){
        echo "Nombre: " . $this->nombre;
        echo "Legajo: " . $this->legajo;
        echo "Nacionalidad: " . $this->nacionalidad;
        echo "<br>Edad: " . $this->edad;
        echo "<br>Nota Portfolio: " . $this->nota_portfolio;
        echo "<br>Nota PHP: " . $this->nota_php;
        echo "<br>Nota Laravel: " . $this->nota_proyecto;
        echo "<br>Promedio: " . $this->promedio;
        echo "<br><br>";
    }

    public function calcularPromedio(){
        $resultado = ($this->nota_portfolio + $this->nota_php + $this->nota_proyecto)/3;
        $this->promedio = round($resultado, 2);
        return true;
    }
}

$alumno1 = new Alumno();
$alumno1->setNombre("Ivan");
echo $alumno1->getNombre() . "<br>";

$alumno1->setNacionalidad(Persona::NAC_FRA);
$alumno1->edad = 24;
$alumno1->nota_php = 7;
$alumno1->calcularPromedio();
$alumno1->imprimir();

$alumno2 = new Alumno();
$alumno2->nombre = "Horacio";
$alumno2->nota_php = 8;
$alumno2->imprimir();

$alumno3 = new Alumno();
$alumno3->nombre = "Angelica";
$alumno3->nota_php = 9;
$alumno3->imprimir();

$docente = new Docente();
$docente->nombre = "Nelson";
$docente->especialidad = Docente::ESPECILIADAD_FS;
$docente->imprimir();
$docente->imprimirEspecialidadesHabilitadas();


?>
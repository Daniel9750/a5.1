<?php

// Definición de la clase 'animal':
class Animal {
    // Propiedad pública con valor por defecto
    public $nombre = "animal";

    // Propiedad protegida
    protected $edad;

    // Propiedad privada
    private $color;

    // Constante
    const HABITAT = "Tierra";

    // Constructor con valores por defecto
    public function __construct($nombre = "animal", $edad = 0, $color = "Negro") {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->color = $color;
    }

    // Método público con definición de tipo en el parámetro
    public function hacerSonido(string $sonido): void {
        echo $sonido . "<br>";
    }

    // Método protegido
    protected function imprimirEdad(): void {
        echo "Edad: " . $this->edad . " años<br>";
    }

    // Método privado
    private function mostrarColor(): void {
        echo "Color: " . $this->color . "<br>";
    }

    // Método destructor
    public function __destruct() {
        echo "Destruyendo el objeto " . get_class($this) . "<br>";
    }

    // Método estático
    public static function habitatInfo(): void {
        echo "El hábitat común es: " . self::HABITAT . "<br>";
    }
}

// Clase 'gato' que es derivada/heredada de la clase 'animal':
class Gato extends Animal {
    
    // Método público que accede al método protegido de la clase 'animal':
    public function mostrarEdad() {
        $this->imprimirEdad();
    }

    // Método sobrecargado:
    public function hacerSonido(string $sonido = "Miau :3"): void {
        parent::hacerSonido($sonido);
    }
}

// Creación de objetos, tanto de la clase 'animal', como de la clase 'gato':
$animal = new Animal("Animal1", 5, "Marrón");
$gato = new Gato("Garfield", 3, "Naranja");

// Se muestran las propiedades y métodos:
echo "Nombre del animal: " . $animal->nombre . "<br>";
$animal->hacerSonido("¡Rugido!");

echo "Nombre del gato: " . $gato->nombre . "<br>";

// Se llama al método 'hacerSonido()' con el valor por defecto:
$gato->hacerSonido(); 

// Se llama al método protegido a través de un método público:
$gato->mostrarEdad();


// Se muestra la constante 'Hábitat':
echo "Habitat del animal: " . Animal::HABITAT . "<br>";


/* 
Llamada al método estático (muestra lo mismo que la constante, puedes comentar 
la constante y descomentar este método para comprobar que muestra lo mismo)
*/

// Animal::habitatInfo();


/* 
Puedes intentar acceder al método privado desde fuera de la clase, 
pero evidentemente no se puede y generará un error:
*/

// Puedes descomentarlo y probarlo:

// $animal->mostrarColor();



// No hace falta llamar al destructor, ya que al finalizar el script ya se destruiran los objetos:


// Si descomentas estas dos líneas, verás dos veces el mensaje 'Destruyendo el objeto (objeto)':

// $animal->__destruct();
// $gato->__destruct();

?>

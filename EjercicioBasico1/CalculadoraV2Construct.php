<?php
    class CalculadoraV2 {
        private $a;
        private $b;

        public function __construct($a,$b){
            $this->$a = $a;
            $this->$b = $b;
        }

        public function sumar($a, $b) {
            return $a + $b;
        }
        
        public function restar($a, $b) {
            $this->ordenar($a,$b);
            return $a - $b;
        }
        
        public function multiplicar($a, $b) {
            return $a * $b;
        }
        
        public function dividir($a, $b) {
            $this->ordenar($a,$b);
            return $a / $b;
        }
        
        private function ordenar(&$a,&$b){
            if($b>=$a)
            {
                $aux = $a; 
                $a = $b;
                $b = $aux;
            }
        }
    }
?>
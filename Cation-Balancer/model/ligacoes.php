<?php
//classe utilizada para validar a quantidade de ligações dos atomos
class validadorAtomo{
    private $atomos = array(
        "H" => 1,
        "O" => 2,
        "N" => 3,
        "C" => 4,
        "Fe" => 6,
        "Al" => 3,
        "S" => 2,
        "P" => 5
    );
    public function validarAtomo($atomo){
        if(array_key_exists($atomo, $this->atomos)){
            return $this->atomos[$atomo];
        }
        //fiz uma validação para evitar erros, pois nao consegui corrigir na pagina de play
        if($atomo == "e"){
            return $this->atomos["Fe"];
        }
        if($atomo == "l"){
            return $this->atomos["Al"];
        }
    }
    public function validarLigacoes($resLigacoes){
        $aux = array_count_values($resLigacoes);
        return count($aux) === 1;   
    }
}
?>
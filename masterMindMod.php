<?php
//require 'IMastermind.php';
class Mastermind implements IMastermind{
    public $taille;//nombre de chiffres à deviner
    public $code;
    public $essais = 0;
    public $historique = [];
    
    public function __construct($t){
        $this->taille = $t;

        $this->code = strval(rand(0,10**($this -> taille) -1));
        while(strlen($this->code)<$this->taille){
            $this->code= "0".$this->code;
        }
    }

    public function getCode(){
        return $this->code;
    }

    public function getTaille(){
        return $this->taille;
    }

    public function getEssais(){
        return $this->essais;
    }

    public function getHistorique(){
        return $this->historique;
    }

    public function test($try){
            
            $bienPlace = 0;
            $malPlace = 0;
            $codeCopie = $this->code;
                    
            for($i = 0;$i < $this->taille;$i ++){
                        
                if($try[$i] == $codeCopie[$i]){
                    $bienPlace += 1;
                    $codeCopie[$i] = "#";
                    
                    // if($bienPlace == $taille){
                        
                    //     echo "c'est gagné";
                    //     return 1;
                    // }

                }else if(str_contains($try,$codeCopie[$i])){
                    $malPlace += 1;
                }
               
            }
            
            $this->essais += 1;
            array_push($this->historique,array($this->essais,$try,$bienPlace,$malPlace));

            return [$bienPlace,$malPlace];
        }

//     if(!empty($_GET)){
//         $codeCopie = $_SESSION["code"];
//         $bienPlace = 0;
//         $malPlace = 0;
        
//         for($i = 0;$i < $taille;$i ++){
            
//             if($_GET["propal$i"] == $codeCopie[$i]){
//                 $bienPlace += 1;
//                 $codeCopie[$i] = "#";
//             }else if(str_contains($codeCopie,$_GET["propal$i"])){
//                 $malPlace += 1;
//             }

//             if($bienPlace == $taille){
//                 var_dump($bienPlace);
//                 var_dump($malPlace);
//                 echo "c'est gagné";
//                 $_SESSION = [];
//             }
//             //var_dump($_GET["propal$i"]);
//             var_dump($codeCopie[$i]);
//         }
//         var_dump($bienPlace);
//         var_dump($malPlace);
//     }



//     var_dump($_SESSION["code"]);
// }

}

?>
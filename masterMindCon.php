<?php
ini_set("display_errors","1");
error_reporting(E_ALL);

require 'IMastermind.php';
require 'masterMindMod.php';
session_start();

$taille = 4;
if(empty($_SESSION["master"])){
    $jeu = new Mastermind($taille);
    var_dump(1);
}else{
    $jeu = $_SESSION["master"];
}

var_dump($jeu->getCode());

if(!empty($_GET)){
    
    //var_dump($_SESSION["master"]);
    if(!empty($_GET["reset"])){
        
        unset($jeu);
        $_SESSION = array();//on reset la session
    }else{
        $try = "";
    
        for($i = 0;$i<$taille;$i++){
            $try= $try.$_GET["propal$i"];
        }
        
        $res = $jeu->test($try);
        $histo = $jeu->getHistorique();

        //var_dump($histo);
        foreach($histo as $ess){//on parcours l'historique des essaies
            echo "<tr>";
            //var_dump($ess);
            foreach($ess as $i){
                echo "<td>".$i."</td>";
            }
            echo "</tr>";
        }

        if($res[0] == $taille){
            echo "c'est gagné";
            $_SESSION = [];

        }
    }
    
    
}

$_SESSION["master"] = $jeu;

?>
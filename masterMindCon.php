<?php
ini_set("display_errors","1");
error_reporting(E_ALL);

require 'IMastermind.php';
require 'masterMindMod.php';
session_start();


function affpropal($t){
    for($i=0;$i<$t;$i++){
        $v = '0';
        if(!empty($_GET["propal$i"])){
            $v = $_GET["propal$i"];
        }
        echo "<input type = 'number' name = 'propal$i' min = '0' max = '9' step = '1' value = $v required>";
    }
}

function affhisto($histo){
    foreach($histo as $ess){//on parcours l'historique des essaies
        echo "<tr>";
        //var_dump($ess);
        foreach($ess as $i){
            echo "<td>".$i."</td>";
        }
        echo "</tr>";
    }
}

function newGame($t){
    if(empty($_SESSION["master"])){
        $game = new Mastermind($t);
    }else{
        $game = $_SESSION["master"];
    }
    return $game;
}


$taille = 4;
$victoire = false;

$jeu = newGame($taille);

var_dump($jeu->getCode());



if(!empty($_GET)){
    
    //var_dump($_SESSION["master"]);
    if(!empty($_GET["reset"])){
        unset($jeu);
        $_SESSION = array();//on reset la session
    }else{
        $try = "";

        //$_SESSION["previousTry"] =[];
        for($i = 0;$i<$taille;$i++){
            $try= $try.$_GET["propal$i"];//concatenation
            //array_push($_SESSION["previousTry"],$_GET["propal$i"]);
        }
        
        $res = $jeu->test($try);//on lance le jeu avec les données rentréees par le joueur

        if($res[0] == $taille){
            echo "c'est gagné";
            $victoire = true;
            unset($jeu);
            $_SESSION = array();//on reset la session

        }
    }
    
    
}
if(isset($jeu)){
    $_SESSION["master"] = $jeu;
}



?>
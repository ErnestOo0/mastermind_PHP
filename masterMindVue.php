<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MasterMind le jeu</title>
    <?php require "masterMindCon.php"; ?>
</head>
<body>
    <h1>MASTERMIND</h1>
    <div>
        Veuillez saisir successivement des combinaisons de 4 chiffres jusqu'à la victoire
    </div>
    <table>
        <tr>
            <th>Tentatives</th>
            <th>propositon</th>
            <th>Bien placés</th>
            <th>Mal placés</th>
        </tr>
    
    <?php 
        if(isset($jeu)){
            affhisto($jeu->getHistorique());
        }
        
    ?>
    
    </table>

    <form method = "get">
        
        <?php
            affpropal($taille)
        ?>
        
        <input type ="submit">
    <form>
    
    <form>
        <input type="submit" name="reset" value="reset">
    <form>

        
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MasterMind le jeu</title>
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
        require "masterMindCon.php";
    ?>
    
    </table>

    <form method = "get">
        
        <?php
            for($i=0;$i<4;$i++){
                echo "<input type = 'number' name = 'propal$i' min = '0' max = '9' step = '1' value = '0' required>";
            }
        ?>
        
        <input type ="submit">
    <form>
    
    <form>
        <input type="submit" name="reset" value="true">
    <form>

        
</body>
</html>
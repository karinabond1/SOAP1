<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task1</title>
</head>
<body>
    <?php
    echo "SOAP<br>";
    echo "<b>Code and Countries without parametr</b><br>";
    foreach($result as $value){        
        echo "Code: ".$value->sCode." Name: ".$value->sName."<br>";
    }
    echo "<b>Code Phone with parameter</b><br>";  
    echo "Code: ".$resultPar."<br>";

    echo "<br>cURL<br>";
    echo "<b>Code and Countries without parametr</b><br>";
    foreach($resultCURL as $value){        
        echo "Code: ".$value->msCode." Name: ".$value->msName."<br>";
    }

    echo "<b>Code Phone with parameter</b><br>";  
    echo "Code: ".$resultCURLPar."<br>";

    ?>
</body>
</html>
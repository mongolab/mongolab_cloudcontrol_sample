<html>
<head>
<title>MongoLab + Cloud Control</title>
</head>
<body>
<h1>CloudControlled MongoDB from MongoLab!</h1>

<p>Hello World...</p>

<?php
   
    $credfile = file_get_contents($_ENV["CRED_FILE"], false);
    $credentials = json_decode($credfile, true);
    $uri = $credentials["MONGOLAB"]["MONGOLAB_URI"];

    $dbname = substr($uri, strrpos($uri, "/")+1);

    $m = new Mongo($uri);
    $db = $m->selectDB($dbname);
    $col = new MongoCollection($db, "cloudcontrolled");
    $cursor = $col->find();

    foreach ($cursor as $doc) {
        echo json_encode($doc);
        echo "</br>";
    }

?>


</body>
</html>

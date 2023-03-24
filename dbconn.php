<?php
    require_once 'vendor/autoload.php';

    use Exception;
    use MongoDB\Client;
    $host = "mongodb://172.18.0.3";
    $port = "27017";
    $uri = "${host}:${port}/?compressors=disabled&gssapiServiceName=mongodb";
    $dbname = "php";

    try{
        $client = new MongoDB\Client($uri);
        $db = $client->selectDatabase($dbname);
    }
    catch(Exception $e)
    {
        echo $e;
    }

    // $query = new MongoDB\Driver\Query([]);

    // $result = $connection->executeQuery("$dbname.$collection", $query);

    // foreach ($result as $document) {
    //     var_dump($document);
    // }
?>
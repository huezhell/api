<?php
use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/rooms', function (Request $request, Response $respone) {
    $db = $this->db;
    try{
    $statement = $db->prepare("SELECT * FROM dldshop.room");
    $statement->execute();
    $results = $statement->fetchAll();
    echo json_encode($results);
    }catch (PDOException $e){
    echo var_dump($e);
    }
});

$app->post('/rooms/new', function (Request $request, Response $respone) {
    $data = $request->getParsedBody();
    $roomName = $data['roomName'];

    $db = $this->db;
    $statement = $db->prepare('INSERT INTO dldshop.room(name) VALUES(:roomName)');
    $statement->execute(array(':roomName' => $roomName));

    if ($statement->rowCount() > 0) {
        $result = (object) array(
            "message" => "Insert success",
            "insert_status" => 1
        );

        echo json_encode($result);
    } else {
        $result = (object) array(
            "message" => "Insert nothing",
            "insert_status" => 0
        );
        echo json_encode($result);
    }
});

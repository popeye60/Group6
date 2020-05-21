<?php
error_reporting(0);
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require './api/vendor/autoload.php';

$config = [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        // Database connection settings
        "db" => [
            "host" => "127.0.0.1",
            "dbname" => "hermes",
            "user" => "root",
            "pass" => ""
        ],
    ],
];

$app = new \Slim\App ($config);

// DIC configuration
$container = $app->getContainer();

// PDO database library 
$container ['db'] = function ($c) {
    $settings = $c->get('settings')['db'];
    $pdo = new PDO("mysql:host=" . $settings['host'] . ";dbname=" . $settings['dbname'],
        $settings['user'], $settings['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

$app->get('/login/{user}/{password}', function (Request $request, Response $response, array $args) {
    session_start();
    $user = $args['user'];
    $pass = $args["password"];
    $sql="SELECT * FROM users
                  WHERE  username='".$user."' 
                  AND  password='".$pass."' ";
    $sth = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    return $this->response->withJson($sth);
});
$app->post('/updateRoom/{bl_id}/{old_room}/{new_room}', function (Request $request, Response $response, array $args) {
    $bl_id = $args['bl_id'];
    $old_room = $args['old_room'];
    $new_room = $args['new_room'];
    $sql = "UPDATE rooms SET room_status = '1' WHERE room_name = '$old_room'";
    $this->db->query($sql);
    $sql2 = "UPDATE book_log SET bl_room = $new_room where bl_id = $bl_id";
    $this->db->query($sql2);
    $sql3 = "UPDATE rooms SET room_status = '2' WHERE room_id = '$new_room'";
    $this->db->query($sql3);
});

$app->run();

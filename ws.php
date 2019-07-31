<?php
require_once 'vendor/autoload.php';
require_once 'Canvas.php';
use Ratchet\WebSocket\WsServer;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;

$pdo = new PDO('mysql:host=68.183.131.91;dbname=canvas','root','W1234567890d1998');

$ws = new WsServer(new Canvas($pdo));
// Make sure you're running this as root
$server = IoServer::factory(new HttpServer($ws), 4000);
$server->run();
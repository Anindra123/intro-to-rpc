<?php
require dirname(__FILE__).'/../vendor/autoload.php';
$client = new PingPong\PingPongClient("localhost:50051",[
    'credentials' => Grpc\ChannelCredentials::createInsecure(),
]);

function getMessage(){
    global $client;

    echo "Sending ping message \n";
    $message = new PingPong\Ping();


    $message->setPingMessage("ping");

    list($pong,$status) = $client->SendPingMessage($message)->wait();
    
    echo "Response " .trim($pong->getPongMessage())."\n";
    return;
    
}


function main(){
    getMessage();
}

main();
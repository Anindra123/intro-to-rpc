<?php
require dirname(__FILE__) . '/../vendor/autoload.php';



$client = new PingPong\PingPongClient("localhost:40000", ['credentials' => null]);

function sendPingMessage($message)
{
    global $client;

    echo "Sending message " . $message . "\n";
    $ping = new PingPong\Ping();


    $ping->setPingMessage($message);

    list($pong, $status) = $client->SendPingMessage($ping)->wait();


    return $pong;
}

function fooBar($message)
{
    global $client;

    echo "Sending message " . $message . "\n";

    $foo = new PingPong\Foo();

    $foo->setFooMessage($message);

    list($bar, $status) = $client->SendFooMessage($foo)->wait();

    return $bar;
}


function main($message)
{
    if ($message === "ping") {
        echo "Server replied " . sendPingMessage($message)->getPongMessage() . "\n";
        return;
    }

    if ($message === "foo") {
        echo "Server replied " . trim(fooBar($message)->getBarMessage()) . "\n";
        return;
    }

    echo "Server replied " . trim(sendPingMessage($message)->getPongMessage()) . "\n";
    return;
}

$user_message = $argv[1];
main($user_message);

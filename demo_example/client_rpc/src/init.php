<?php
require dirname(__FILE__) . '/../vendor/autoload.php';


/*
this sets up the rpc client
here the generated code is called to create the client
and perform the rpc calls

credentials are set to null so that we can
bypass the rpc security features and make the call
*/
$client = new PingPong\PingPongClient("localhost:40000", ['credentials' => null]);

function sendPingMessage($message)
{
    global $client;

    echo "Sending message " . $message . "\n";
    $ping = new PingPong\Ping(); // Ping message defined in proto file for sending Ping message


    $ping->setPingMessage($message);

    // unary rpc call with the Ping message as parameter
    // we wait for the server the send a response
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
        // obtained response is a Pong message defined in the proto file
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

<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Pingpong;

/**
 */
class PingPongClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Pingpong\Ping $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SendPingMessage(\Pingpong\Ping $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/pingpong.PingPong/SendPingMessage',
        $argument,
        ['\Pingpong\Pong', 'decode'],
        $metadata, $options);
    }

}

<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Todo;

/**
 */
class TodoClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Todo\TodoItem $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateTodo(\Todo\TodoItem $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/Todo.Todo/CreateTodo',
        $argument,
        ['\Todo\TodoItem', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Todo\PBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function ReadTodo(\Todo\PBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/Todo.Todo/ReadTodo',
        $argument,
        ['\Todo\TodoItem', 'decode'],
        $metadata, $options);
    }

    /**
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ClientStreamingCall
     */
    public function CreateBulkTodo($metadata = [], $options = []) {
        return $this->_clientStreamRequest('/Todo.Todo/CreateBulkTodo',
        ['\Todo\Response','decode'],
        $metadata, $options);
    }

}

<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: protos/greetings.proto

namespace GPBMetadata\Protos;

class Greetings
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
protos/greetings.proto	greetings"!

response (	"
Greet
name (	2D
	Greetings7
	GreetUser.greetings.Greet.greetings.GreetResponsebproto3'
        , true);

        static::$is_initialized = true;
    }
}

#!/bin/bash


protoc --php_out="$1" --grpc_out="$1" --plugin=protoc-gen-grpc=/opt/homebrew/bin/grpc_php_plugin $2

const PROTO_PATH = "../../protos/pingpong.proto";

const grpc = require("@grpc/grpc-js");
const protoLoader = require("@grpc/proto-loader");

/*
The following lines allow the proto-loader package to 
compile proto files in runtime and import the required js file
generated
*/
const packageDefinition = protoLoader.loadSync(PROTO_PATH, {});
const grpcPackageDef = grpc.loadPackageDefinition(packageDefinition);
const pingpong = grpcPackageDef.pingpong;

/*
The service implementation that client invokes
it takes two params
call : provides all the http/2 details and message send from client

callback : this method is used to send response to server
*/
function SendPingMessage(call, callback) {
  if (call.request.PingMessage === "ping") {
    callback(null, { PongMessage: "pong" });
  } else {
    callback(null, { PongMessage: "did not understand your message" });
  }
}

function SendFooMessage(call, callback) {
  if (call.request.FooMessage === "foo") {
    callback(null, { BarMessage: "bar" });
  } else {
    callback(null, { PongMessage: "did not understand your message" });
  }
}

const server = new grpc.Server(); // create the grpc server

// define the service the server implements
server.addService(pingpong.PingPong.service, {
  SendPingMessage: SendPingMessage,
  SendFooMessage: SendFooMessage,
});

// start listening to client rpc calls at a port and address
server.bindAsync(
  "0.0.0.0:40000",
  grpc.ServerCredentials.createInsecure(),
  (error) => {
    console.log(error);
  }
);

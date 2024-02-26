const PROTO_PATH = "../../protos/pingpong.proto";

const grpc = require("@grpc/grpc-js");
const protoLoader = require("@grpc/proto-loader");
const packageDefinition = protoLoader.loadSync(PROTO_PATH, {});
const grpcPackageDef = grpc.loadPackageDefinition(packageDefinition);
const pingpong = grpcPackageDef.pingpong;

function SendPingMessage(call, callback) {
  if (call.request.PingMessage === "ping") {
    callback(null, { PongMessage: "pong" });
  }
}

function SendFooMessage(call, callback) {
  if (call.request.FooMessage === "foo") {
    callback(null, { BarMessage: "bar" });
  }
}

const server = new grpc.Server();
server.addService(pingpong.PingPong.service, {
  SendPingMessage: SendPingMessage,
  SendFooMessage: SendFooMessage,
});
server.bindAsync(
  "0.0.0.0:40000",
  grpc.ServerCredentials.createInsecure(),
  (error) => {
    console.log(error);
  }
);

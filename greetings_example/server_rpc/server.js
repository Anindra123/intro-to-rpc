const PROTO_PATH = "../../protos/greetings.proto";

const grpc = require("@grpc/grpc-js");
const protoloader = require("@grpc/proto-loader");

//compiles the proto file and loads the package
const packageDef = protoloader.loadSync(PROTO_PATH, {});
const grpcPackageDef = grpc.loadPackageDefinition(packageDef);
const greetings = grpcPackageDef.greetings;

//create the rpc server
const server = new grpc.Server();

//listen to calls
server.bindAsync(
  "localhost:60000",
  grpc.ServerCredentials.createInsecure(),
  (err) => console.log(err)
);

//define the services server will handle
server.addService(greetings.Greetings.service, {
  GreetUser: GreetUser,
});

//define the service method that client will invoke
function GreetUser(call, callback) {
  callback(null, { response: `Greetings ${call.request.name}` });
}

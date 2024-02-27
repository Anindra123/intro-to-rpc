const PROTO_PATH = "../../protos/todo.proto";
const grpc = require("@grpc/grpc-js");
const protoLoader = require("@grpc/proto-loader");

/*
 this three lines will compile the proto file and load
  the necessary package automatically at runtime
  instead of manually compiling
*/
const packageDefinition = protoLoader.loadSync(PROTO_PATH, {});
const grpcPackageDef = grpc.loadPackageDefinition(packageDefinition);
const todo = grpcPackageDef.Todo;

const server = new grpc.Server(); // create the grpc server

//for listening to incoming rpc request
server.bindAsync(
  "localhost:30000",
  grpc.ServerCredentials.createInsecure(), // bypassing the security features
  (error) => {
    console.log(error);
  }
);

//the server needs to know what service we are using
server.addService(todo.Todo.service, {
  CreateTodo: CreateTodo,
  ReadTodo: ReadTodo,
});

//these are the function that client will invoke
//call parameter gives the message that the client sends
//callback is a callback method that the server will use to respond to client

const todos = [];
function CreateTodo(call, callback) {
  todos.push({ id: todos.length + 1, title: call.request.title });
  callback(null, call.request);
}

// This handles server streaming
function ReadTodo(call, callback) {
  //go through each of the todo item
  // send them to the client as stream of responses
  todos.forEach((todo) => call.write(todo));

  // when it is finish close the stream
  call.end();
}

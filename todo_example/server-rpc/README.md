# Todo Example Server RPC example
This server rpc provides the necessary methods for handling rpc request from client. This server rpc example provides unary rpc implementation, server streaming and client streaming implementation.

## Dependencies
- @grpc/grpc-js

- @grpc/proto-loader


## Run Locally

- The ``@grpc/proto-loader`` package automatically compiles and imports the generated code from proto file at runtime

- No additional compilation is necessary

- Clone the repository

```bash
    git clone https://github.com/Anindra123/intro-to-rpc.git
```

- Install npm dependencies

```bash
    cd intro-to-rpc/todo-example/server-rpc

    npm install
```

- Run the ``server.js`` file

```bash
   node server.js
```

- This will start a rpc server at ``localhost:30000`` and will listen for incoming rpc request from client


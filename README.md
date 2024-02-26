# Intro to RPC

RPC is mechanism that allows distributed systems to communicate. This repository gives a brief overview about RPC works under the hood and how to implement gRPC framework with a simple example application.

## What is RPC (Remote Procedure Call) ?

- A mechanism for client server communication

- A local function when called executes some code within its own address space

<div style="display:flex;align-items:center;justify-content:center;margin-top:50px;margin-bottom:50px;">

<img src="./images/local_procedure_call.png"  width=300>


</div>

- A remote procedure call gets executed but in a different machine or address space

- The function call will seem to user as if it is calling a local function

- The implementation detail for both server and client will be same


<div style="display:flex;align-items:center;justify-content:center;margin-top:50px;margin-bottom:50px;">


<img src="./images/remote_procedure_call.png" width=600>


</div>


## What is gRPC ?

<div style="display:flex;justify-content:center;margin-top:20px;margin-bottom:20px;">

<a src="https://grpc.io/">

<img src="./images/grpc-logo.png" alt="grpc-logo" width=200>

</a>
</div>

<br/>

- An open source framework released by google in 2015

- Built on HTTP 2.0 and uses protocol buffers

- A rewrite of their internal rpc implmentation

- A language agnostic and operating system agnostic framework

- Used by large companies for communicating between their various microservices

<br/>
<br/>
<br/>

<div style="display:flex;align-items:center;justify-content:center;column-gap:50px">

<a href="">

<img src="./images/cisco.svg" width=150 >

</a>


<a href="">

<img src="./images/netflix-logo.png" width=150 >

</a>



<a href="">

<img src="./images/coreos-1.png" width=150>

</a>








</div>

<br>
<br>
<br>

<div style="display:flex;align-items:center;justify-content:center;column-gap:50px;margin-bottom:50px;">



<a href="">

<img src="./images/juniperlogo.png" width=150>

</a>

<a href="">

<img src="./images/square-icon.png" width=150 >

</a>

<a href="">

<img src="./images/cockroach-1.png" width=150>

</a>

</div>

- Supported in a wide array of programming languages


<div style="display:flex;align-items:center;justify-content:center;">


<table style="margin-top:50px">

<tr style="display:flex;align-items:center;">

<td style="width:150px;height:150px;display:flex;flex-direction:column;justify-content:space-between;align-items:center;">

<img src="./images/C++_Logo.svg.png" width=100>

<p align="center">C++</p>

</td>

<td style="width:150px;height:150px;display:flex;flex-direction:column;justify-content:space-between;align-items:center;">

<img src="./images/Ruby_logo.svg" width=100>

<div>

<p align="center">Ruby</p>
</div>
</td>



<td style="width:150px;height:150px;display:flex;flex-direction:column;justify-content:space-between;align-items:center;">

<img src="./images/C_Sharp_logo.svg" width=100>

<p align="center">C#</p>
</td>

<td style="width:150px;height:150px;display:flex;flex-direction:column;justify-content:space-between;align-items:center;">

<img src="./images/Go_Logo_Blue.svg" width=100>

<div>

<p align="center">GO</p>
</div>
</td>

</tr>


<tr style="display:flex;align-items:center;">


<td style="width:150px;height:150px;display:flex;flex-direction:column;justify-content:space-between;align-items:center;">

<img src="./images/PHP-logo.svg" width=100>

<div>

<p align="center">PHP</p>
</div>
</td>




<td style="width:150px;height:150px;display:flex;flex-direction:column;justify-content:space-between;align-items:center;">

<img src="./images/Python-logo-notext.svg" width=100>

<div>

<p align="center">Python</p>

</div>

</td>



<td style="width:150px;height:150px;display:flex;flex-direction:column;justify-content:space-between;align-items:center;">

<img src="./images/Java_programming_language_logo.svg" width=100 height=110>

<div>

<p align="center">Java</p>

</div>

</td>



<td style="width:150px;height:150px;display:flex;flex-direction:column;justify-content:space-between;align-items:center;">

<div style="flex:1;padding-top:20px">

<img src="./images/Node.js_logo.svg" width=100 >

</div>

<div>

<p align="center">Node JS</p>

</div>

</td>

</tr>



</table>


</div>

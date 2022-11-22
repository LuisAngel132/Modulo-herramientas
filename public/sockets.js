let url = location.host == 'localhost' ?
'ws://localhost:8081/ws' : location.host == 'javascript.local' ?
`ws://javascript.local/article/websocket/chat/ws` : // dev integration with local site
`wss://javascript.info/article/websocket/chat/ws`; // prod integration with javascript.info

let socket = new WebSocket(url);

// envío de mensaje desde el form

setInterval(function() {
    salir();
}, 10000);

// manejo de mensajes entrantes

document.forms.publish.onsubmit = function() {
    let outgoingMessage = this.message.value;
    localStorage.setItem("nuevo",this.message.value);
    socket.send(outgoingMessage);
    socket.onmessage (outgoingMessage);
    showMessage(outgoingMessage);
    window.location.href = "http://127.0.0.1:8000/welcome";
    return false;
    
    };
socket.onmessage = function(mensaje) {
let incomingMessage = event.data;
const message = localStorage.getItem("nuevo");
    showMessage("dd");


};

socket.onclose = event => console.log(`Closed ${event.code}`);

// mostrar mensaje en div#messages
function showMessage(message) {
let messageElem = document.createElement('div');
if(message){
 let sound  = new Audio('iphone-notificacion.mp3')
sound.play()
     contenido= `
    <style>
#snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 30px;
    font-size: 17px;
  }
  
  #snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
  }
  
  @-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;} 
    to {bottom: 30px; opacity: 1;}
  }
  
  @keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
  }
  
  @-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;} 
    to {bottom: 0; opacity: 0;}
  }
  
  @keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
  }
</style>

<button type="button">ewdwdw</button>
<div id="snackbar">Se han agregado nuevos vales</div>

`;
}

document.getElementById('messages').innerHTML = contenido ;
var x = document.getElementById("snackbar");
x.className = "show";

setTimeout(function(){ x.className = x.className.replace("show", ""); }, 10000);

}
function salir(){
    contenido = "";
    x = "";
    localStorage.clear();

}

const WebSocketServer = require('ws');
const wss = new WebSocketServer.Server({ port: 8080 })

let messes = [];

wss.on("connection", ws => {
    console.log("[open] Соединение установлено");

    ws.on("message", data => {
        let dataFromClient = JSON.parse(data);

        serverData = {
            username: dataFromClient.username,
            text: dataFromClient.text
        }

        messes.push(serverData)
        messes.forEach(elemet => ws.send(JSON.stringify(elemet)))
    });

    ws.on("close", () => {
        console.log("[close] Соединение закрыто чисто");
    });

    ws.onerror = function () {
        console.log("[error]")
    }
});

console.log("The WebSocket server is running on port 8080");

function reverseString(str)
{
    let splitStr = str.split("");
    let reverseArray = splitStr.reverse();
    var joinArrayInStr = reverseArray.join("");

    return joinArrayInStr;
}
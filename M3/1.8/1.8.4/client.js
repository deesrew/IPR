let socket = new WebSocket("ws://localhost:8080");

socket.onopen = function(e) {
    console.log("[open] Соединение установлено");
};

socket.onmessage = function(event) {
    let data = JSON.parse(event.data);

    let messageElem = document.createElement('p');
    messageElem.textContent = data.username + ': ' + data.text;
    document.getElementById('fromServer').prepend(messageElem);
};

socket.onclose = function(event) {
    if (event.wasClean) {
        console.log(`[close] Соединение закрыто чисто, код=${event.code} причина=${event.reason}`);
    } else {
        console.log('[close] Соединение прервано');
    }
};

socket.onerror = function(error) {
    alert(`[error] ${error.message}`);
};

$( document ).ready(function() {

    $("#toServer").submit(function () {
        let data = {
            username: $("#name").val(),
            text: $("#text").val(),
        };

        $('#fromServer').empty();

        socket.send(JSON.stringify(data));
        return false;
    })
});
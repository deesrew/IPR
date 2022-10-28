let socket = new WebSocket("ws://localhost:8080");

socket.onopen = function(e) {
    console.log("[open] ���������� �����������");
};

socket.onmessage = function(event) {
    let data = JSON.parse(event.data);

    let messageElem = document.createElement('p');
    messageElem.textContent = data.username + ': ' + data.text;
    document.getElementById('fromServer').prepend(messageElem);
};

socket.onclose = function(event) {
    if (event.wasClean) {
        console.log(`[close] ���������� ������� �����, ���=${event.code} �������=${event.reason}`);
    } else {
        console.log('[close] ���������� ��������');
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
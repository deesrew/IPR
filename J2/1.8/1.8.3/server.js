let http = require('http');
let url = require('url');
let querystring = require('querystring');
let static = require('node-static');

let fileServer = new static.Server('.');

let subscribers = Object.create(null);

function onGetMessage(req, res) {
    let id = Math.random();

    res.setHeader('Content-Type', 'text/plain;charset=utf-8');
    res.setHeader("Cache-Control", "no-cache, must-revalidate");

    subscribers[id] = res;

    req.on('close', function() {
        delete subscribers[id];
    });

}

function publish(message) {

    for (let id in subscribers) {
        let res = subscribers[id];
        res.end(message);
    }

    subscribers = Object.create(null);
}

function accept(req, res) {
    let urlParsed = url.parse(req.url, true);

    // ������ ����� �������� ���������
    if (urlParsed.pathname == '/getMess') {
        onGetMessage(req, res);
        return;
    }

    // �������� ���������
    if (urlParsed.pathname == '/postMess' && req.method == 'POST') {
        // ������� POST
        req.setEncoding('utf8');
        let message = '';
        req.on('data', function(chunk) {
            message += chunk;
        }).on('end', function() {
            publish(message);
            res.end("ok");
        });

        return;
    }

    // ��������� - �������
    fileServer.serve(req, res);

}

function close() {
    for (let id in subscribers) {
        let res = subscribers[id];
        res.end();
    }
}

if (!module.parent) {
    http.createServer(accept).listen(8080);
    console.log('Server running on port 8080');
} else {
    exports.accept = accept;

    if (process.send) {
        process.on('message', (msg) => {
            if (msg === 'shutdown') {
                close();
            }
        });
    }

    process.on('SIGINT', close);
}
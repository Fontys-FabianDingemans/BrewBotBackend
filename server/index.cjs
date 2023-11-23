const { WebSocketServer, WebSocket} = require('ws');


const port = 34535;
const authToken = "2ZJQrLFrLB2zvx.4WLqWJZ-MoepVn384hcvDTvCc";


const server = new WebSocketServer({ port: port });
let clients = [];

server.on('connection', function connection(client) {
    client.id = Math.random().toString(36).substring(2, 15);
    clients.push(client);

    client.on('error', console.error);
    client.on('message', function message(event) {
        const rawData = event.toString();
        const data = JSON.parse(rawData);

        const headers = data.headers || {};
        const token = headers['x-auth-token'] || null;
        if(authToken !== token) {
            client.send(JSON.stringify({
                success: false,
                message: 'Invalid token'
            }));
            return;
        }

        clients.forEach((remote) => {
            if (client.id !== remote.id) {
                remote.send(JSON.stringify(data));
            }
        });

        client.send(JSON.stringify({
            success: true,
            message: 'Message sent'
        }));
    });
});
server.on('error', console.error);

console.log('Server started on port %d', port);

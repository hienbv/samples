var conn = new WebSocket('ws://192.168.56.56:9090');
conn.onopen = function(e) {
    console.log("Connection established!");
    conn.send('Hello World!');
};

conn.onmessage = function(e) {
    console.log(e.data);
};

conn.onerror = function(e) {
    console.log('Error');
    console.log(e);
};

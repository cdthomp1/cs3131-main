const http = require('http');
const fs = require('fs');

function onRequest(req, res) {
    console.log(req.url);
    if (req.url === '/home') {
        res.writeHead(200, { 'Content-Type': 'text/html' });
        res.write('<h1>Welcome to the Home Page</h1>');
        res.end();
    } else if (req.url === '/getData') {
        res.writeHead(200, { 'Content-Type': 'aplication/json' });
        res.write(JSON.stringify({ "name": "Cameron Thompson", "class": "CS 313" }));
        res.end();
    } else if (req.url === '/curentDirectory') {
        fs.readdir('./', (err, files) => {
            if (err) return console.error(err)
            res.writeHead(200, { 'Content-Type': 'text/html' });
            res.write('<h1>Here are the files in your current directory</h1>')
            res.write('<ul>')
            files.forEach(file => {
                res.write('<li>' + file + '</li>');
            })
            res.write('</ul>')
            res.end();
        })
    }
    else {
        res.writeHead(404, { 'Content-Type': 'text/html' });
        res.write('<h1>Page Not Found</h1>');
        res.end();
    }
}

const server = http.createServer(onRequest);
server.listen(7378);
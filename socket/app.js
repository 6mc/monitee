const app = require('express')();
const http = require('http').Server(app);
const io = require('socket.io')(http);
const port = process.env.PORT || 2000;
var mysql      = require('mysql');
var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'monty',
  password : 'python',
  database : 'demo'
});


	connection.connect();

app.get('/', (req, res) => {
 res.send("oneydigı");
});

io.on('connection', (socket) => {
  
  console.log('user connected');
  socket.on('user', msg => {
 	console.log("watching:" + msg);

 	connection.query('UPDATE users SET watching= '+ msg +' WHERE id = 1', function (error, results, fields) {
  if (error) throw error;
  	console.log("db updated");
});

  });

  socket.on('disconnect', () => {
    console.log('user disconnected');
	connection.query('UPDATE users SET watching= NULL WHERE id = 1', function (error, results, fields) {
  if (error) throw error;
  	console.log("db updated");
});

  });
});

http.listen(port, () => {
  console.log(`Socket.IO server running at http://localhost:${port}/`);
});

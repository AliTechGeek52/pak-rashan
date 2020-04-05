var mysql = require('config2');

var con = mysql.createConnection({
  host: "localhost",
  user: "pakrashan_admin",
  password: "Fretab@23"
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
});

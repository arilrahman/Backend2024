// import express dan routing
const express = require("express");
const router = require("./routes/api.js");

// Membuat object express
const app = express();

// Menggunakan middleware
app.use(express.json());
app.use(express.urlencoded());

// Menggunakan routing (router)
app.use(router);

// Mendefinisikan port.
app.listen(3000);

//

// const express = require("express");

// const app = express();

// app.get("/", (req, res) => {
//     res.send("Hello express 12");
// });

// app.listen(3000, () =>{
//     console.log("server running at http://localhost:3000");
// });
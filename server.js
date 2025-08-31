const express = require("express");
const http = require("http");
const { Server } = require("socket.io");

const app = express();
const server = http.createServer(app);
const io = new Server(server);

app.use(express.static("public"));

let adminId = null;

io.on("connection", socket => {
    console.log("User connected:", socket.id);

    // যখন Admin join করবে
    socket.on("join-as-admin", () => {
        adminId = socket.id;
        console.log("Admin joined:", adminId);
    });

    // signaling data pass করা
    socket.on("signal", data => {
        io.to(data.to).emit("signal", {
            from: socket.id,
            signal: data.signal
        });
    });

    // user admin এর stream চাইবে
    socket.on("request-stream", () => {
        if (adminId) {
            io.to(adminId).emit("new-viewer", socket.id);
        }
    });

    socket.on("disconnect", () => {
        if (socket.id === adminId) {
            adminId = null;
            io.emit("admin-left");
        }
    });
});

const PORT = process.env.PORT || 3000;
server.listen(PORT, () => {
    console.log("Server running on http://localhost:" + PORT);
});

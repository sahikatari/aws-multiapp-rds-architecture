const express = require("express");
const mysql = require("mysql2");
const bodyParser = require("body-parser");

const app = express();

app.use(bodyParser.urlencoded({ extended: true }));
app.set("view engine", "ejs");

// RDS Connection
const db = mysql.createConnection({
    host: "multiple-apps-db.cfsiea4gms2x.eu-west-1.rds.amazonaws.com",
    user: "admin",
    password: "admin1234",
    database: "companydb"
});

db.connect((err) => {
    if (err) {
        console.log("Database Connection Failed");
    } else {
        console.log("Connected to AWS RDS MySQL");
    }
});

// Home Page
app.get("/", (req, res) => {
    res.render("index");
});

// Save Employee
app.post("/add", (req, res) => {

    const { name, email, department } = req.body;

    const sql = "INSERT INTO employees(name,email,department) VALUES (?,?,?)";

    db.query(sql, [name, email, department], (err, result) => {

        if (err) {
            console.log(err);
            res.send("Database Error");
        } else {
            res.send("Employee Added Successfully");
        }
    });
});

// Start Server
app.listen(3000, () => {
    console.log("Server running on port 3000");
});

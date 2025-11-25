const express = require('express');
const bodyparser = require('body-parser');
const request = require('request');




const app = express();
app.use(bodyparser.urlencoded({extended: true}));
app.use(express.static("public"));
/**
 * Serves the signup page.
 * @param {import('express').Request} req The Express request object.
 * @param {import('express').Response} res The Express response object.
 */
app.get("/",(req,res)=>{
    res.sendFile(__dirname + "/signup.html");

})

/**
 * Handles the form submission from the signup page.
 * @param {import('express').Request} req The Express request object.
 * @param {import('express').Response} res The Express response object.
 */
app.post("/",(req,res)=>{
    var firstName = req.body.fName;
    var lastName = req.body.lName;
    var email = req.body.email;

    console.log(firstName,lastName,email);
})



/**
 * Starts the Express server.
 */
app.listen(3000,function(){
    console.log("server is running on localhost 3000");
})
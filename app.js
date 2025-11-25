// Import required modules
const express = require('express');
const bodyparser = require('body-parser');
const request = require('request');

// Create an Express application
const app = express();
// Use body-parser to parse URL-encoded bodies
app.use(bodyparser.urlencoded({extended: true}));
// Serve static files from the 'public' directory
app.use(express.static("public"));

/**
 * Route for the home page.
 * @name get/
 * @function
 * @memberof module:express.Router
 * @inner
 * @param {string} path - Express path
 * @param {callback} middleware - Express middleware.
 */
app.get("/",(req,res)=>{
    // Send the signup.html file
    res.sendFile(__dirname + "/signup.html");
})

/**
 * Route for handling form submissions.
 * @name post/
 * @function
 * @memberof module:express.Router
 * @inner
 * @param {string} path - Express path
 * @param {callback} middleware - Express middleware.
 */
app.post("/",(req,res)=>{
    // Get the form data
    var firstName = req.body.fName;
    var lastName = req.body.lName;
    var email = req.body.email;

    // Log the form data to the console
    console.log(firstName,lastName,email);
})

// Start the server on port 3000
app.listen(3000,function(){
    console.log("server is running on localhost 3000");
})

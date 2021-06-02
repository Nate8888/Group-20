<?php
    // get the json sent from frontend
    $inData = getRequestInfo();

    // connect to data base
    $conn = new mysqli("localhost", "dbuser", getenv("SQL_PW"), "ContactManager");
    if ($conn->connect_error) {
        returnWithError($conn->connect_error);
    } else {
        // = = = = = = = = = = API GOES HERE = = = = = = = = = = 

    }

    // close the data base connection
    $conn->close();

    // helper function to get the input from front end and decode the json to a named array
    function getRequestInfo() {
        return json_decode(file_get_contents('php://input'), true);
    }

    // helper function to return the given object back to the front end, specifying the type as json. it is assumed $obj is already a json string
    function sendResultInfoAsJson($obj) {
        header('Content-type: application/json');
        echo $obj;
    }

    // helper function to send back an error with the specified message
    function returnWithError($err) {
        sendResultInfoAsJson('{"status": "error", "message": "' . $err . '"}');
    }
?>
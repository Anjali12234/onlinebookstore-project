<?php

if (isset($_POST["query"])) {
    $query = $_POST["query"];

    // Connect to the database
   @include("../connect.php");

    $con = new mysqli($servername, $username, $password, $dbname);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Perform search and return results as an array
    $results = search($con, $query);

    echo json_encode($results);
}

function search($con, $query) {
    $results = array();
    $query = "%".$query."%";
    $sql = "SELECT * FROM books WHERE book_name LIKE ? OR description LIKE ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $query, $query);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()) {
        $results[] = $row;
    }
    return $results;
}

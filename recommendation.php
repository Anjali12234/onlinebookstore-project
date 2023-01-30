<?php

// Connect to the database
@include("connect.php");
// Define the SQL query to retrieve the books from the database
$query = "SELECT * FROM books";

// Execute the query and store the result
$result = mysqli_query($con, $query);

// Define an array to store the books
$books = array();

// Loop through the result and store each book in the $books array
while ($row = mysqli_fetch_assoc($result)) {
  $books[] = $row;
}

// Define a function to compute the similarity between two books
function similarity($book1, $book2) {
  $similarity = 0;
  if ($book1["cat_id"] == $book2["cat_id"]) {
    $similarity += 1;
  }
  if ($book1["fk_auth_id"] == $book2["fk_auth_id"]) {
    $similarity += 1;
  }
  return $similarity;
}

// Define a function to recommend books
function recommend($book) {
  global $books;
  $recommendations = array();
  foreach ($books as $b) {
    if ($b["book_name"] != $book["book_name"]) {
      $similarity = similarity($book, $b);
      if ($similarity > 0) {
        $recommendations[] = array("book_name" => $b["book_name"], "similarity" => $similarity);
      }
    }
  }
  usort($recommendations, function($a, $b) {
    return $b["similarity"] - $a["similarity"];
  });
  return $recommendations;
}

// Example usage
$recommendations = recommend($books[0]);
foreach ($recommendations as $r) {
  echo $r["book_name"] . " (Similarity: " . $r["similarity"] . ")\n";
}

// Close the database connection
mysqli_close($con);

?>

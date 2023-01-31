<?php
  // Connect to the database
  $db = new mysqli('localhost', 'root', '', 'monoshop');

  // Get the type of request (like or dislike)
  $request = json_decode(file_get_contents('php://input'));
  $type = $request->type;

  if ($type == "like") {
    // Increment the like count
    $db->query("UPDATE posts SET likes = likes + 1 WHERE id = 1");
  } elseif ($type == "dislike") {
    // Increment the dislike count
    $db->query("UPDATE posts SET dislikes = dislikes + 1 WHERE id = 1");
  }

  // Get the current like and dislike count
  $result = $db->query("SELECT likes,dislikes FROM posts WHERE id = 1");
  $row = $result->fetch_assoc();
  $likes = $row['likes'];
  $dislikes = $row['dislikes'];

  // Return the like and dislike count as a JSON object
  echo json_encode(['likes' => $likes, 'dislikes' => $dislikes]);
?>
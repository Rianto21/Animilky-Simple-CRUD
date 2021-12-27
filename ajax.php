<?php
  if(isset($_POST['key'])){
    $conn = new mysqli( 'localhost', 'root', '', 'sakila');
    $film_name = $conn->real_escape_string($_POST['film_name']);
    $category = $conn->real_escape_string($_POST['category']);
    $rating = $conn->real_escape_string($_POST['rating']);

    if($_POST['key'] == 'addnew'){
      $sql = "INSERT INTO film_universe (film_id, title, category_id, rating) VALUES (NULL, '$film_name', '$category', '$rating')";
      $conn->query($sql);
      exit("Data Added Successfully!");
    }

    if($_POST['key'] == 'edit'){
      $film_id = $conn->real_escape_string($_POST['film_id']);
      $film_name = $conn->real_escape_string($_POST['film_name']);
      $category = $conn->real_escape_string($_POST['category']);
      $rating = $conn->real_escape_string($_POST['rating']);
      $sql="UPDATE film_universe SET title = '$film_name', category_id = '$category', rating = '$rating' WHERE film_id = $film_id";
      $conn->query($sql);
      exit("Data Changed Successfully!");
    }

    if($_POST['key'] == 'delete'){
      $film_id = $conn->real_escape_string($_POST['film_id']);
      $sql = "DELETE FROM film_universe WHERE film_id = $film_id;";
      $sql2 = "SET @autoid := 0;";
      $sql3 = "UPDATE film_universe SET film_id = @autoid := (@autoid + 1);";
      $sql4 = "ALTER TABLE film_universe AUTO_INCREMENT = 1;";
      $sql = "
        DELETE FROM film_universe WHERE film_id = $film_id;
        SET @autoid := 0;
        UPDATE film_universe SET film_id = @autoid := (@autoid + 1);
        ALTER TABLE film_universe AUTO_INCREMENT = 1;
      ";
      $conn->multi_query($sql);
      exit("Data Deleted Successfully!");
    }

    if($_POST['key'] == 'createaccount'){
      $conn = new mysqli( 'localhost', 'root', '', 'user');
      $name = $conn->real_escape_string($_POST['name']);
      $username = $conn->real_escape_string($_POST['username']);
      $password = md5($conn->real_escape_string($_POST['password']));
      $sql = "INSERT INTO users (id, name, username, password) VALUES (null, '$name', '$username', '$password')";
      $conn->query($sql);

      exit("Account Created Successfully!");
    }
  }
?>
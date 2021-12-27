<?php

  $conn = new mysqli( 'localhost', 'root', '', 'sakila');
  $limit = 25;
  $output = '';

  if(isset($_POST["page"])){
    $page = $_POST["page"];
  } else {
    $page = 1;
  }
  $start = ($page - 1) * $limit;

  $sql = "SELECT film_universe.film_id, film_universe.title, film_universe.category_id, category.name, film_universe.rating FROM film_universe JOIN category ON film_universe.category_id = category.category_id ORDER BY film_universe.film_id ASC LIMIT {$start},{$limit}";
  // $sql = "SELECT * from film";

  $result = $conn->query($sql);

  $total_data = $conn->query("SELECT * from film_universe")->num_rows;
  if($result !== false && $result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $output .= '
        <tr>
          <td id="'.$row["film_id"].'">'.$row["film_id"].'</td>
          <td id="'.$row["title"].'">'.$row["title"].'</td>
          <td id="'.$row["category_id"].'">'.$row["name"].'</td>
          <td id="'.$row["rating"].'">'.$row["rating"].'</td>
          <td>
            <div class="btn-group w-75">
              <button id="editbutton" class="btn btn-outline-primary w-50" data-bs-toggle="modal" data-keyboard="false" data-backdrop="static" data-bs-target="#updatedata" 
              data-id="'.$row['film_id'].'"
              data-title="'.$row['title'].'"
              data-category="'.$row['category_id'].'"
              data-rating="'.$row['rating'].'"><ion-icon name="create-outline"></ion-icon></button>
              <button id="deletebutton" data-id="'.$row['film_id'].'" class="btn btn-outline-danger w-50" data-bs-toggle="modal" data-keyboard="false" data-backdrop="static" data-bs-target="#deletedata"><ion-icon name="trash-outline"></ion-icon></button>
            </div>
          </td>
        </tr>
      ';
  } 
    $s = '
      <tr>
        <td id="lastrow" style="display: none;">'.$total_data.'</td>
      </tr>
    ';
  } else {
    die("No Data!");
  }

  echo $output;
  echo $s;
?>
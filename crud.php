<!-- <?php
  session_start();

  $username = $_SESSION['username'];
  if(!isset($_SESSION['logedin'])) {
    header('Location: index.php');
    exit();
  }
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script src="crud.js" defer></script>
  <title>Movie Universe</title>
</head>
<body>
  <div class="container-fluid mt-2 w-100">
    <div class="row align-items-center">
      <div class="col-md-3 ">
        <p style="color: aliceblue; font-size: 1.25rem;">Hello, <?=$username?></p>
      </div>
      <div id="title" class="col crudtitle text-center ">
        <h2>Animilky Movie Universe</h2>
      </div>
      <div class="col-md-3 text-center ">
       <a href="logout.php"><button type="button" class="btn btn-outline-danger">Log-Out</button></a>
      </div>
    </div>
  </div>

  

  <table class="table table-dark table-striped table-hover table-bordered border-white w-75 m-auto mt-4 text-center">
    <thead>
      <tr>
        <th style="width: 8%;">Film ID</th>
        <th style="width: 50%;">Film Name</th>
        <th style="width: 20%;">Category</th>
        <th style="width: 7%;">Rating</th>
        <th style="width: 15%;">Modify</th>
      </tr>
    </thead>
    <tbody id="data-container">
    </tbody>
  </table>
  <div class="container-fluid w-75 m-auto mt-2">
    <div class="row">
      <div class="col">
        <button class="btn btn-outline-dark shadow-none" id="btt">Back to top</button>
      </div>
      <div class="col">
        <div class="btn-group w-100">
          <button style="max-width: 17.5%;" id="first" class="btn btn-outline-dark shadow-none"><<</button>
          <button style="width: auto;" id="prev" class="btn btn-outline-dark shadow-none">Prev</button>
          <button style="width: auto;" id="next" class="btn btn-outline-dark shadow-none">Next</button>
          <button style="max-width: 17.5%;" id="last" class="btn btn-outline-dark shadow-none">>></button>
        </div>
      </div>
      <div class="col text-end">
        <button id="addnew" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#createdata">Add New</button>
      </div>
    </div>

  </div>


  <!-- Modal Create Data Start -->
  
  <div id="createdata" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h4 class="modal-title" style="color: cornsilk;">Add New Movie</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form class="text-center">
          <div class="mb-3">
            <label for="film_name" style="color: cornsilk;" class="col-form-label">Film Name</label>
            <input type="text" class="form-control w-75 m-auto" id="film_name" placeholder="Movie Name">
          </div>
          <div class="mb-3">
            <label for="category" style="color: cornsilk;" class="col-form-label">Category</label>
            <input type="text" class="form-control w-75 m-auto" id="category" placeholder="Category: 1-16"></textarea>
          </div>
          <div class="mb-3">
            <label for="rating" style="color: cornsilk;" class="col-form-label">Rating</label>
            <select class="form-select w-75 m-auto shadow-none selected" id="rating" placeholder="Rating:">
              <option selected>G</option>
              <option>PG</option>
              <option>PG-13</option>
              <option>R</option>
              <option>NC-17</option>
            </select>
          </div>
        </form>
        </div>
        <div class="modal-footer">
          <input type="button" id="save" value="Save" class="btn">
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Create Data End -->


  <!-- Modal Update Data Start -->

  <div id="updatedata" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h4 class="modal-title" style="color: cornsilk;">Update Movie Data</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form class="text-center">
          <fieldset disabled="disabled">
            <div class="mb-3">
              <label for="film_id_up" style="color: cornsilk;" class="form-label">Film ID</label>
              <input type="text" class="form-control w-75 m-auto" id="film_id_up">
            </div>
          </fieldset>
          <div class="mb-3">
            <label for="film_name" style="color: cornsilk;" class="col-form-label">Film Name</label>
            <input type="text" class="form-control w-75 m-auto" id="film_name_up" placeholder="Movie Name">
          </div>
          <div class="mb-3">
            <label for="category" style="color: cornsilk;" class="col-form-label">Category</label>
            <input type="text" class="form-control w-75 m-auto" id="category_up" placeholder="Category: 1-16"></textarea>
          </div>
          <div class="mb-3">
            <label for="rating" style="color: cornsilk;" class="col-form-label">Rating</label>
            <select class="form-select w-75 m-auto shadow-none selected" id="rating_up" placeholder="Rating:">
              <option value="G">G</option>
              <option value="PG" >PG</option>
              <option value="PG-13">PG-13</option>
              <option value="R">R</option>
              <option value="NC-17">NC-17</option>
            </select>
          </div>
        </form>
        </div>
        <div class="modal-footer">
          <input type="button" id="update" value="Update" class="btn">
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Update Data End -->


  <!-- Modal Update Data End -->

  <div id="deletedata" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h4 class="modal-title" style="color: cornsilk;">Delete Movie Data</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <h3 class="text-warning">WARNING!</h3>
          <p class="text-white">Delete film data with id <span id="delete_id"> </span></p>
        </div>
        <div class="modal-footer">
          <div class="btn-group m-auto w-50">
            <button id="delete_approve" class="btn btn-primary w-50 shadow-none">Yes!</button>
            <button id="delete_cancel" class="btn btn-danger w-50 shadow-none">No!</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Update Data End -->

  <div class="footer-basic mt-5">
    <footer>
      <div class="social">
        <a href="https://instagram.com/oryto21" target="blank"><ion-icon name="logo-instagram"></ion-icon></a>
        <a href="https://github.com/Rianto21" target="blank"><ion-icon name="logo-github"></ion-icon></a>
        <a href="https://twitter.com/OrytoMikli" target="blank"><ion-icon name="logo-twitter"></ion-icon></a>
        <a href="https://www.facebook.com/profile.php?id=100006955035155" target="blank"><ion-icon name="logo-facebook"></ion-icon></a>
      </div>
      <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Home</a></li>
          <li class="list-inline-item"><a href="#">Services</a></li>
          <li class="list-inline-item"><a href="#">About</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
      </ul>
      <p class="copyright">Mikli Oktarianto © 2042</p>
    </footer>
  </div>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
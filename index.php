<?php
  session_start();

  if(isset($_SESSION['logedin'])){
    header('Location: crud.php');
    exit();
  }

  if (isset($_POST['login'])){
    $conn = new mysqli( 'localhost', 'root', '', 'user');


    $username = $conn->real_escape_string($_POST['usernamePHP']);
    $password = md5($conn->real_escape_string($_POST['passwordPHP']));

    $data = $conn->query("SELECT id, name from users WHERE username = '$username' and password = '$password'");
    $row = $data->fetch_assoc();
    if($data->num_rows > 0){
      $_SESSION['logedin'] = 1;
      $_SESSION['username'] = $row['name'];
      exit("success!");
    } else {
      exit("wrong username or password!");
    }
      
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script src="login.js" defer></script>
  <title>Animilky Login Page</title>
</head>
<body>
  <div class="container cc text-center bg-primary mb-5 mt-5">
    <div class="row">
      <div class="col-md-4 ">
        <div class="row text-center">
          <img style="max-width: 15vh; border-radius: 2rem; margin: auto; margin-top: 1rem;" src="images/Free Anime Logo Maker Anime Logo Free Anime Logo Logo Design Creator Japanese Logo (1).jpeg" alt="">
          <h1 class="titletext">Animilky Movie Universe</h3>
        </div>
        <hr style="width: 80%; height: 2px; margin: auto;">
        <div class="row text-center">
          <h2 class="wellcome">Hello Adventurer</h2>
          <p class="slogan">Let's find your rocketship!</p>
        </div>
        <div class="row text-center">
          <form action="" class="form-group">
            <input type="text" placeholder="Username: betausername" id="username" class="mb-2 w-75">
            <input type="password" placeholder="Password: betapassword" id="password" class="mb-2 w-75">
            <p id="response"></p>
            <br>
            <a href="" class="lupa">forgot your key?</a>
            <br>
            <input type="button" id="login" value="Launch!" class="w-75 mb-2 mt-3">
          </form>
          <hr style="width: 80%; height: 2px; margin: auto;">
          <p class="otherlogin">Use Other Spaceship</p>
          <div class="row otheraccount mb-3">
            <div class="col-4 text-end"><a href=""><img src="images/facebook.png" alt=""></a></div>
            <div class="col-4"><a href=""><img src="images/google-logo-9808.png" alt=""></a></div>
            <div class="col-4 text-start"><a href=""><img src="images/Myanimelist.png" alt=""></a></div>
          </div>
        </div>
        <a style="margin: auto;" id="register" class="register" data-bs-toggle="modal" data-bs-target="#createaccount">Register Animilky?</a>
        <div class="row text-center mt-2">
          <p class="copyright">©2021 Animilky All-right reserved github.com/rianto21</p> 
        </div>
      </div>
      <div class="col-md-8 anime-image">
        <!-- <img src="images/bganime.jpg" alt=""> -->
      </div>
    </div>
    <div class=" under d-block d-sm-block d-md-none anime-image">
    </div>
  </div>

  <div id="createaccount" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h4 class="modal-title" style="color: cornsilk;">REGISTER ANIMILKY</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="needs-validation text-center" novalidate>
            <div class="w-75 m-auto mb-3">
              <label for="create_fullname" class="form-label text-white">Full Name</label>
              <input type="text" class="form-control" id="create_fullname" placeholder="Full Name" required>
              <div class="valid-feedback">
                Sounds Great!
              </div>
            </div>
            <div class="w-75 m-auto mb-3">
              <label for="create_username" class="form-label text-white">Username</label>
              <input type="text" class="form-control" id="create_username" placeholder="username" required>
              <div class="valid-feedback">
                Please fill username!
              </div>
            </div>
            <div class="w-75 m-auto mb-3">
              <label for="create_password" class="form-label text-white">password</label>
              <div class="input-group has-validation">
                <input type="password" class="form-control" id="create_password" placeholder="password" required>
                <div class="invalid-feedback">
                  Please choose password!
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <input type="button" id="regist" value="Register" class="btn">
        </div>
      </div>
    </div>
  </div>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>
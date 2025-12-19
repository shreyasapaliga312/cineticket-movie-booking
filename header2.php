<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CineTicket</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/predefined_style.css">
  <link rel="icon" href="./images/logo.png">
  
  <!-- <script src="script.js"></script> -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <?php include_once 'dbfun.php'; ?>
   <!-- Required meta tags -->
   <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>CineTicket</title>
        <link rel="icon" href="logo.png">
        <!-- Template CSS -->
        <link rel="stylesheet" href="assets/css/style-starter.css">
        <!-- Template CSS -->
        <link href="//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,600&display=swap"
              rel="stylesheet">
        <!-- Template CSS -->
        <script src="js/jquery-3.5.1.js" type="text/javascript"></script>
        <script>
            $(function () {
                $("#email").blur(function () {
                    $.get("verify.php", {'userid': $(this).val()}, function (output) {
                        if (output.trim() == "no") {
                            $("#err").html("Userid is not available");
                        } else {
                            $("#err").html("");
                        }
                    });
                });
            });
        </script>

</head>
  <header>
    <div class="navbar" style="height:70px">
      <div class="nav-logo">
        <div class="logo" style="display: flex; ">
          &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-circle-play main_logo" ></i><p>CineTicket</p>
        </div>
      </div>



      <div class="nav-search">

        <input type="text" placeholder="Search Here for Movies and Theatre" id="find" class="search-input"
          onkeyup="search()">
      </div>
     

      
     
       <?php if (isset($_SESSION["userid"])) { ?> 
                                <li class="nav-item">
                                    <a class="nav-link" href="bhistory.php">My Bookings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Logout</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Welcome ! <?= $_SESSION["uname"] ?></a>
                                </li>
                            <?php } else { ?>
                              <div class="nav-return border">
        <button class="btn1" data-toggle="modal" data-target="#modelId1">Log-in</button>
      </div>
                                <div class="nav-return border">
        <button class="btn1"  data-toggle="modal" data-target="#modelId">Sign-in</button>
      </div>
                            <?php } ?>

      <div class="nav-cart border">
        <i class="fa-solid fa-bars"></i>

      </div>
    </div>
    <div class="panel">
      <div class="panel-all">


      </div>
      
      <div class="panel-ops">
        <a href="index.php"> <p>Home</p> </a>
        <a><p>Movies</p></a>
        <a><p>Theatre</p> </a>
        <a href="aboutus.php"> <p>About us</p> </a>
       
      </div>
      <div class="panel-ops2">
        <a href=""> <p>ListYourShow <i class="fa-solid fa-cart-shopping" style="color:black"></i></p></a>
      </div>
     
    <hr>
    
    
    
    <!-- Register -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header"style="background-color:rgb(255, 0, 98); color:white;">
            <h5 class="modal-title">Registration Form</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
  <form id="registrationForm">
   
    <div class="form-group">
      <label for="username">User Name</label>
      <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="form-group">
      <label for="confirmPassword">Confirm Password</label>
      <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
    </div>
    <div class="form-group">
      <label for="number">Number</label>
      <input type="number" class="form-control" id="number" name="number" required>
    </div>
    <div class="form-group text-center">
      <button type="submit" class="btn btn-primary" style="background-color:rgb(255, 0, 98);">Submit</button>
    </div>
  </form>
</div>


        </div>
      </div>
    </div>

  
    
    <!--Login -->
    <div class="modal fade" id="modelId1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header"style="background-color:rgb(255, 0, 98); color:white;">
            <h5 class="modal-title">Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
  <form id="loginForm">
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    
  </form>
</div>

        
        </div>
      </div>
    </div>
  </header>
   <!-- <div class="panel-deals"></div>


    </div> -->
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
  
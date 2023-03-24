<!DOCTYPE html>
<html lang="en">
<head>
  <title>Signup Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    .signup-form {
      width: 100%;
      max-width: 500px;
      padding: 30px;
      margin: auto;
    }
    .signup-form .form-control {
      position: relative;
      box-sizing: border-box;
      height: auto;
      padding: 10px;
      font-size: 16px;
    }
    .card {
      margin-top: 50px;
      margin-bottom: 50px;
    }
  </style>
</head>

<body>
<div class="container">
  <div class="card">
    <div class="card-body">
      <form class="signup-form" method = "post" action = "signup.php">
      <?php
            require_once 'dbconn.php';
            
            if(isset($_POST['register'])){
                $user_username = $_POST["username"];
                $user_email = $_POST["email"];
                $user_dob = $_POST["dob"];
                $user_gender = $_POST["gender"];
                $user_password = $_POST["password"];
                $user_confirmPassword = $_POST["confirmPassword"];


                if($user_password != $user_confirmPassword){
                    echo "<div class='alert alert-danger text-center mb-3'>password doesn't match...</div>";
                }
                else{
                    $collection = $db->selectCollection("users");

                    $result = $collection->findOne([
                        'email' => $user_email
                    ]);

                    //user already exists then redirect to login page
                    if(!empty($result)){
                        echo "<script>alert('user already exist...')</script>";
                        header("refresh:0.3; login.php"); 
                        exit();
                    }
                    else{
                        $user_data = [];
                        $user_data["username"] = $user_username;
                        $user_data["email"] = $user_email;
                        $user_data["dob"] = $user_dob;
                        $user_data["gender"] = $user_gender;

                        $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
                        $user_data["password"] = $hashed_password;
                        try{
                            $result = $collection->insertOne($user_data);
                            echo "<script>alert('successfully registered user...redirecting to login page...')</script>";
                            header("refresh:0.3; login.php");
                            exit();
                        }
                        catch(Exception $e){
                            echo "<script>alert('failed to register....<br>'$e)</script>";
                            exit();
                        }
                    }
                }
            }
        ?>
        <h2 class="text-center mb-3">Signup</h2>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter date of birth" required>
            </div>
            <div class="form-group col-md-6">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender">
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>
            </div>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <div class="form-group">
          <label for="confirmPassword">Confirm Password</label>
          <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block" id="register" name="register">Sign up</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>
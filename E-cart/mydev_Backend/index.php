<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");


include 'functions.php';
// Write POST handler for rest API to authenticate user


// Write POST handler for rest API to create user

$link = connect_db();

// Hander POST Parameters
$action = $_POST['action'];

// validate action
switch($action){
    case 'login':
        $username = $_POST['email'];
        $password = md5($_POST['password']);
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($link, $query);
        if(mysqli_num_rows($result) > 0){
            $arr = array('status' => 'success', 'message' => 'Login successful');
        }else{
            $arr = array('status' => 'error', 'message' => 'Invalid username or password');
        }

        break;
    case 'register':
        $username = $_POST['email'];
        $password = md5($_POST['password']);
        $phone = $_POST['phone'];

        $query = "INSERT INTO users (username, password, phone) VALUES ('$username', '$password', '$phone')";
        $result = mysqli_query($link, $query);
        if($result){
            $arr = array('status' => 'success', 'message' => 'User created successfully');
        }else{
            $arr = array('status' => 'error', 'message' => 'Error creating user');
        }
        
        break;
    default:
        $arr = array('status' => 'error', 'message' => 'Invalid action');
        break;
}
echo json_encode($arr);
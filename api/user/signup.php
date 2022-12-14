<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script type="text/JavaScript"> function go(){
 
def validacion(){
    if($user_arr[1]=true){
    alert("Registro Exitoso")
 }
 else{
    alert("ERROR")
 }
}

</script>
<body>
<?php
 
 // get database connection
 include_once '../config/database.php';
  
 // instantiate user object
 include_once '../objects/user.php';
  
 $database = new Database();
 $db = $database->getConnection();
  
 $user = new User($db);
  
 // set user property values
 $user->username = $_POST['username'];
 $user->password = $_POST['password'];
 $user->created = date('Y-m-d H:i:s');
  
 // create the user
 if($user->signup()){
     $user_arr=array(
         "status" => true,
         "message" => "Successfully Signup!",
         "id" => $user->id,
         "username" => $user->username
     );
 }
 else{
     $user_arr=array(
         "status" => false,
         "message" => "Username already exists!"

     );
 }
 print_r(json_encode($user_arr));
 ?>
</body>
</html>

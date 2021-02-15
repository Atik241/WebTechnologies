<?php
    $validateName="";
    $validateEmail="";
    $validateUserName="";
    $validatePassword="";
    $validateConfirmPassword="";
    $validateGender="";
    $validateDateOfBirth="";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_REQUEST['name'];
            $email = $_REQUEST['email'];
            $userName = $_REQUEST['un'];
            $password = $_REQUEST['password'];
            $confirmPassword = $_REQUEST['confirmPassword'];

            if(empty($name) || strlen($name)<5){
                $validateName="Please Enter a Valid Name";
            }
            else{
                $validateName=$name;
            }
            if(empty($email) || !preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email)){
                $validateEmail="Email Does NOT exist! Enter a Valid Email";
            }
            else{
                $validateEmail=$email;
            }
            if(empty($userName) || !preg_match('/[a-zA-Z0-9._]{5,}$/', $userName)){
                $validateUserName="Please enter a valid username";
            }
            else{
                $validateUserName=$userName;
            }
            if(empty($password) || strlen($password)<6 || !preg_match("/(?=.*[@#$%^&+=]).*$/", $password)){
                $validatePassword = "Password atleast contain 1 special character";
            }
            else{
                $validatePassword = $password;
            }
            if(!empty($confirmPassword) || $password == $confirmPassword){
                $validateConfirmPassword = $confirmPassword;
            }
            else{
                $validateConfirmPassword = "Please Check Your Password Again!";
            }
            

                 
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h1>Registration</h1>
    <table>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
    <tr>
        <td><label for ="name">Name: </label></td>
        <td><input type="text"  id="n" name="name"></td>
        <?php echo $validateName ?><br>
    </tr>
    <tr>
        <td><label for="email">Email: </label></td>
        <td><input type="text"  id="e" name="email"></td>
        <?php echo $validateEmail ?><br>
    </tr>  
    <tr>  
        <td><label for="userName">Username: </label></td>
        <td><input type="text"  id="m" name="un"></td>
        <?php echo $validateUserName ?><br>
    </tr>
    <tr>   
        <td><label for="password">Password: </label></td>
        <td><input type="password"  id="p" name="password"></td>
        <?php echo $validatePassword ?><br>
    </tr>
    <tr>   
        <td><label for="Confirmpassword">Confirm Password: </label></td>
        <td><input type="password"  id="cp" name="confirmPassword"></td>
        <?php echo $validateConfirmPassword ?><br>
    </tr>
    <tr>
    <td>Gender <br>
    <input type="radio" id="male" name="gender" value="male">
    Male
    <input type="radio" id="female" name="gender" value="female">
    Female
    <input type="radio" id="other" name="gender" value="other">
    Other</td>
    </tr>      
    <tr>
    <td>Date of Birth <br>  
    <input type="date" id="birthday" name="birthday"></td>
    </tr> 
    <tr>
    <td><input type="submit" value="SUBMIT">
    <input type="reset" value="RESET"></td>
    </tr>
    </form>
    </table>
</body>
</html>
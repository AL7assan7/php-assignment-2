<!DOCTYPE html>
<body>
    <?php

$relation = mysqli_connect('localhost','root','','mysql');

if( ! $relation){
    die("Error : ". mysqli_connect_errno());


}
    
else{
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        function filtar($input){
            $input = trim($input); 
            $input = htmlspecialchars($input); 
            $input = stripslashes($input); 
            $input = strip_tags($input);
            return $input;}

        // //$query= "SELECT * FROM user";
        $name = filtar($_POST['name']);
        $email = filtar($_POST['email']);
        $address = filtar($_POST['address']);
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        
        

        // $pattern = "/[10-30]/";


        if(empty($_POST['name'])){
            echo "the name field is empty!?";
        }elseif(empty($_POST['email'])){echo "the email field is empty!?";}
        elseif(empty($_POST['address'])){echo "the address field is empty!?";}

        elseif(empty($_POST['age'])){
            echo "the age field is empty!?";
        if($age > 20 && $age < 30){
            echo "Right Age";
        }else{echo "age only between 10 and 30";}
    }
        elseif(empty($_POST['gender'])){echo "the gender field is empty!?";}


        
        else{
        $query = "INSERT INTO students (name, email, address, age, gender)
        VALUES('$name', '$email', '$address', '$age', '$gender')";

        $result= mysqli_query($relation, $query);

        if($result){
            echo "insert successfully";

            
        }else{
            echo "Error Query!!";
        }}
    } 
        
    }


        
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>"
    method="POST">
    <p>User Name: <input type="text" name="name" placeholder=" your name"></p>
    <p>E-mail: <input type="email" name="email" placeholder=" your email"></p>
    <p>Address: <input type="text" name="address" placeholder=" Place of living"></p>
    <p>Age: <input type="text" name="age" placeholder=" your age"></p>
    <p>Gender: <input type="radio" name="gender" value="female">Female
               <input type="radio" name="gender" value="male">Male</p>
    

     <p><input type="submit" name="sumbit" value="Send"></p>

</form>
</body>
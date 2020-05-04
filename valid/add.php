<!DOCTYPE html>
<html>
<head>
	<title>form validation</title>
</head>
<body>
<?php 
$nameerr = $emailerr = $gendererr = $ageerr = "";
$name = $email = $gender = $age ="";

function test_input($data){
	$data= trim($data);
	$data= stripcslashes($data);
	$data= htmlspecialchars($data);
	return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["name"])){
    	$nameerr = "name is required";

    }	else{
    	$name = test_input($_POST["name"]);
    	if (!preg_match("/^[a-zA-Z]*$/",$name)) {
    		$nameerr="only letters and white space is allowed";
    		# code...
    	}
    }

    if (empty($_POST["email"])) {
    	$emailerr = "email is required";
    	# code...
    }  else{
    	$email = test_input($_POST["email"]);
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerr = "Invalid email format";
        }
    	
    }
           

    if (empty($_POST["age"])) {
    	$ageerr = "age is required";
    	# code...
    } else {
    	$age = test_input($_POST["age"]);
    }

    if (empty($_POST["gender"])) {
    	$gendererr = "gender is required";
    	# code...
    }else{
    	$gender = test_input($_POST["gender"]);
    }
   
    # code...
}
?>

	<h1 style="text-align: center;">first php form</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	Name: <input type="text" name="name">
	<span class="error">*<?php echo "$nameerr";?></span><br><br>
	Age: <input type="text" name="age">
	<span class="error">*<?php echo "$ageerr";?></span><br><br>
	E-mail: <input type="text" name="email">
	<span class="error">*<?php echo "$emailerr";?></span><br><br>
	Gender: <input type="radio" name="gender" value="female">female
	<input type="radio" name="gender" value="male">male
	<input type="radio" name="gender" value="others">other
	<span class="error">*<?php echo "$gendererr";?></span>
	<br><br>
	<input type="submit" name="submit" value="submit">
</form>
<?php  echo "<h2>Your Input:</h2>";
	echo $name;
	echo "<br>";
	echo $email;
	echo "<br>";
	echo $age;
	echo "<br>";
	echo $gender; 
	?>
</body>
</html>
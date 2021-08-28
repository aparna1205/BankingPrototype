<?php
include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="home.css"> 
</head>
<body>
<header class="header">
	<div class="header-left">
		<div class="logo"></div>
	</div>
	<div class="header-right">
	  <ul>
	    <li><a href="transactions.php"> &nbsp Transactions &nbsp </a></li>
	    <li><a href="profile.php"> &nbsp Account &nbsp </a></li>
	    <li><a href="index.php"> &nbsp Home &nbsp</a></li>
	  </ul>
	</div>
</header>
<div class="content"> 
	<form class="form" action="profile.php" method="post">
		<label>Select Your Name</label>
		<select id="name" name="user-name">
			 <option value="" disabled selected>Choose option</option>
			<option value="Aparna">Aparna</option>
			<option value="Keerthi Reddy">Keerthi Reddy</option>
			<option value="Pavani">Pavani</option>
			<option value="K.poojitha">K.poojitha</option>
			<option value="Kamal">Kamal</option>
			<option value="Charan Teja">Charan Teja</option>
			<option value="Vikramaditya">Vikramaditya</option>
			<option value="Sree vidya">Sree vidya</option>
			<option value="Shravani">Shravani</option>
			<option value="Shreeja">Shreeja</option>
		</select>
		<input name="selected_name" type="submit" class="btn button" value="Submit" required/><br>
	</form>
	<?php
	if(isset($_POST['selected_name'])){
	    if(!empty($_POST['user-name'])){
	        $selected = $_POST['user-name'];
          echo 'Welcome: ' . $selected;
        
	        $query="select * from user_info WHERE name='$selected'";
	        $query_run=mysqli_query($conn,$query);
	        //$username=$query_run('name');
	        //echo $username;
	        $row = mysqli_fetch_row($query_run);
         }
	    } 
        
	    //echo '<script type="text/javascript"> alert("Button clicked")</script>';
	   //$username=$_POST['selected_name'];
	   //echo "username";
	?>
     <div class=profile>
     	<h2>Profile</h2>
     	<div><span>Name :</span> <span><?php if(isset($_POST['selected_name'])){ echo $row[0];}?></span></div>
     	<div><span>Gmail_id :</span><span><?php if(isset($_POST['selected_name'])){echo $row[1];}?></span></div>
     	<div><span>account no :</span><span><?php if(isset($_POST['selected_name'])){ echo $row[2];}?></span></div>
     	<div><span>account balance :</span><span><?php if(isset($_POST['selected_name'])){echo $row[3];}?></span></div>
     </div>
     <form method="post" action="transactions.php"><label>Make a transaction :</label><input name="<?php if(isset($_POST['selected_name'])){ }?>" type="submit" value="send money"></div>
     </form>
</div>
<footer class="footer">
	<div class="footer-left">
	    <div class="logo"></div>
	</div>
	<div class="footer-right">
     <span>Thank you!</span>
     <span>Have a great day.</span> 
    </div>
</footer>
</body>
</html>
<?php
include('connection.php');?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="home.css"> 
</head>
<body class="body2">
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
    <div class=transaction>
      <h2>Make a transaction</h2>
        <form class="form" action="transactions.php" method="post">
         <label>Select Your Name :</label>
        <select id="name" name="user-name" required>
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
    </select><br>
         <label>Select Name :</label>
        <select id="name" name="reciever" required>
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
    </select><br>
        <label>Amount to be transfered :</label><input name="amount" type="text"placeholder="amount" required/><br>
        <input name="transaction" type="submit" class="btn button" value="send money" required/><br>
  </form>
  <?php
  if(isset($_POST['transaction'])){

          $selected = $_POST['user-name'];
            $reciever=$_POST['reciever'];
            $amount=$_POST['amount'];
          $query="select * from user_info WHERE name='$selected'";
          $query_run=mysqli_query($conn,$query);
     $row = mysqli_fetch_row($query_run);
          $query2="select * from user_info WHERE name='$reciever'";
          $query_run2=mysqli_query($conn,$query2);
     $row2 = mysqli_fetch_row($query_run2);
          $row2[3]=$row2[3]+$amount;
          $row[3]=$row[3]-$amount;
    if($row[3]>0){
                 $sql1 = "UPDATE user_info SET balance='$row2[3]' WHERE name='$reciever'";
                 $sql2 = "UPDATE user_info SET balance='$row[3]' WHERE name='$selected'";
                if ((mysqli_query($conn, $sql1))&&(mysqli_query($conn, $sql2))) {
                   } else {
                   echo "Error updating record: " . mysqli_error($conn);
                    }
                 $query3="insert into transaction_info values('$selected','$reciever','$amount')";
                 $query_run3=mysqli_query($conn,$query3);
                 echo '<script type="text/javascript"> alert("Transaction Succesfull redirecting to Transactions page")</script>';
           }
      else{
           echo '<script type="text/javascript"> alert("Entered Amount exceeded your balance)</script>';
      }
         
      } 
      ?>
    </div>
<p class="p"><b>All Recent Transactions</b></p>
<p class="transac"><?php
$sql = "SELECT sender, reciever, amount FROM transaction_info";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo  "Sender -". $row["sender"]." || ". " Receiver - " . $row["reciever"]." || "." Amount -     ".$row["amount"]."<br>";
    }
} else {
    echo "0 results";
}?>
</p>
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
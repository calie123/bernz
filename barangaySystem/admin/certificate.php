<?php  if(!isset($_SESSION)){session_start();}
        include_once("../connections/connection.php");
            $con = connection(); 
$sql = "SELECT * FROM tblcertificate ORDER BY id ASC ";
$result = mysqli_query($con, $sql);
?>
<?php if(isset($_SESSION['UserLogin'])){?>
    <link rel="stylesheet" href="../css/admin/navigation.css">
<?php include ("navsearch.php"); ?>

<div class="main-content">
<main>

<link rel="stylesheet" href="../../css/admin/button.css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<div class="wrapper">
  <center><h1>Requesting of barangay Ceftificate</h1></center>
  <br><br><br><br><br>
</div>
  <style>
    .container{
margin: 0 auto;
    }
        td,
th {
    border: 1px solid rgb(190, 190, 190);
    padding: 10px;
}

td {
    text-align: center;
    margin:  200px;
}

tr:nth-child(even) {
    background-color: #eee;
}

th[scope="col"] {
    background-color: #696969;
    color: #fff;
}

th[scope="row"] {
    background-color: #d7d9f2;
}

caption {
    border-radius: 10px;
    background: whitesmoke;
    padding: 10px;
    caption-side: top;
    font-weight: bold; 
    font-size: 20px;
}

table {
    width:100%;
    border-collapse: collapse;
    border: 2px solid rgb(200, 200, 200);
    letter-spacing: 1px;
    font-family: sans-serif;
    font-size: .8rem;
    
}
#request{
  background-color:green;
  color:white
}
  </style>
<div class="container">
  <div class="row">
    <div>
    </div>
    <div>
    <form id="go" action="certificate/brgy_certificate1.php">
      <button id="go">Request</button></form>
      <table>
      <thead>
        <tr>
        <th>Request Button</th>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Last Name</th>
          <th>Purok Address</th>
          <th>Years</th>
          <th>Months</th>
          <th>Request Date</th>
        </tr>
      </thead>
      <tbody id="output">
        
      <?php
      

if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		?>	 <tr>
        <td><a href="certificate/brgy_certificate.php?ID=<?php echo $row['id'];?>"><input type="button" id="request"  value="Request"></input></a></td>

            <td><?php echo $row['firstname'];?></td>
            <td><?php echo $row['middlename'];?></td>
            <td><?php echo $row['lastname'];?></td>
            <td><?php echo $row['purokno']; ?></td>
            <td><?php echo $row['years']; ?></td>
            <td><?php echo $row['month']; ?></td>
            <td id="email"><?php echo $row['requestdate']; ?></td>
            </tr>

				 
				
<?php }
}
else{ ?>
	 <tr><th colspan="9"><center>No Data Save</center></th></tr>
     <?php
}?>
        </tr>
      </tbody>
    </table>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#search").keypress(function(){
      $.ajax({
        type:'POST',
        url:'certificate/search.php',
        data:{
          name:$("#search").val(),
        },
        success:function(data){
          $("#output").html(data);
        }
      });
    });
  });
</script>
</main>
</div>

</body>
</html>
<?php }else { echo header("location: ../index.php"); }?>
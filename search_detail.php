<?php
require('includes/config.php');
 session_start();
	
	
	
	$s1=$_GET['s'];
	$s2=$_GET['price'];
	$s3=$_GET['ava'];
	$s4=$_GET['searchLang'];
	$s5=$_GET['searchAuthor'];
	$s6=$_GET['searchPublisher'];
	$s7=$_GET['searchISBN'];
	$query="select * from book where b_nm like '%$s1%' AND b_stt like '%$s3%' AND b_lang like '%$s4%' AND b_author like '%$s5%' AND b_publisher like '%$s6%' AND b_isbn like '%$s7%'";

	$query1="select * from book where b_nm like '%$s1%' AND b_stt like '%$s3%' AND b_lang like '%$s4%' AND b_author like '%$s5%' AND b_publisher like '%$s6%' AND b_isbn like '%$s7%' AND b_price < 20";

	$query2="select * from book where b_nm like '%$s1%' AND b_stt like '%$s3%' AND b_lang like '%$s4%' AND b_author like '%$s5%' AND b_publisher like '%$s6%' AND b_isbn like '%$s7%' AND b_price > 20 AND b_price < 40 ";

	$query3="select * from book where b_nm like '%$s1%' AND b_stt like '%$s3%' AND b_lang like '%$s4%' AND b_author like '%$s5%' AND b_publisher like '%$s6%' AND b_isbn like '%$s7%' AND b_price > 40";
	
	$res=mysqli_query($conn,$query) or die("Can't Execute Query...");
	$res1=mysqli_query($conn,$query1) or die("Can't Execute Query...");
	$res2=mysqli_query($conn,$query2) or die("Can't Execute Query...");
	$res3=mysqli_query($conn,$query3) or die("Can't Execute Query...");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<?php
			include("includes/head.inc.php");
		?>
</head>

<body>

			<!-- start header -->
				<div id="header">
					<div id="menu">
						<?php
							include("includes/menu.inc.php");
						?>
					</div>
				</div>
			<!-- end header -->
			
			<!-- start page -->
					<!-- start content -->
					<div id="page">
							<div id="content">
								<div class="post">
									<h1 class="title"><?php echo @$_GET['cat'];?></h1>
									<h1 style="font-size: 30px">Search results</h1>
									<div class="entry">
										<div style="min-height: 322px; background: white">
										<table border="0" width="100%" >
											<?php
												$count=0;
											
											if($s2==""){
												$num = mysqli_num_rows($res);
												if($num==0) {
													echo "<h1>Not found!</h1>";
													echo '<b><a href="request.php"> You can request book here.</a></b>';
												}
												
												while($row=mysqli_fetch_assoc($res))
												{
													if($count==0)
													{
														echo '<tr>';
													}
													
													echo '<td valign="top" width="25%" align="center" style="margin-right: 5px;">
													<div style="height:160px; margin-top:10px">
													<a href="detail.php?id='.$row['b_id'].'"><img src="'.$row['b_img'].'" width="100" height="140"><br></a>
													</div>
													<h4 style="font-weight:bolder; height:50px; width: 170px; font-size:16px">'.$row['b_nm'].'</h4>
													<h4 style="font-size:16px; color: #9999B2;text-align: center;font-stype:italic">'.$row['b_pbd'].'</h4>
													<h4 style="font-size:18px; color:red; text-align: center;font-weight:bolder">USD$'.$row['b_price'].'</h4>
													</td>';
													$count++;							
													
													if($count==4)
													{
														echo '</tr>';
														$count=0;
													}
												}
											}

											if($s2=="low"){
												$num = mysqli_num_rows($res1);
												if($num==0) {
													echo '<h1 style="margin-top: 20px">Not found!</h1>';
													echo '<b><a href="request.php"> You can request book here.</a></b>';
												}
												
												while($row=mysqli_fetch_assoc($res1))
												{
													if($count==0)
													{
														echo '<tr>';
													}
													
													echo '<td valign="top" width="25%" align="center" style="margin-right: 5px;">
													<div style="height:160px; margin-top:10px">
													<a href="detail.php?id='.$row['b_id'].'"><img src="'.$row['b_img'].'" width="100" height="140"><br></a>
													</div>
													<h4 style="font-weight:bolder; height:50px; width: 170px; font-size:16px">'.$row['b_nm'].'</h4>
													<h4 style="font-size:16px; color: #9999B2;text-align: center;font-stype:italic">'.$row['b_pbd'].'</h4>
													<h4 style="font-size:18px; color:red; text-align: center;font-weight:bolder">USD$'.$row['b_price'].'</h4>
													</td>';
													$count++;							
													
													if($count==4)
													{
														echo '</tr>';
														$count=0;
													}
												}
											}
										
											if($s2=="med"){
												$num = mysqli_num_rows($res2);
												if($num==0) {
													echo "<h1>Not found!</h1>";
													echo '<b><a href="request.php"> You can request book here.</a></b>';
												}
												while($row=mysqli_fetch_assoc($res2))
												{
													if($count==0)
													{
														echo '<tr>';
													}
													
													echo '<td valign="top" width="25%" align="center" style="margin-right: 5px;">
													<div style="height:160px; margin-top:10px">
													<a href="detail.php?id='.$row['b_id'].'"><img src="'.$row['b_img'].'" width="100" height="140"><br></a>
													</div>
													<h4 style="font-weight:bolder; height:50px; width: 170px; font-size:16px">'.$row['b_nm'].'</h4>
													<h4 style="font-size:16px; color: #9999B2;text-align: center;font-stype:italic">'.$row['b_pbd'].'</h4>
													<h4 style="font-size:18px; color:red; text-align: center;font-weight:bolder">USD$'.$row['b_price'].'</h4>
													</td>';
													$count++;							
													
													if($count==4)
													{
														echo '</tr>';
														$count=0;
													}
												}
											}
											
											if($s2=="high"){
												$num = mysqli_num_rows($res3);
												if($num==0) {
													echo "<h1>Not found!</h1>";
													echo '<b><a href="request.php"> You can request book here.</a></b>';
												}
												while($row=mysqli_fetch_assoc($res3))
												{
													if($count==0)
													{
														echo '<tr>';
													}
													
													echo '<td valign="top" width="25%" align="center" style="margin-right: 5px;">
													<div style="height:160px; margin-top:10px">
													<a href="detail.php?id='.$row['b_id'].'"><img src="'.$row['b_img'].'" width="100" height="140"><br></a>
													</div>
													<h4 style="font-weight:bolder; height:50px; width: 170px; font-size:16px">'.$row['b_nm'].'</h4>
													<h4 style="font-size:16px; color: #9999B2;text-align: center;font-stype:italic">'.$row['b_pbd'].'</h4>
													<h4 style="font-size:18px; color:red; text-align: center;font-weight:bolder">USD$'.$row['b_price'].'</h4>
													</td>';
													$count++;							
													
													if($count==4)
													{
														echo '</tr>';
														$count=0;
													}
												}
											}
											?>
											
										</table>
										</div>
									</div>
									
								</div>
								
							</div>
					<!-- end content -->
					
					<!-- start sidebar -->
							<div id="sidebar">
									<?php
										include("includes/side.inc.php");
									?>
							</div>
					<!-- end sidebar -->
					<div style="clear: both;">&nbsp;</div>
				</div>
			<!-- end page -->
			
				
			<!-- start footer -->
				<div id="footer">
							<?php
								include("includes/footer.inc.php");
							?>
				</div>
			<!-- end footer -->
</body>
</html>

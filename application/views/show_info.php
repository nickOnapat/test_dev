<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 header">
				Tourist Info
			</div>
			<div class="col-sm-12 btnadd">
				<a href="<?php echo site_url('add_info') ?>" class="btn btn-success">ADD</a>
			</div>
			<?php 
						$conn= mysqli_connect("localhost","root","","dev_test") or die("Error: " . mysqli_error($conn));
						mysqli_query($conn, "SET NAMES 'utf8' "); 
							$sql = "SELECT * FROM region";
							$query = mysqli_query($conn, $sql) or die ("ERROR : " . mysqli_error());
							while($row = mysqli_fetch_array($query)){
						$reID =  $row['ID'];?>
			<div class="col-sm-12 showdata">
				<?php echo $row['Name'] ?>
			</div>
                
			<?php $sql1 = "SELECT  *, a.ID as aid FROM `attraction` as a 
                INNER JOIN province AS p ON a.provinceID = p.ID
                INNER JOIN region AS r ON p.RegionID = r.ID
                WHERE r.ID = '$reID' ";
                            $query1 = mysqli_query($conn, $sql1) or die ("ERROR : " . mysqli_error());
                            $num = mysqli_num_rows($query1);
                            if($num > 0 ){
                                while($row1 = mysqli_fetch_array($query1)){ ?>
                                    
                                    <div class="col-sm-3 image">
                                    <a href="<?php echo site_url('update_info/update/').$row1['aid'] ?>">
                                        <img src="<?php echo base_url('img') ?>/<?php echo $row1['ImageURL'] ?>" width="80%" alt="">
                                        </a>
                                    </div>
                                    <div class="col-sm-1"></div>
                                    
                        
                              <?php       } 
                            }else{ ?>
                            <div class="col-sm-12" style="text-align: center;margin-top: 20px;font-size: 20px">
                                NO DATA
                            </div>
                            <?php } ?>
							

			<?php } ?>
		</div>
	</div>
</body>

</html>

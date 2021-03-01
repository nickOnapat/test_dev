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
			<form action="<?php echo site_url('update_info/update_info') ?>" method="post" enctype="multipart/form-data">
				<div class="col-sm-12 header">
					Tourist Info
				</div>
				<div class="col-sm-12 showdata">
					Tourist Info
				</div>
				<div class="col-sm-12 forminput">
					Province :
				</div>
				<div class="col-sm-12 forminput">
					<select name="province" required id="" class="form-control">
						<option value="<?php echo $edit->provinceID; ?>"><?php echo $edit->pname; ?></option>
						<?php 
						$conn= mysqli_connect("localhost","root","","dev_test") or die("Error: " . mysqli_error($conn));
						mysqli_query($conn, "SET NAMES 'utf8' "); 
							$sql = "SELECT * FROM province";
							$query = mysqli_query($conn, $sql) or die ("ERROR : " . mysqli_error());
							while($row = mysqli_fetch_array($query)){
						?>
						<option value="<?php echo $row['ID'] ?>">--<?php echo $row['Name'] ?>--</option>
							<?php } ?>
					</select>
				</div>
				<div class="col-sm-12 forminput">
					Type :
				</div>
				<div class="col-sm-12 forminput">
					<select name="type" required id="" class="form-control">
						<option value="<?php echo $edit->RegionID; ?>"><?php echo $edit->rname; ?></option>
						<?php 
							$sqytype = "SELECT * FROM attraction_type";
							$querytype = mysqli_query($conn, $sqytype) or die ("ERROR : " . mysqli_error());
							while($row = mysqli_fetch_array($querytype)){
						?>
						<option value="<?php echo $row['ID'] ?>">--<?php echo $row['Name'] ?>--</option>
						<?php } ?>
					</select>
				</div>
				<div class="col-sm-12 forminput">
					Name :
				</div>
				<div class="col-sm-12 forminput">
					<input type="text" required name="name" style="width: 100%;padding: 5px" value="<?php echo $edit->aname; ?>">
				</div>
				<div class="col-sm-12 forminput">
					Description :
				</div>
				<div class="col-sm-12 forminput">
					<textarea name="description" required rows="5" cols="40" class="form-control" ><?php echo $edit->Description; ?></textarea>
				</div>
				<div class="col-sm-12 forminput">
					<img src="<?php echo base_url('./img/').$edit->ImageURL ?>" alt="" height="200px">
				</div>
				<div class="col-sm-12 forminput">
					Image Url :
				</div>
				<div class="col-sm-12 forminput">
					<input type="file" name="img" class="form-control" accept="image/*" >
					<input type="hidden" name="aid" value="<?php echo $edit->aid; ?>">
				</div>
                <div class="col-sm-12 forminput btncon">
                    <input type="submit" class="btn btn-success" value ="Add">
                    <a href="<?php echo site_url('show_info') ?>" class="btn btn-danger" style="margin-left: 20px">Back</a>
                </div>
			</form>
		</div>
	</div>
</body>

</html>


	 


<!doctype html>
<html>
<head>
	<title> Form Validation with php </title>
	<style>
		.form-validaton{
			width: 450px;
			margin:0 auto;
			background: #ddd;
			padding 20px 50px;
			box-sizing: border-box;
		}
		#table{padding-left:50px; padding-bottom: 20px;}
		.label{
			float: left;
			width: 100%;
			font-size:16px;
			font-weight:bold;
			padding-top:10px;
		}
		.text{
			float:left;
			width:300px;
			height:30px;
			padding:5px;
			box-sizing:border-box;
		}
		.row{
			float:left;
			width:100%;
			margin-bottom:5px;
		}
		h2{
			text-align:center;
			 
			padding-top:20px;
		}
		.btn{
			float:right;
			padding:10px 15px;
			font-size: 16px;
			text-transform:  uppercase;
			font-weight: bold;
			color:#555;
			border: 1px solid #eee;
			background: #fff;
		}
		.error{
			color:#cc0000;
			padding-top: 5px;
			float:left;
			width:100%;
		}
	</style>
</head>

<?php
 require 'vendor/autoload.php';
 use Intervention\Image\ImageManagerStatic as Image;

	if(isset($_POST['submit'])){
		 //echo "<pre>";
		 //print_r($_POST);
		$height = $_POST['height'];
		$width=$_POST['width'];
		$email=$_POST['email'];
		$picture = $_FILES['picture']['name'];

		
		//$bio_file_name = $email.".txt";
		//$fopen = fopen("biography/".$bio_file_name,"w");
		//fwrite($fopen,$biography);
		
		 if($picture){
			 $randomNumber = rand().rand().rand();
			 $ext = substr($_FILES['picture']['name'],-4);
			 $img_name=$randomNumber."$ext";
			 //$randomNumber2 = rand().rand();
			 $new_img_name=$email."$ext";
		 
			move_uploaded_file($_FILES['picture']['tmp_name'],'img/'.$img_name);
		
		
		 $image = Image::make('img/'.$img_name)->resize($height,$width)->save('img /'.$new_img_name,100);
		
		 }else{echo "<h1 style='color:red; text-align:center;'>There is no picture </h1>";}
		
	}
?>
 
 
<body>
	<div class="form-validaton">
		<h1 style="color:green; text-align:center"> Resize Your Image	</h1>
		<form action="" method="post" enctype="multipart/form-data">
			<table id="table">
				<tr class="row">
					<td><label for="height">Height</td>
					<td> <input class="text" type="number" id="height" name="height" placeholder="height"  > (Px)</td>
				</tr>
				<tr class="row">
					<td><label for="width"> Width</td>
					<td> <input class="text" type="number" id="width" name="width" placeholder="width"  > (Px)</td>
				</tr>
				 
				<tr class="row">
					 <td><label for="email">Email</td>
					<td> <input class="text" type="email" id="email" name="email" placeholder="Email"  ></td>
				</tr> 
				 
				<tr class="row">
					<td>Upload your image: <input type="file" name="picture"> </td>
				</tr>
				 
				<tr class="row">
					<td> <button type="submit" name="submit" value="submit">Resize </button> </td>
				</tr>
			</table>
			 <?Php  if(isset($new_img_name)){echo "<img src=img/".$new_img_name." style='padding-left:40px;padding-bottom:40px;'>";}?>
		</form>
	</div>
	
	 
</body>
</html>
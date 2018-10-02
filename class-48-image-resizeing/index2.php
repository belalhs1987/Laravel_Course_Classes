
	 


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
			text-transform: uppercase;
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
		 
		$picture = $_FILES['picture']['name'];

		 if($picture){
			 $randomNumber = rand().rand().rand();
			 $ext = substr($_FILES['picture']['name'],-4);
			 $img_name=$randomNumber."$ext";
			 $randomNumber2 = rand().rand();
			 $new_img_name=$randomNumber2."$ext";
		 
			move_uploaded_file($_FILES['picture']['tmp_name'],'original_image/'.$img_name);
		
		
		 $image = Image::make('original_image/'.$img_name)->resize(1000,1000)->save('image_1000_1000 /'.$new_img_name,100);
		 $image = Image::make('original_image/'.$img_name)->resize(500,500)->save('image_500_500 /'.$new_img_name,100);
		 $image = Image::make('original_image/'.$img_name)->resize(300,300)->save('image_300_300 /'.$new_img_name,100);
		 $image = Image::make('original_image/'.$img_name)->resize(100,100)->save('image_100_100 /'.$new_img_name,100);
		
		 }else{echo "<h1 style='color:red; text-align:center;'>There is no picture </h1>";}
		
	}
?>
 
 
<body>
	<div class="form-validaton">
		<h2> Resize your image	</h2>
		<form action="" method="post" enctype="multipart/form-data">
			<table id="table">
				<tr class="row">
					<td>Upload your image: <input type="file" name="picture"> </td>
				</tr>
				 
				<tr class="row">
					<td> <button type="submit" name="submit" value="submit">Resize </button> </td>
				</tr>
			</table>
			  
		</form>
	</div>
	
	 
</body>
</html>
<html dir=ltr lang=ua>
<head>
<meta charset=UTF-8 />
</head>
<?php 
require_once('includes/config.php');
require_once('includes/connect.php');

$sql_main = 'SELECT category_id, category_name FROM categories WHERE parent_id IS NULL';
$result = mysqli_query($conn, $sql_main);
while($row = mysqli_fetch_array($result))
{
	
	echo $row['category_id'].' -  '.$row['category_name'].'<br>';
	$sql_insert_main = 'INSERT INTO oc_category SET category_id = "'.$row['category_id'].'", parent_id=0, top=1, status = 1';
	mysqli_query($conn, $sql_insert_main) or die (mysqli_error($conn));
	
	$sql_insert_main_desc = 'INSERT INTO oc_category_description SET category_id = '.$row['category_id'].', language_id=1, name = "'.$row['category_name'].'"';
	mysqli_query($conn, $sql_insert_main_desc) or die (mysqli_error($conn));
	
	$sql_insert_main_pass = 'INSERT INTO oc_category_path SET category_id = '.$row['category_id'].', path_id=0, level =0';
	mysqli_query($conn, $sql_insert_main_pass) or die (mysqli_error($conn));
	
	$sql_insert_main_pass = 'INSERT INTO oc_category_path SET category_id = '.$row['category_id'].', path_id='.$row['category_id'].', level =0';
	mysqli_query($conn, $sql_insert_main_pass) or die (mysqli_error($conn));
	
	$sql_insert_main_store = 'INSERT INTO oc_category_to_store SET category_id = '.$row['category_id'];
	mysqli_query($conn, $sql_insert_main_store) or die (mysqli_error($conn));
	
	$sql_insert_main_layout = 'INSERT INTO oc_category_to_layout SET category_id = '.$row['category_id'];
	mysqli_query($conn, $sql_insert_main_layout) or die (mysqli_error($conn));


			$sql_sub = 'SELECT category_id, category_name FROM categories WHERE parent_id = '.$row['category_id'];
			$result_sub = mysqli_query($conn, $sql_sub);
			while($row_sub = mysqli_fetch_array($result_sub))
			{
	
			echo $row_sub['category_id'].' -  '.$row_sub['category_name'].'<br>';
			$sql_insert_sub = 'INSERT INTO oc_category SET category_id = "'.$row_sub['category_id'].'", parent_id='.$row['category_id'].', status = 1';
			mysqli_query($conn, $sql_insert_sub) or die (mysqli_error($conn));
	
			$sql_insert_sub_desc = 'INSERT INTO oc_category_description SET category_id = '.$row_sub['category_id'].', language_id=1, name = "'.$row_sub['category_name'].'"';
			mysqli_query($conn, $sql_insert_sub_desc) or die (mysqli_error($conn));
	
			$sql_insert_sub_pass = 'INSERT INTO oc_category_path SET category_id = '.$row_sub['category_id'].', path_id=0, level =0';
			mysqli_query($conn, $sql_insert_sub_pass) or die (mysqli_error($conn));
	
			$sql_insert_sub_pass = 'INSERT INTO oc_category_path SET category_id = '.$row_sub['category_id'].', path_id='.$row_sub['category_id'].', level =1';
			mysqli_query($conn, $sql_insert_sub_pass) or die (mysqli_error($conn));
			
			
			$sql_insert_sub_pass = 'INSERT INTO oc_category_path SET category_id = '.$row_sub['category_id'].', path_id='.$row['category_id'].', level =0';
			mysqli_query($conn, $sql_insert_sub_pass) or die (mysqli_error($conn));
			
	
			$sql_insert_sub_store = 'INSERT INTO oc_category_to_store SET category_id = '.$row_sub['category_id'];
			mysqli_query($conn, $sql_insert_sub_store) or die (mysqli_error($conn));
	
			$sql_insert_sub_layout = 'INSERT INTO oc_category_to_layout SET category_id = '.$row_sub['category_id'];
			mysqli_query($conn, $sql_insert_sub_layout) or die (mysqli_error($conn));





	}
}
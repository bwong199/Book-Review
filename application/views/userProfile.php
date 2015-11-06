<html>
<head>
	<title>Book Review</title>
<style type="text/css">
	a{
		display:inline-block;
		margin:10px;
	}	


	#link{
		
		margin-left: 1300px;
	}

	body{
		margin-left: 50px;
	}
	
</style>
</head>
<body>

<div id='link'> 

<a href="<?= base_url('/books/home') ?>">Home</a> 

<a href="<?= base_url('/books/add') ?>">Add Book and Reviews </a> 

<a href="<?= base_url('/books/logout') ?>">Log out</a> 

</div> 

<p> User Alias:  <?php echo $userProfile[0]['alias']  ?> </p> 

<p> Name:  <?php echo $userProfile[0]['name']  ?> </p> 

<p> Email:  <?php echo $userProfile[0]['email']  ?> </p> 

<?
	$sum = COUNT($userProfile);

?>

<p> Total reviews:  <?php echo $sum ?>   </p> 

<h2> Posted Reviews on the following books </h2> 

<?
	foreach ($userProfile as $x)
	{
?>

<a href = "<?= base_url('books/show/').$x['title']; ?>" ><?		echo $x['title']; ?> </a>
<br>
<?	}

?>

</body>
</html>
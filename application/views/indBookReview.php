<html>
<head>
	<title>Book Review</title>
<style type="text/css">

	a{
		text-decoration: none;
		margin: 5px;
	}

	#link{
		margin-left: 1100px;
	}
</style>
</head>
<body>

<div id="link"> 

<a href="<?= base_url('/books/home') ?>">Home</a> 
<a href='Books/add'>Add Book and Reviews </a> 
<a href="<?= base_url('/books/logout') ?>">Logout</a>

</div> 

<h2> <?php if(!(empty($book)))
 { echo $book[0]['title'] ;
}
?> </h2> 

<h2> 
 	Author: <?php 
if(!(empty($book)))
{
 	echo $book[0]['author'];
}
 	?> 
</h2> 

 	<form action="<?= base_url('/books/addNewReview') ?>" method="post">

 	<label for="addReview">Add a Review:  </label>
 	<br>

	<textarea rows="4" cols="50" name="review"> </textarea>

	<input type="hidden" name="title" value="<?php if(!(empty($book)))
{echo $book[0]['title'] ;}?>">

	<input type="hidden" name="author" value="<?php if(!(empty($book)))
{echo $book[0]['author'] ;}?>">

	<input type="hidden" name="users_id" value="<?php if(!(empty($book)))
{ echo $book[0]['user_id'] ;} ?>">

	<br>

	<select name="ratings">
	  <option value="5">5 stars</option>
	  <option value="4">4 stars</option>
	  <option value="3">3 stars</option>
	  <option value="2">2 stars</option>
	  <option value="1">1 stars</option>
	  <option value="0">0 star</option>
	</select>

	<br>
	<input type="submit" value="Submit Review">
	</form>

 <h3> Reviews: </h3> 

 <hr>

 <p> <?php  

 		if(!(empty($book)))
 		{
 		foreach ($book as $x)
{
?>
 		<h3> Rating: <?php echo $x['rating'] ?> </h3>

 		
		<a href="<?= base_url('/books/userProfile/'); ?>"> <?php echo $x['name'] ?>  </a> says <?php echo $x['review'] ?> 

		 <br>
		 <br>

 		 Posted on <?php echo date("M-d-Y", strtotime($x['created_at'])) ?> 

		<hr>

<?php 


$userinfo = ($this->session->userdata('user')); 


if ($userinfo['user_id'] == $x['user_id'])
{

?>

	<form action="<?= base_url('/books/deleteReview') ?>" method="post">
	
	<input type="hidden" name="reviewID" value="<?php echo $x['reviews_id']; ?>">
	
	<input type="hidden" name="reviewID" value="<?php echo $x['reviews_id']; ?>">

	<input type="submit" value="Delete">

	</form> 

<?php
} 
}
?>  
<?php
 }		
 ?> <p>














</body>
</html>
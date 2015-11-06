<html>
<head>
	<title>Login and Registration</title>
<style type="text/css">
	a{
		display:inline-block;
		margin:10px;
		text-decoration: none;
	}	

#link{
		margin-left: 1100px;

	}
</style>
</head>
<body>
<?php
	if($this->session->flashdata('errors'))
	{
		$errors = implode(",",  ($this->session->flashdata('errors')));
 
		echo $errors; 
	}

?>
<div id="link"> 

<a href="<?= base_url('/books/Home') ?>">Home </a> 

<a href="<?= base_url('/books/logout') ?>">Logout</a> 

</div> 

<h1> Add a New Book Title and a Review  </h1> 


<form action="<?= base_url('/books/createReview') ?>" method="post">
	<label for="title">Book Title: </label>
	<input type="text" name="title"> 
	<br>
	<br>

	<label for="author">Author: </label>
	<input type="text" name="author"> 
	<br>

	<br>
	<label for="review">Review: </label>
	<textarea rows="4" cols="50" name="review"> </textarea>
	<br>
	<br>
	
	<select name="ratings">
	  <option value="5">5 stars</option>
	  <option value="4">4 stars</option>
	  <option value="3">3 stars</option>
	  <option value="2">2 stars</option>
	  <option value="1">1 stars</option>
	  <option value="0">0 star</option>
	</select>

	<input type="submit" value="Add Book and Review">

</form> 

</body>
</html>
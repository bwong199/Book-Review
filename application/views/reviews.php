<html>
<head>
	<title>Book Review</title>
<style type="text/css">
	a{
		display:inline-block;
		margin:10px;
		text-decoration: none;
	}	

	#link{
		margin-left:1200px;
	}

	#column1, #column2{
		display:inline-block;
		margin:10px;
		vertical-align: top;
	}

	#column1{
		margin-left: 100px;

	}

	#column2{
		margin-left: 600px;
		border: solid black;
		padding: 25px;
	}

</style> 

</head>
<body>

<div id="link">
 <a href="<?= base_url('/books/add') ?>">Add Book and Reviews </a>

<a href="<?= base_url('/books/logout') ?>">Logout</a> 


</div> 
<h1> Welcome, <?php $userinfo = ($this->session->userdata('user')); 
echo $userinfo['user_name']; ?>  </h1>



<div id='column1'>
 <h2> Recent Book Reviews: </h2> 


 <?php  


 if(!(empty($reviews)))
 {
 	foreach ($reviews as $review)


 {

 ?>	
 
 		 <a href = "<?= base_url('books/show/').$review['title']; ?>" > <? echo $review['title'] ?> </a> 

 		 <br>

 		 Rating: <? echo $review['rating'] ?> 

 		 <br>

 		 <a href="<?= base_url('/books/userProfile/'); ?>"> <? echo $review['name'] ?> </a> says <? echo $review['review'] ?> 

 		 <br>
 		 <br>
 		 <br>
<?php
}
}

 ?> 

</div> 
<div id='column2'>

 <h2> Other Books with Reviews </h2> 

<?php 

foreach ($allReviews as $allReview)
{
?>
	<a href = "<?= base_url('books/show/').$allReview['title']; ?>" > <? echo $allReview['title']."<br>"; ?> </a> 
	<br>
<?
}
?>

</div>
</body>
</html>
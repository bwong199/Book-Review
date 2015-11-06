<html>
<head>
	<title>Quotes</title>
<style type="text/css">
	#login{
		display:inline-block;
		vertical-align: top;
		border:solid black;
		width: 300px;
		height:250px;
		padding:20px;
	}


	#register{
		display:inline-block;
		vertical-align: top;
		border:solid black;
		width: 300px;
		height:250px;
		padding:20px;
	}
</style>
</head>
<body>

<h1> Welcome! </h1> 

<?php 

if($this->session->flashdata('success'))
{
  echo $this->session->flashdata('success');
}
  

if($this->session->flashdata('errors'))
{
  foreach (($this->session->flashdata('errors')) as $x)
  echo $x;
}


if($this->session->flashdata("login_error"))
{
  echo $this->session->flashdata('login_error');
}
 
?>
<div id="register"> 
<h2> Register </h2> 

<form action="<?= base_url('/books/create') ?>" method="post">
	<label for="name">Name: </label>
	<input type="text" name="name"> 
	<br>
	<label for="alias">Alias: </label>
	<input type="text" name="alias"> 
	<br>
	<label for="email">Email: </label>
	<input type="text" name="email"> 
	<br>
	<label for="password">Password: </label>
	<input type="text" name="password"> 
	<br>
	*Password should be at least 8 characters
	<br>
	<label for="password_confirmation">Confirm PW: </label>
	<input type="text" name="password_confirmation"> 
	<br>
	<input type="submit" value="Register">
</form> 
</div> 


<div id="login"> 
<h2> Login </h2> 
 <form action="<?= base_url('/books/login') ?>" method="post">
	<label for="email">Email: </label>
	<input type="text" name="email"> 
	<br>

	<label for="password">Password: </label>
	<input type="text" name="password"> 
	<br>
	<br>

	<input type="submit" value="Login">

</form> 
</div> 

<?php
	$this->input->post();

?>

</body>
</html>
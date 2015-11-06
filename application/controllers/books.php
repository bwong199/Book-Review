<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {

	// public function __construct(){
	// 	parent::__construct();
	// 	$this->output->enable_profiler();
	// }

	public function index()
	{
		$this->load->view('index');
	}

  public function home(){
    $this->load->model('Book');

    $userinfo = ($this->session->userdata('user')); 

    $id = $userinfo['user_id'];

    $data['reviews']  = $this->Book->showRecentReviews($id);

    $data['allReviews']  = $this->Book->getAllReviews(); 

    $this->load->view('reviews', $data);
  }


  public function getBook($id){
    $this->load->model('Book');

    $data['bookData'] = $this->Book->getBook($id);

    $this->load->view('indBookReview',$data);
  }

	public function create(){
  	 $this->load->model('Book');
      $result = $this->Book->validate($this->input->post());

      if($result == "valid") {
        $id = $this->Book->create($this->input->post());
        $success[] = 'Welcome! Registration was successful!';
        $this->session->set_flashdata('success', $success);
        redirect('/books/show/' . $id);
      } else {
        $errors = array(validation_errors());
        $this->session->set_flashdata('errors', $errors);
        redirect('/');
      }
	}

  public function show($title){
    $newTitle = str_replace("%20", " ", $title);

    $this->load->model('Book');

    $data['book'] = $this->Book->getBook($newTitle);
      
    $this->load->view('indBookReview',$data);
  }

  public function login(){
    $email = $this->input->post('email');

    $password = $this->input->post('password');

    $this->load->model('Book');
    $user = $this->Book->login_user($email);

    if($user && $user['password'] == $password)
    {
        $info = array(
           'user_id' => $user['id'],
           'user_name' => $user['name'],
           'user_alias' => $user['alias'],
           'user_email' => $user['email'],
           'is_logged_in' => true
        );

        $this->session->set_userdata('user',$info);
        redirect("/Books/home");
    }
    else {
        $this->session->set_flashdata("login_error", "Invalid email or password!");
        redirect("/Books/index");
    }
  }

    public function profile(){
      $this->load->model('Book');

      $userinfo = ($this->session->userdata('user')); 

      $id = $userinfo['user_id'];

      $data['reviews']  = $this->Book->showRecentReviews($id); 

      $this->load->view('reviews', $data);
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect("/books/index");   
    }

    public function add(){
        $this->load->view('add');
    }

    public function createReview(){
      $userinfo = ($this->session->userdata('user')); 
      $this->load->model('Book');
      $result = $this->Book->validateReview(($this->session->userdata('user')));
      if($result == "valid") {
          $review = array("title"=>$this->input->post('title'),
          "author"=>$this->input->post('author'), "review"=>$this->input->post('review'),
          "ratings"=>$this->input->post('ratings'), "users_id"=>$userinfo['user_id'], "date_created"=>date("Y-m-d, H:i:s"));

      $this->Book->addReview($review);

      $book = $this->input->post('title');

      $data['book']  = $this->Book->showBookReview($book); 

      $this->load->view('indBookReview', $data);

      redirect('/books/home');
       
      } else {
        $errors = array(validation_errors());
        $this->session->set_flashdata('errors', $errors);
        redirect('/books/add');
      }
    }

    public function addNewReview(){
      $this->load->model("Book");

      $userinfo = ($this->session->userdata('user'));

      $newReview = array("title"=>$this->input->post('title'),
        "author"=>$this->input->post('author'), "review"=>$this->input->post('review'),
        "ratings"=>$this->input->post('ratings'), "users_id"=>$userinfo['user_id'], "date_created"=>date("Y-m-d, H:i:s"));

       
      $this->Book->addNewReview($newReview);

       $newTitle = $this->input->post('title');

       $data['book'] = $this->Book->getBook($newTitle);
        

      $this->load->view('indBookReview',$data);
  }

    public function display(){
      $newTitle = $this->input->post('title');

      $this->load->model('Book');

      $data['book'] = $this->Book->getBook($newTitle);
        
      $this->load->view('indBookReview',$data);
    }

    public function deleteReview(){
      $this->load->model("Book");

      $reviewID = $this->input->post('reviewID');


      $this->Book->delete_review_by_id($reviewID);

      $this->load->view('indBookReview');
    }

    public function userProfile()
    {
      $this->load->model("Book");

      $userinfo = ($this->session->userdata('user')); 

      $id = $userinfo['user_id'];

      $data['userProfile'] = $this->Book->showUserProfile($id); 

      $this->load->view('userProfile', $data);
    }
}


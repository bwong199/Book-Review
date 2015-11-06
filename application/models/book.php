<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Model {

	public function create($post){
		$query = "INSERT INTO users (name, alias, email, password, created_at)
		VALUES(?,?,?,?,?)";
		$values = array($post['name'], $post['alias'], $post['email'],
			$post['password'], date("Y-m-d, H:i:s"));
		$id = $this->db->insert_id($this->db->query($query, $values));
		return $id;
	}

	public function find($id){
		return $this->db->query("SELECT * FROM users WHERE id = ?", array($id))->row_array();
	}

	public function validate($post){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "Name", "trim|required");
		$this->form_validation->set_rules('alias', 'Alias', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[password_confirmation]');
		$this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'trim|required');

		if($this->form_validation->run()){
			return "valid";

		} else{
			return array(validation_errors());
		}
	}

	public function validateReview($post){
		$this->load->library("form_validation");
		$this->form_validation->set_rules('title', 'Title', 'trim|required|is_unique[reviews.title]');
		$this->form_validation->set_rules('author', 'Author', 'trim|required');
		
		$this->form_validation->set_rules('ratings', 'Password Confirmation', 'trim|required');

		if($this->form_validation->run()){
			return "valid";

		} else{
			return array(validation_errors());
		}
	}


	public function login_user($email){
		return  $this->db->query("SELECT * FROM users WHERE users.email = ?", array($email))->row_array();
	}

	public function addReview($review){	
		$this->load->library("form_validation");
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');

		$query = "INSERT INTO reviews (title, author, review, rating, users_id, date_created)
		 					VALUES(?, ?, ?, ? ,?, NOW())";

		$values = array($review['title'], $review['author'], $review['review'], $review['ratings'], $review['users_id'], $review['date_created'] ); 
				
		return $this->db->query($query, $values);
	}

	public function addNewReview($newReview){	

	$query = "INSERT INTO reviews (title, author, review, rating, users_id, date_created)
	 					VALUES(?, ?, ?, ? ,?, NOW())";

	$values = array($newReview['title'], $newReview['author'], $newReview['review'], $newReview['ratings'], $newReview['users_id'], $newReview['date_created'] ); 
			
	return $this->db->query($query, $values);

	}

	public function showRecentReviews($id){
		return $this->db->query("SELECT * FROM reviews LEFT JOIN users on reviews.users_id = users.id WHERE users_id = ?  ORDER BY reviews.id DESC LIMIT 3 ", array($id))->result_array();
	}

	public function showBookReview($book){
		return $this->db->query("SELECT reviews.id as reviews_id, reviews.title , reviews.author, reviews.rating, reviews.review, users.name, users.created_at, users.id FROM reviews LEFT JOIN users on users.id = reviews.users_id WHERE reviews.title = ? ORDER BY reviews.id DESC LIMIT 5", array($book))->result_array();
	}


	public function showUserProfile($id){
		return $this->db->query("SELECT * FROM reviews LEFT JOIN users on users.id = reviews.users_id WHERE reviews.users_id = ? ", array($id))->result_array();
	}

	public function getAllReviews(){
		return $this->db->query("SELECT * FROM reviews ORDER BY id DESC ")->result_array();
	}

	public function getBook($newTitle){
		return $this->db->query("SELECT reviews.id as reviews_id, reviews.title , reviews.author, reviews.rating, reviews.review, users.name, users.created_at, users.id as user_id FROM reviews LEFT JOIN users on users.id = reviews.users_id WHERE reviews.title = ? ORDER BY reviews.id DESC", array($newTitle))->result_array();
	}

	public function delete_review_by_id($id)
	{
		return $this->db->query("DELETE FROM reviews WHERE reviews.id = ?", array($id));
	}
}
<?php 
/**
* ENTITE Message
*/

class Message extends Entity
{	
	private $_id, $_name, $_email, $_subject, $_contentMessage;

	// FUNCTIONS GET
	public function getId(){return $this->_id;}
	public function getName(){return $this->_name;}
	public function getEmail(){return $this->_email;}
	public function getSubject(){return $this->_subject;}
	public function getContentMessage(){return $this->_contentMessage;}

	//FUNCTIONS SET
	public function setId($id){
		$this->_id = $id;
	}

	public function setName($name){
		$this->_name = $name;
	}

	public function setEmail($email){
		$this->_email = $email;
	}

	public function setSubject($subject){
		$this->_subject = $subject;
	}

	public function setContentMessage($contentMessage){
		$this->_contentMessage = $contentMessage;
	}
}
 ?>
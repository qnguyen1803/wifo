<?php 
/**
* class Message Manager
*/
class Message_m extends Model{
	/**
	* Fontion pour ajouter les nouveau message à la BDD
	* @param Message $message
	* 
	*/
	public function add(Message $message){
		$q = $this->pdo->prepare("INSERT INTO message(name, email, subject, contentMessage) VALUES (:name, :email, :subject, :contentMessage)");
		$q->bindValue(':name', $message->getName(), PDO::PARAM_STR);
		$q->bindValue(':email', $message->getEmail(), PDO::PARAM_STR);
		$q->bindValue(':subject', $message->getSubject(), PDO::PARAM_STR);
		$q->bindValue(':contentMessage', $message->getContentMessage(), PDO::PARAM_STR);
		$q->execute();

		$message->hydrater(['id' => $this->pdo->lastInsertId()]);
		$q->closeCursor();
	}
} // fin class
?>
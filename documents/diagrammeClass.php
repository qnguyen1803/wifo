<?php 
//Controller
class Controller{
	function view()
	function model()
}

	class Accueil_c extends Controller{
		function viewIndex()
		function viewContact()
		function viewNousContacter()
		function viewCopyleft()
		function viewAPropos()
	}

	class NousContacter_c extends Controller(){
		function sendMessage()
	}

	class Utilisateur_c extends Controller{
		function inscription()
		function connexion()
		function mdpOublie()
		function sendMail()
		function confirmCompte()
		function connexion()
		function connexionCookies()
		function deconnexion()
	}

	class Profil_c extends Controller{
		function modifierProfil()
		function profil()
		function ajoutAvatar()
		function favoriAjax()
	}

	class Commentaire_c extends Controller{
		function ajouterCommentaire()
		function repondsCommentaire()
	}

	class Recherche_c extends Controller{
		function searchImage()
		function searchProjet()
		function searchAuteur()
	}

	class Admin_c extends Controller{
		function viewBannir()
		function bannirAjax()
		function viewIndex()
		function viewListProjets()
		function viewListImages()
		function effacerProjet()
		function effacerImage()
		function effacerCommentaire()
	}


	class Demande_c extends Controller{
		function addDemande()
		function repondDemande()
	}

	class Image_c{
		function viewCatalogueImages()
		function viewImage()
		function downloadImage()
		function calculNote()
	}

	class Projet_c{
		function viewCatalogueProjet()
		function viewProjet()
		function compteur()
		function candidater()
	}
	
	class Upload_c{
		function viewUpload()
		function checkPathFile()
		function uploadFile()
		function checkErrorImport()
	}

//Model
class Model{
	protected $pdo;
	protected $modelName;
	protected $className;

	public function __contruct($pdo);
	public function get($info)
	public function getList($nom)
	public function add($className $objet)
	public function update($className $objet)
	public function delete($className $objet)
	public function exists($info)
	public function count()
}

	class Admin_m{}
	class Categorie_m{}
	class Commentaire_m{}
	class Image_m{}
	class Projet_m{}
	class Utilisateur_m{}
	class Demande_m{}


//Entities
	class Admin{
		private $_id, $_nom, $_prenom, $_pseudo, $_mdp, $_email;

		public function getId()
		public function getNom()
		public function getPrenom()
		public function getPseudo()
		public function getMdp()
		public function getEmail()
		public function getSexe()
		public function getFavori()
		public function getTelephone()
		public function getMetier()
		public function getCompetences()
		public function getDescription_sup()

		public function setId()
		public function setNom()
		public function setPrenom()
		public function setPseudo()
		public function setMdp()
		public function setEmail()
		public function setSexe()
		public function setFavori()
		public function setTelephone()
		public function setMetier()
		public function setCompetences()
		public function setDescription_sup()
	};
	class Categorie{
		private private $_id, $_nom;

		public function __contruct()
		public function hydrater()

		public function getId()
		public function getNom()

		public function setId()
		public function setNom()
	}

	class Commentaire{
		private private $_id, $_contenu, $_date, $_idUtilisateur;

		public function __contruct()
		public function hydrater()

		public function getId()
		public function getContenu()
		public function getDate()
		public function getIdUtilisateur()

		public function setId()
		public function setContenu()
		public function setDate()
		public function setIdUtilisateur()
	}

	class Image{
		private $_id, $_titre, $_description, $_dateDePub, $_format, $_taille, $_note, $_idCategorie, $_idUtilisateur;

		public function __contruct()
		public function hydrater()

		public function getId()
		public function getTitre()
		public function getDescription()
		public function getDateDePub()
		public function getFormat()
		public function getTaille()
		public function getNote()
		public function getIdCategorie()
		public function getIdUtilsateur()

		public function setId()
		public function setTitre()
		public function setDescription()
		public function setDateDePub()
		public function setFormat()
		public function setTaille()
		public function setNote()
		public function setIdCategorie()
		public function setIdUtilsateur()
	}

	class Projet{
		private $_id, $_titre, $_description, $_dateDePub, $_imageIllustration, $_videoIllustration, $_compteur, $membres, $_idUtilisateur;

		public function __contruct()
		public function hydrater()

		public function getId()
		public function getTitre()
		public function getDescription()
		public function getDateDePub()
		public function getImageIllustration()
		public function getVideoIllustration()
		public function getCompteur()
		public function getMembres()
		public function getIdUtilsateur()

		public function setId()
		public function setTitre()
		public function setDescription()
		public function setDateDePub()
		public function setimageIllustration()
		public function setvideoIllustration()
		public function setCompteur()
		public function setMembres()
		public function setIdUtilsateur()
	}

	class Demande{
		private $_id, $_idUtilisateur, $_idProjet, $_message, $_etat;

		public function __contruct()
		public function hydrater()

		public function getId()
		public function getIdUtilisateur()
		public function getIdProjet()
		public function getMessage()
		public function getEtat()

		public function setId()
		public function setIdUtilisateur()
		public function setIdProjet()
		public function setMessage()
		public function setEtat()
	}

	class Utilisateur{
		private $_id, $_nom, $_prenom, $_pseudo, $_mdp, $_email, $_sexe, $_favori, $_telephone, $_metier, $_competences, $_descriptionSup;

		public function __contruct()
		public function hydrater()
		public function getId()
		public function getNom()
		public function getPrenom()
		public function getPseudo()
		public function getMdp()
		public function getEmail()
		public function getSexe()
		public function getFavori()
		public function getTelephone()
		public function getMetier()
		public function getCompetences()
		public function getDescriptionSup()

		public function setId()
		public function setNom()
		public function setPrenom()
		public function setPseudo()
		public function setMdp()
		public function setEmail()
		public function setSexe()
		public function setFavori()
		public function setTelephone()
		public function setMetier()
		public function setCompetences()
		public function setDescriptionSup()
	}
 ?>


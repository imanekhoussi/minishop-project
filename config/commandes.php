<?php


function afficherUnProduit($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM produits WHERE id=?");

        $req->execute(array($id));

        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();

        return $data;

         
	}
}

function ajouter($image, $nom, $prix, $desc)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES (?, ?, ?, ?)");

    $req->execute(array($image, $nom, $prix, $desc));

    $req->closeCursor();
  }
}
function supprimer($id) {
  try {
    $stmt = $access->prepare("DELETE FROM table_name WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}






if(isset($_FILES['image'])){
  $errors= array();
  $file_name = $_FILES['image']['name'];
  $file_size =$_FILES['image']['size'];
  $file_tmp =$_FILES['image']['tmp_name'];
  $file_type=$_FILES['image']['type'];
  $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
  
  $extensions= array("jpeg","jpg","png");
  
  if(in_array($file_ext,$extensions)=== false){
     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
  }
  
  if($file_size > 2097152){
     $errors[]='File size must be less than 2 MB';
  }
  
  if(empty($errors)==true){
     move_uploaded_file($file_tmp,"images/".$file_name);
     echo "Success";
  }else{
     print_r($errors);
  }
}

function afficher()
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM produits ORDER BY id DESC");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

         
	}
}
function bestselling()
{
	if(require("connexion.php"))
	{
		$req = $access->prepare("SELECT * FROM produits LIMIT 4");


        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

         
	}
}
function flashsales()
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM produits ORDER BY id DESC LIMIT 4");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

         
	}
}

function modifier($image, $nom, $prix, $desc, $id)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("UPDATE produits SET `image` = ?, nom = ?, prix = ?, description = ? WHERE id=?");

    $req->execute(array($image, $nom, $prix, $desc, $id));

    $req->closeCursor();
  }
}

function getAdmin($email, $motdepasse) {
  //connect to the database
  if(require("connexion.php")){
  $stmt = $access->prepare("SELECT * FROM users WHERE email = :email AND motdepasse = :password AND role = 'admin'");
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':motdepasse', $motdepasse);
  $stmt->execute();
  $result = $stmt->fetch();
  return $result;
}
}




?>
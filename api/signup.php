<?php 
session_start();
    include_once "config.php";

    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$mail - Cet email existe déjà !";
            }else{
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'] ;

                    $img_explode = explode(".", $img_name);
                    $img_ext = end($img_explode);

                    $extensions = array("jpeg", "jpg", "png", "gif");

                    if(in_array($img_ext, $extensions) === true){
                        $time = time();
                        $new_img_name = $time  . $img_name;
                        move_uploaded_file($tmp_name, "images/" . $new_img_name);
                        $rand_id = rand(time(),100000000);
                        $status = "En ligne";
                        $encrypt_pass = md5($password);
                        $sql = mysqli_query($conn, "INSERT INTO users(unique_id,fname, lname, email, password,img,status)
                                VALUES({$rand_id},'{$fname}', '{$lname}','{$email}','{$encrypt_pass}', '{$new_img_name}', '{$status}')");
                                if($sql){
                                    $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($sql2)){
                                        $result = mysqli_fetch_assoc($sql2);
                                        $_SESSION["unique_id"] = $result["unique_id"];
                                        echo "success";
                                    }else{
                                        echo "cette adresse email n'existe pas !";
                                    }
                                }else{
                                    echo "Erreur lors de l'inscription.Veuillez réessayer !";
                                }
                    }else{
                        echo "Format d'image non autorisé !";
                    }
                }else{
                    echo "Veuillez télécharger un fichier image - jpeg, png, jpg !";
                }
            }
        }else{
            echo "$email n'est pas une adresse email valide !";
        }
    }else{
        echo "Tous les champs de saisie sont obligatoires !";
    }
?>
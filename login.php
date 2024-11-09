<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: users.php");
    }
?>
<?php include_once("header.php") ?>

        <div class="wrapper">
            <section class="form login">
                <h2>Se connecter</h2>
                <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="error-text">Une erreur</div>
                   
                    <div class="field input">
                        <label for="">Email Address</label>
                        <input type="email" name="email" placeholder="Entrez votre mail">
                    </div>
                    <div class="field input">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Entrez un nouveau mot de passe">
                        <i class="fas fa-eye"></i>
                    </div>
                    
                    <div class="field button">
                        <input type="submit"  name="submit" value="Continuer à discuter">
                    </div>
                </form>
                <div class="link">Pas encore inscrit ? <a href="index.php">Inscrivez-vous</a> </div>
            </section>
        </div>
    </main>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
</body>

</html>
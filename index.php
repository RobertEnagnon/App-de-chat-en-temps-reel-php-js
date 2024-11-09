    <?php include_once("header.php") ?>

        <div class="wrapper">
            <section class="form signup">
                <h2>Inscription</h2>
                <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="error-text">Une erreur</div>
                    <div class="name-details">
                        <div class="field input">
                            <label for="">First name</label>
                            <input type="text" name="fname" placeholder="Prénom">
                        </div>
                        <div class="field input">
                            <label for="">last name</label>
                            <input type="text" name="lname" placeholder="Nom de famille">
                        </div>
                    </div>
                    <div class="field input">
                        <label for="">Email Address</label>
                        <input type="email" name="email" placeholder="Entrez votre mail">
                    </div>
                    <div class="field input">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Entrez un nouveau mot de passe">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label for="">Select image</label>
                        <input type="file" name="image" accept="image/x-png, image/gif, image/jpeg,image/jpg" >
                    </div>
                    <div class="field button">
                        <input type="submit"  name="submit" value="Continuer à discuter">
                    </div>
                </form>
                <div class="link">Déjà inscrit ? <a href="login.php">Connectez-vous</a> </div>
            </section>
        </div>
    </main>

    <script src="./javascript/pass-show-hide.js"></script>
    <script src="./javascript/signup.js"></script>
</body>

</html>
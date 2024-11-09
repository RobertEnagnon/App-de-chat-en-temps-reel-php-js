<?php
session_start();
include_once "api/config.php";
if (!isset($_SESSION["unique_id"])) {
    header("location: login.php");
}

include_once "header.php";
?>
<div class="wrapper">
    <section class="users">
        <header>
            <div class="content">
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id= {$_SESSION['unique_id']} ");
                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <img src="api/images/<?= $row['img'] ?>" alt="image profil">
                <div class="details">
                    <span><?= $row['fname'] . " " . $row['lname'] ?></span>
                    <p><?= $row['status'] ?></p>
                </div>
            </div>
            <a href="api/logout.php?logout_id=<?= $row['unique_id'] ?>" class="logout">Déconnexion</a>
        </header>
        <div class="search">
            <span class="text">Sélectionnez un utilisateur pour démarrer la discussion</span>
            <input type="text" placeholder="Entrez le nom pour rechercher...">
            <button ><i class="fas fa-search"></i></button>
        </div>
        <div class="users-list">

        </div>
    </section>
</div>
</main>
<script src="javascript/users.js"></script>
</body>

</html>
<?php
session_start();
include_once "api/config.php";
if (!isset($_SESSION["unique_id"])) {
    header("location: login.php");
}

include_once "header.php";
?>
<div class="wrapper">
    <div class="chat-area">
        <header>
            <?php
            $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
            if (mysqli_num_rows($sql) > 0) {
                $row = mysqli_fetch_assoc($sql);
            } else {
                header('location: users.php');
            }
            ?>
            <a href="users.php" class="back-icon"> <i class="fas fa-arrow-left"></i> </a>
            <img src="api/images/<?= $row['img']; ?>" alt="" class="profile-img">
            <div class="details">
                <span><?= $row['fname'] . " " . $row["lname"]; ?></span>
                <p><?= $row["status"] ?></p>
            </div>
        </header>
        <div class="chat-box">

        </div>
        <form action="#" class="typing-area">
            <input type="text" name="incoming_id" value="<?= $user_id ?>" class="incoming_id" hidden>
            <input type="text" name="message" class="input-field" placeholder="Tapez le message ici..." autocomplete="off">
            <button><i class="fab fa-telegram-plane"></i></button>
        </form>
    </div>
</div>
</main>
<script src="javascript/chat.js"></script>
</body>

</html>
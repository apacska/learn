<div id="learn">
<div id="header">
<div class="user">
    <p id="user">
        <?php
            echo $_SESSION["username"];
        ?>
    </p>
    <p id="logout">
        <?php
            require_once("logout.php");
        ?>
    </p>
</div>
    <div id="header_left">
        <p id="startsession">
            <?php
            require_once("newSession.php");
            ?>
        </p>
    </div>
</div>
<?php
require_once("addword.php");
?>
</div>

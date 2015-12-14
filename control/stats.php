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
                require_once("views/logout.php");
                ?>
            </p>
        </div>
        <div id="header_left">
            <p id="startsession">
                <?php
                require_once("views/newSession.php");
                ?>
            </p>
            <p id="stats">
                <?php
                require_once("views/stats.php");
                ?>
            </p>
        </div>
    </div>
</div>
<?php
require_once("model/word.php");
$words=getWords($_SESSION['userId']);
echo "<p class='username'>".$_SESSION['username'].", you have ".count($words)." words!"."</p>";
?>
<div id="stat">
    <?php
    foreach($words as $word){
        echo "<p class='word'>".$word[0]."</p>";
        echo "<p class='priority'>".$word[1]."</p>";
    }
    ?>
</div>

<div id="session" xmlns="http://www.w3.org/1999/html">
    <label>Session</label>
    <form action="" method="post">
        <?php
        $i=0;
        var_dump($_SESSION['lang1']);
        while($i<count($_SESSION['lang1']))
        {
            $word2=$_SESSION['lang1'][$i];
            echo "<input type='text' name='word1' value='$word2' />";
            ++$i;
        }
        ?>
        <input type="text" name="word2" placeholder="word2" />
        <input type="hidden" name="page" value="session" />
        <input type="submit" value="Start" />
    </form>
</div>
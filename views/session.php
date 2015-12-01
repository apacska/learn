<div id="session" xmlns="http://www.w3.org/1999/html">
    <label>Session</label>
    <form action="" method="post">
        <input type='text' name='word1' value='<?php echo $_SESSION['lang1'][$_SESSION['wordId']];?>' readonly/>
        <input type="text" name="word2" placeholder="word2" />
        <input type="hidden" name="page" value="session" />
        <input type="submit" value="Check it!" />
    </form>
</div>
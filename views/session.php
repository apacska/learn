<div id="session" xmlns="http://www.w3.org/1999/html">
    <label>Session</label>
    <form action="" method="post">
        <div class="center">
            <input type='text' name='word1' value='<?php echo $_SESSION['lang1'][$_SESSION['wordId']];?>' readonly/>
            <input type="text" name="word2" placeholder="magyar" />
        </div>
        <input type="hidden" name="page" value="session" />
        <div class="center">
            <input type="submit" value="Check it!" />
            <button type="button" id="finish_session">Finish Session</button>
        </div>
    </form>
</div>
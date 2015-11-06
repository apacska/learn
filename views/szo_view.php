<div id="forms">
	<form action="modells/check.php" TYPE="GET">
		<div id="check">
			<input type="text" value="<?php select_word();?>" name="word" readonly>
			<input type="text" name="answer" placeholder="answer..." autofocus>
			<input type="submit" value="Check it!">
		</div>

		<div id="stuff_container">
			<b class="entypo-down-open-big"></b>

			<div id="stuffs">
				<div id="button">Add new</div>
			</div>
		</div>
	</form>
</div>

<form action="modells/add.php" TYPE="GET">
	<div id="add_new_container">
		<div id="add_new">
			<b class="entypo-cancel"></b>
			<input type="text" name="new_word" placeholder="new word" autofocus>
			<input type="text" name="new_answer" placeholder="new answer">
			<input type="submit" value="Add">
		</div>
	</div>
</form>

<div id="correct"><b class="entypo-check"></b></div>
<div id="incorrect"><b class="entypo-cancel"></b></div>
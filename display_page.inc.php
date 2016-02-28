<?php

	function outputLoginForm()
	{
		echo '<form role="form" method="post">';
		if (!empty($_POST) && !isset($_POST['username']))
		{
			echo "<div class=\"form-group has-error\">";
			echo "<label for=\"username\">Username</label>";
			echo "<input type=\"text\" class=\"form-control\" name=\"username\">";
			echo "<p class=\"help-block\">Enter a username</p>";
			echo "</div>";
		}
		else
		{
			echo '<div class="form-group">';
			echo '<label for="username">Username</label>';
			if (isset($_POST['username']))
			echo '<input type="text" class="form-control" name="username" value="'.$_POST['username'].'">';
			else
			echo '<input type="text" class="form-control" name="username">';
			echo '</div>';
		}
		if (!empty($_POST) && !isset($_POST["password"]))
		{
			echo "<div class=\"form-group has-error\">";
			echo "<label for=\"password\">Password</label>";
			echo "<input type=\"password\" class=\"form-control\" name=\"password\">";
			echo "<p class=\"help-block\">Enter a password</p>";
				echo "</div>";
		}
		else
		{
			echo "<div class=\"form-group\">";
			echo "<label for=\"password\">Password</label>";
			echo "<input type=\"password\" class=\"form-control\" name=\"password\">";
			echo "</div>";
		}
		echo '
				  <button type="submit" class="btn btn-primary">Login</button>
				  <a href="?page=register" class="btn btn-warning">Register</a>
				</form>';
	}

	function outputRegisterForm()
	{
		print_r($_POST);
		if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['email']))
		{
			if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['email']) && $_POST['password'] == $_POST['confirm_password'])
			{
				registerUser($_POST['username'], $_POST['password'], $_POST['email'], $_POST['user_type']);
				return;
			}
		}
		echo '<form role="form" method="post">';
		if (!empty($_POST) && (!isset($_POST['username']) || empty($_POST['username'])))
		{
			echo '<div class="form-group has-error">';
			echo '<label for="username">Username</label>';
			echo '<input type="text" class="form-control" name="username">';
			echo '<p class="help-block">Enter a username</p>';
			echo '</div>';
		}
		else
		{
			echo '<div class="form-group">';
			echo '<label for="username">Username</label>';
			if (isset($_POST['username']))
			echo '<input type="text" class="form-control" name="username" value="'.$_POST['username'].'">';
			else
			echo '<input type="text" class="form-control" name="username">';
			echo '</div>';
		}
		if (!empty($_POST) && (!isset($_POST["password"]) || empty($_POST['password'])))
		{
			echo '<div class="form-group has-error">';
			echo '<label for="password">Password</label>';
			echo '<input type="password" class="form-control" name="password">';
			echo '<p class="help-block">Enter a password</p>';
			echo '</div>';
		}
		else
		{
			echo '<div class="form-group">';
			echo '<label for="password">Password</label>';
			echo '<input type="password" class="form-control" name="password">';
			echo '</div>';
		}
		if (!empty($_POST) && (!isset($_POST["confirm_password"]) || empty($_POST["confirm_password"])))
		{
			echo '<div class="form-group has-error">';
			echo '<label for="confirm_password">Confirm Password</label>';
			echo '<input type="password" class="form-control" name="confirm_password">';
			echo '<p class="help-block">Confirm your password</p>';
			echo '</div>';
		}
		else if (!empty($_POST) && isset($_POST["confirm_password"]) && $_POST['password'] != $_POST['confirm_password'])
		{
			echo '<div class="form-group has-error">';
			echo '<label for="confirm_password">Confirm Password</label>';
			echo '<input type="password" class="form-control" name="confirm_password">';
			echo'<p class="help-block">Passwords do not match</p>';
			echo '</div>';
		}
		else
		{
			echo '<div class="form-group">';
			echo '<label for="password">Confirm Password</label>';
			echo '<input type="password" class="form-control" name="confirm_password">';
			echo '</div>';
		}
		if (!empty($_POST) && (!isset($_POST['email']) || empty($_POST['email'])))
		{
			echo '<div class="form-group has-error">';
			echo '<label for="email">E-mail</label>';
			echo '<input type="email" class="form-control" name="email">';
			echo '<p class="help-block">Enter a valid email</p>';
			echo '</div>';
		}
		else
		{
			echo '<div class="form-group">';
			echo '<label for="email">E-mail</label>';
			if (isset($_POST['email']))
			echo '<input type="text" class="form-control" name="email" value="'.$_POST['email'].'">';
			else
			echo '<input type="text" class="form-control" name="email">';
			echo '</div>';
		}
		echo '<input type="radio" name="user_type" value="student" checked>&nbsp;Student</input> <br />';
		echo '<input type="radio" name="user_type" value="mentor">&nbsp;Mentor</input> <br /><br />';
		echo '<button type="submit" class="btn btn-primary">Register</button>';
		echo '</form>';

	}

?>
<form name="reg" class="tablefull"  method="post">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(count($error) !== 0){
        $alert = '<div class="alert alert-danger"><h4>Correct following problems:</h4><ul class="error-li">';
        foreach($error as $text){
            $alert .= '<li>'.$text.'</li>';
        }
        $alert .= '</ul></div>';
        echo $alert;
    }
}	
?>
	<h3>Register</h3>
	<table class="tablefull">
		<tr>
			<td>EMail</td>
			<td><input type="email" action="main" name="email" value="" placeholder="Example@domain.com"	pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" autofocus="autofocus" required></td>
		</tr>
		<tr>
			<td>Username:</td>
			<td><input type="text" name="username" value="" placeholder="username"			pattern="[A-Za-z0-9]{5,}" required></td>
		</tr>
		<tr>
			<td>Real name: 
			<td><input type="text" name="realName" value="" placeholder="Ozzy Osbourne" required></td>
		</tr>
		<tr>
			<td>Password: </td>
			<td><input type="password" name="pwd" value=""	 pattern=".{8,}" required></td>
		</tr>
		<tr>
			<td>Birth: </td>
			<td><input type="date" name="birthday" value="" required></td>
		</tr>
		<tr>
			<td>Country:</td>
			<td><select name="country" autocomplete="0" required>
			<option></option>
			<?php
			foreach($data as $row){
				echo '<option>'.$row.'</option>';
			}
			?>
				</select></td>
		</tr>
	</table>
	<center><input type="checkbox" name="terms" required> I agree with <a href="">terms and conditions</a>.</center>
	<br><input class="btn-sub btn btn-success" type="submit" value="Register" name="r_submit">
</form>

<hr>
<form name="login" class="tablefull" method="post">
	<h3>Authorization</h3>
	<table class="tablefull">
		<tr>
			<td>E-Mail or Login:</td>
			<td><input type="text" name="f_login" value="" placeholder="login or mail" pattern="[A-Za-z@.]{5,}" required></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="f_password" value="" required></td>
		</tr>
	</table>	
	<br><input class="btn-sub btn btn-warning" type="submit" value="Log in" name="login">
</form>


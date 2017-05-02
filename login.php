<h1>Log In</h1>
<form action="validate.php" method="post">
    <fieldset class = "purchaseContainer">
            <label class = "heading1" for="username">Username:</label>
            <input name="username" required="required" placeholder="username"/><br/>
            <label class = "heading1" for="password">Password:</label>
            <input type="password" id="password" name="password" required="required" placeholder="password" ><br/>
            <div class = "buttonsubmit"><input type="submit" value="Log in" onclick="validate_login()"/></div>
    </fieldset>
</form>

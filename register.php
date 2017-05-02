<form action="validate.php" method="post">
  <fieldset class="purchaseContainer">
    <input type="hidden" name="register" value="True" />
    <label class = "heading" for="firstname">First Name:</label> <input type="text" name="firstname" pattern="[A-Za-z]*" autofocus required="required"/> 
    <br/>
    <label class = "heading" for="lastname">Last Name:</label>
    <input type="text" name="lastname" pattern="[A-Za-z]*" required="required"/> 
    <br/>
    <label class = "heading" for="phone">Telephone number:</label>
    <input type="text" name="phone" pattern="\(\d{3}\) \d{3}-\d{4}" placeholder="(###) ###-####" required/> <br/>
    <label class = "heading" for="email">Preferred Email Address:</label>
    <input name="email" type = "text" required="required" placeholder="johndoe@blahblah.com" pattern="[a-zA-Z_\-]+@(([a-zA-Z_\-])+\.)+([a-zA-Z]{2,4})+"/>
    <br/>
    <label class = "heading" for="username">Username:</label>
    <input id="username" name="username" required="required" onblur="check_username_availability();" placeholder="username"/>
        <span id="username_status"></span>
    <br/>
    <label class = "heading" for="password">Password:</label>
    <input type="password" id="pass1" name="password" required="required" placeholder="password"/>
    <br/>
    <label class = "heading" for="userid">Confirm Password:</label>
    <input type="password" id="pass2" name="confirm password" onkeyup="check_passwords();" required="required" placeholder="password"/> 
    <span class = "confirmMessage" id = "confirmMessage">  </span>
    <br/>
    <div id="errors"></div>
    <div class="buttonsubmit"><input type="submit"/></div>
  </fieldset>

  </form>
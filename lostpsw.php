<?php

	if(!empty($_POST["forgot-password"])){

		$conn = mysqli_connect("localhost", "root", "", "blog_samples");

		$condition = "";
		if(!empty($_POST["username"]))
			$condition = " username = '" . $_POST["username"] . "'";

		if(!empty($_POST["email"])) {
			if(!empty($condition)) {
				$condition = " and ";
			}
			$condition = " email = '" . $_POST["email"] . "'";
		}

		if(!empty($condition)) {
			$condition = " where " . $condition;
		}

		$sql = "Select * from members " . $condition;
		$result = mysqli_query($conn,$sql);
		$user = mysqli_fetch_array($result);

		//if(!empty($user)) {
		//	require_once("forgot-password-recovery-mail.php");
	  //	} else {
	  //		$error_message = 'No User Found';
	  //	}

	}
?>
<form name="lostpsw" id="lostpsw" method="post" onSubmit="return validate_forgot();">

  <h2> Wachtwoord vergeten </h2>

	     <?php if(!empty($success_message)) { ?>
	        <div class="success_message"><?php echo $success_message; ?></div>
	     <?php } ?>

	   <div id="validation-message">
		  <?php if(!empty($error_message)) { ?>
	       <?php echo $error_message; ?>
	    <?php } ?>
	   </div>

	    <div class="field-group">
		      <div><label for="username">Username</label></div>
		      <div><input type="text" name="username" id="username" class="input-field">
          </br>  Of</div>
	    </div>

	     <div class="field-group">
		      <div><label for="email">Email</label></div>
		      <div><input type="text" name="email" id="email" class="input-field"></div>
	     </div>

	     <div class="field-group">
		      <div><input type="submit" name="forgot-password" id="forgot-password" value="Submit" class="form-submit-button"></div>
	     </div>

     </br>

       <a href="./index.php">Home</a>

</form>

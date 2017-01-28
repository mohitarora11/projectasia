<?php
include_once('global_var.php');
$_error='';


if($_SERVER["REQUEST_METHOD"] == "POST")
 { 
    if((!strcasecmp($_REQUEST["txtUserName"],"samar") && !strcasecmp($_REQUEST["txtUserPass"],"samar"))) {
		$_SESSION["login"]=true;
		$_SESSION["userid"]=$_REQUEST["txtUserName"];			
				
		header("Location: ".$GLOBALS['serverurl']."table.php"); /* Redirect browser */
		die();
	} else {
			$_error = '<span class="error">User name and Password do not match</span>';
		
	}
 }

 include_once('header.php'); ?>
	<title>Login</title>	
</head>
<body class="dt-example dt-example-bootstrap inner-bg">
	<div class="container no-bg">
		<section class="login-wrap">
		
			<h1>User Login</h1>			
				<div class="form-wrap">
					<div>                
						<form method="post" class="cls_insert" action="">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1"><span class="home-icon"></span></span>
								<input maxlength="40" size="20" name="txtUserName" class="form-control" type="text" placeholder="Name">
							</div>                    
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1"><span class="key-icon"></span></span>
								<input maxlength="40" size="22" class="form-control" name="txtUserPass" type="password" placeholder="Password">
							</div>
							
							<div class="input-group">
								<?php echo $_error; ?>
								<input value="Login" class="btn btn-submit" id="cmdLogin" name="cmdLogin" type="submit">
							</div>
						</form>
					</div>
				</div>
		</section>
		<!-- form bottom image ends here -->
	</div>	
</body>
</html>
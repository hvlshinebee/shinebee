<div>
							<form class="form" action="login2.php" method="post">
										
								<div class="form-group">
									<div class="input-group">                
										<div class="input-group-prepend">
											<span class="input-group-text">
												<span class="fa fa-user"></span>
											</span>                    
										</div>
									<input type="text" class="form-control" name="user_email" placeholder="Username" required="required">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="fa fa-lock"></i>
											</span>                    
										</div>
										<input type="password" class="form-control" name="user_password" placeholder="Password" required="required">
									</div>
								</div>        
								<div class="form-group">
									<input type="Submit" name="submit" value="Submit" class="btn btn-primary">
								</div>
								<div class="clearfix">
									<label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
									<!--<a href="reset_password.php" class="float-right text-success">Forgot Password?</a> -->
								</div>  
        
							</form>
							<div class="hint-text">Don't have an account? <a href="register.php" class="text-success">Register Now!</a></div>
							</div>
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">My Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="auth-wrapper">
                    <div class="form-tabs">
                        <a href="#" data-frm="login-frm" class="tab active">Login</a>
                        <a href="#" data-frm="register-frm" class="tab">Register</a>
                    </div>
                    <form class="login-frm frm" action="#" method="post">
						
						<div class="form-group">
                            <label for="email1"></label>
                            <input type="email" required name="email" autocomplete="email" id="email1" placeholder="ENTER EMAIL">
                        </div>
                        <div class="form-group">
                            <label for="pass1"></label>
                            <input type="password" required name="password" id="pass1" placeholder="ENTER PASSWORD">
                        </div>
                        <div class="remember-me">
                            <div>
                                <input type="checkbox" id="test1" />
                                <label for="test1">Remember Me</label>
                            </div>
                            <a href="#">Forgot Password?</a>
                        </div>
                        <div class="sub-btn">
                            <input type="submit" class="btn ui-btn info" value="SIGN IN">
                        </div>
                    </form>
                    <form class="register-frm frm hide" action="#" method="post">
					
						<div class="form-group">
                            <label for="email1"></label>
                            <input type="text" required name="username" autocomplete="username" id="username1" placeholder="ENTER USERNAME">
                        </div>
						<div class="form-group">
                            <label for="email1"></label>
                            <textarea required name="address" autocomplete="address" id="address2" placeholder="ENTER ADDRESS" ></textarea>
						</div>
					<div class="row">
						<div class="form-group col-sm-4"><span>
                            <label for="country"></label><br>
						<select id="country" name="country" placeholder="ENTER USERNAME">
								<option value="selected">Country</option>
								<option value="australia">Australia</option>
								<option value="canada">Canada</option>
								<option value="usa">USA</option>
							</select><br></span>
                         </div>
							<div class="form-group col-sm-4"><span>
								<label for="email1"></label><br>
								<select id="state" name="state" placeholder="ENTER USERNAME">
									<option value="selected">state</option>
									<option value="australia">Australia</option>
									<option value="canada">Canada</option>
									<option value="usa">USA</option>
								</select><br></span>
							</div>
								<div class="form-group">
									<label for="email1"></label><br>
									<select id="city" name="city" placeholder="ENTER USERNAME">
										<option value="selected">City</option>
										<option value="australia">Australia</option>
										<option value="canada">Canada</option>
										<option value="usa">USA</option>
									</select><br>	
								
							</div>
						
					</div>
						<div class="form-group">
                            <label for="email1"></label>
                            <input type="text" required name="mobile Number" autocomplete="mobile Number" id="mobile Number6" placeholder="ENTER MOBILE NUMBER">
                        </div>
						<div class="form-group">
                            <label for="email2"></label>
                            <input type="email" required name="email" autocomplete="email" id="email7" placeholder="ENTER EMAIL">
                        </div>
                        <div class="form-group">
                            <label for="pass3"></label>
                            <input type="password" required name="password" id="pass8" placeholder="ENTER PAASWORD">
                        </div>
                        <div class="form-group">
                            <label for="pass2"></label>
                            <input type="password" required name="password" id="pass9" placeholder="ENTER CONFIRM PASSWORD">
                        </div>
						<div class="form-group">
                            <label for="email1"></label>
                            <input type="text" required name="photo" autocomplete="photo" id="photo10" placeholder="UPLOAD IMAGE">
                        </div>
                        <div class="sub-btn">
                            <input type="submit" class="btn ui-btn info" value="REGISTER">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<?php
		include 'connection.php';
		@session_start();
		$id=$_SESSION["adminid"];
		if(!isset($_SESSION["adminid"]))
		{
			header('location:index.php');
		}
$admin=$con->query("select * from user where User_id='$id'");
$admin_data=$admin->fetch_object();	
//print_r($admin_data);exit;
?>
<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="dashboard.php" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
						 Admin
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="dashboard.php" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/images/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome<br> <?php echo $admin_data->FName; ?></small>
								</span>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a class="green" href="updatepassword.php?uid=<?php echo $admin_data->User_id; ?>">
										<i class="ace-icon fa fa-user"></i>
										Change Password
									</a>
								</li>

								<li>
									<a class="green" href="updateprofile.php?eid=<?php echo $admin_data->User_id; ?>">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

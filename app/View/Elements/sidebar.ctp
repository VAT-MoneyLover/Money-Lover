<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header page-scroll">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a id="" class="navbar-brand" href="<?php echo BASE_PATH; ?>" >Money Lover</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li class="hidden">
					<a href="#page-top"></a>
				</li>
				<li class="page-scroll">
					<a href="<?php echo BASE_PATH.'wallets/viewList'; ?>">Wallet</a>
				</li>
				<li class="page-scroll dropdown">
					<a href=""class="dropdown-toggle" data-toggle="dropdown"><?php echo $wallet['User']['email']; ?></a>
					<ul class="dropdown-menu">
						<li><?php echo $this->HTML->link('My Account', array('controller'=>'users', 'action'=>'view', AuthComponent::user('id'))) ; ?></a></li>
						<li><a href="<?php echo BASE_PATH.'users/logout'; ?>">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>
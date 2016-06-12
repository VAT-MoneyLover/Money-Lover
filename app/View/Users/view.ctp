<style>
	div#userInfo{
		padding-bottom: 2em;
	}
	div.linkAction{
		padding: 1em;
		display: inline-block;
		font-size: 13pt;
	}
	div .glyphicon{
		color: #888;
	}
	a {
	    color: #18bc9c;
	    text-decoration: none;
	    -o-transition: all .3s;
	    -moz-transition: all .3s;
	    -webkit-transition: all .3s;
	    -ms-transition: all .3s;
	    transition: all .3s;
	}
	a:hover, a:focus {
		color: #19b9e7; 
		text-decoration: none;
		-o-transition: all .3s;
		-moz-transition: all .3s;
		-webkit-transition: all .3s;
		-ms-transition: all .3s;
		transition: all .3s;
	}
</style>
<div class="col-sm-2 col-md-3"></div>
<div class="col-xs-12 col-sm-8 col-md-6 bg-content">
	<div class="outerAva">
		<div id="avatar" class="">
			<?php echo $this->HTML->image($user['User']['avatar'], array('class'=>'avatar'));   ?>
		</div>
	</div>
	
	<div id="userInfo" class="">
		<p><?php echo $user['User']['email']?></p>
	</div>
	<div class="linkAction">
		<span class="glyphicon glyphicon-picture"></span>
		<?php
			echo $this->HTML->link('Change avatar', array('controller'=>'Users', 'action'=>'avatar', $user['User']['id']));
		?>
	</div>
	<div class="linkAction ">
		<span class="glyphicon glyphicon-lock"></span>
		<?php
			echo $this->HTML->link('Change password', array('controller'=>'Users', 'action'=>'changePassword', $user['User']['id']), array('style'=>''));
		?>
	</div>
</div>
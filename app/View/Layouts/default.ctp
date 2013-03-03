<!DOCTYPE html>
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<title><?php
			printf("%s %s %s", Configure::read("Application.Title"), Configure::read("Application.TitleSeparator"), $title_for_layout);
			?></title>
		<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-responsive.min');
		echo $this->Html->css('main');

		echo $this->Html->script('underscore.min');
		echo $this->Html->script('underscore.string.min');
		echo $this->Html->script('jquery.min');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('main');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		?>
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-static-top" id="navbar">
			<div class="navbar-inner">
				<div class="container-fluid">
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="brand" href="#"><?php echo Configure::read("Application.Brand"); ?></a>
					<div class="nav-collapse collapse">
						<p class="navbar-text pull-right"><?php
							printf(
									__("Logged in as %s"), $this->Html->link(
											'Username' /* You can change for a authenticated name */, ['controller' => 'users', 'action' => 'me'], ['class' => 'navbar-link']
									)
							);
							?>
						</p>
						<?php
						echo $this->Navbar->create()
								->append("Home", "/")
								->append("About", "#")
								->append("Contact", "#")
						?>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row-fluid">
				<?php echo $this->element('Layout/sidebar'); ?>
				<div class="span9">
					<?php echo $this->Session->flash(); ?>
					<?php echo $this->fetch('content'); ?>
				</div>
			</div>

			<hr>

			<footer>
				<p><?php
					printf(__("&copy; My Company %s"), date("Y"));
					echo $this->Html->link(
							$this->Html->image(
									'cake.power.gif', array('alt' => Configure::read("Application.CakePower"), 'border' => '0')), 'http://www.cakephp.org/', array('target' => '_blank', 'escape' => false)
					);
					?></p>
			</footer>

		</div>
		<?php echo $this->element('sql_dump'); ?>
	</body>
</html>

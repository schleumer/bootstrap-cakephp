<div class="span3" id="threads-container">
	<div class="well sidebar-nav">
		<?php
		echo $this->Navbar->create()
				->appendHeader("Left Menu Bar")
				->append("Home", "/")
				->append("Link", "#")
				->append("Link", "#")
				->appendHeader("More links")
				->append("Link", "#")
				->append("Link", "#")
				->append("Link", "#")
				->addParam("class", "nav nav-list")
		?>
	</div>
</div>
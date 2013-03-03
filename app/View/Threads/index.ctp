<span class="threads-loading"></span>
<div class="well sidebar-nav">
	<ul class="nav nav-list">
		<li class="nav-header">Threads</li>
			<?php foreach ($threads as $thread): ?>
			<li>
				<a href="#"><?php echo current(Hash::format($thread, array('name', 'queued', 'count'), "%s (%s/%s)")); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
<!--<li class="nav-header">Threads</li>
		<li class="active"><a href="#">Link</a></li>
		<li><a href="#">Link</a></li>-->
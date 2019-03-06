<?php
if(is_active_sidebar("main-sidebar-left")) : ?>
<div class="col-xs-12 col-md-4 secondary">
	<div class="sidebar">
		<ul>
			<?php dynamic_sidebar("main-sidebar-left"); ?>
		</ul>
	</div>
</div>
	<?php endif; ?>
<?php
if(is_active_sidebar("main-sidebar-middle")) : ?>
<div class="col-xs-12 col-md-4 secondary">
	<div class="sidebar">
		<ul>
			<?php dynamic_sidebar("main-sidebar-middle"); ?>
		</ul>
	</div>
</div>
	<?php endif; ?>
<?php
if(is_active_sidebar("main-sidebar-right")) : ?>
<div class="col-xs-12 col-md-4 secondary">
	<div class="sidebar">
		<ul>
			<?php dynamic_sidebar("main-sidebar-right"); ?>
		</ul>
	</div>
</div>
	<?php endif; ?>

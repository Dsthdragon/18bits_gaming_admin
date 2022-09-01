<?php if (!empty($this->output)): ?>
	<div class="uk-grid uk-child-width-4-4@s uk-child-width-2-3@m uk-child-width-3-5@l  uk-flex-center uk-text-center" uk-grid>
		<div>
			<?php if (is_array($this->output)) : ?>
				<?php foreach ($this->output as $key) : ?>
					<div class="uk-alert-danger" uk-alert='{"duration": 500}'>
						<a class="uk-alert-close" uk-close></a>
						<p><?php echo $key; ?></p>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="uk-alert-success" uk-alert='{"duration": 500}'>
					<a class="uk-alert-close" uk-close></a>
					<p><?php echo $this->output; ?></p>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>
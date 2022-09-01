<h4>Images</h4>
<hr style="clear: both" />
<div class="uk-grid">
	<?php
	$data = paginator::paginate($this->images, 16, $this->currentPage);
	$count = $data[1];
	$data = $data[0];
	?>
	<?php foreach($data as $key => $value): ?>
		<div class="uk-width-1-3 uk-width-1-4@m uk-padding-small">
			<p class="setGameGallery" data-link="<?= URL ?>setGameGallery/<?= $this->game; ?>/<?= $value['id'] ?>" data-current-page="<?= URL ?>addToGameGallery/<?= $this->game; ?>/<?= $this->currentPage ?>">
				<input type="checkbox" value="<?= $value['id']; ?>" name="id" form="modifyAccess" style="display: none;" id="accessCheck<?= $value['id']; ?>" />
				<img src="<?= URL.$value['thumb']; ?>" class="responsive-img <?= ($_GET['id'] == $value['id']) ? 'card-selected-blue': '' ?>">
			</p>
		</div>
	<?php endforeach; ?>
</div>
<div class="row">
	<div class="uk-width-1-1 uk-text-center">
		<hr />
		<?php if($this->currentPage > 2): ?>
			<a  class="uk-button uk-button-default blue-text gotoPage" data-holder="gameGalleryContainer" data-current-page="<?= URL ?>addToGameGallery/<?= $this->game; ?>/1">First</a>
		<?php endif; ?>
		<?php if($this->currentPage > 1): ?>
			<a  class="uk-button uk-button-default blue-text gotoPage" data-holder="gameGalleryContainer" data-current-page="<?= URL ?>addToGameGallery/<?= $this->game; ?>/<?= $this->currentPage - 1 ?>"><span class="fa fa-arrow-left" ></span></a>
		<?php endif; ?>
		<?php if($this->currentPage < $count): ?>
			<a  class="uk-button uk-button-default blue-text gotoPage" data-holder="gameGalleryContainer" data-current-page="<?= URL ?>addToGameGallery/<?= $this->game; ?>/<?= $this->currentPage + 1 ?>"><span class="fa fa-arrow-right" ></span></a>
		<?php endif; ?>
		<?php if($this->currentPage < $count - 1): ?>
			<a  class="uk-button uk-button-default blue-text gotoPage" data-holder="gameGalleryContainer" data-current-page="<?= URL ?>addToGameGallery/<?= $this->game; ?>/<?= $count; ?>">Last</a>
		<?php endif; ?>
	</div>
</div>
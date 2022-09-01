<style>
.roleBox
{
	text-align: center;
	padding: .5rem;
}
.card-selected-blue 
{
	border-style: solid;
	border-color: #0275d8;
	border-width: 2px;
}
.roleBox img{
	margin: auto;
	padding: .5rem;
}
</style>
<div class="right">
	<form id="addImageForm" method="POST" enctype="multipart/form-data" style="display: none">
		<input type="hidden" value="image" name="type" form="addImageForm"/>
		<input type="hidden" value="1" name="custom" form="addImageForm"/>
		<input type="file" name="file_param" accept="image/*" form="addImageForm" id="addImageInput" />
		<button class="btn blue" id="addImage" form="addImageForm" type="submit"></button>
	</form>
	<button class="uk-button uk-button-primary" id="addImageButton"><span class="fa fa-upload"></span></button>
</div>
<h4>Images</h4>
<hr style="clear: both" />
<div class="uk-grid">
	<?php
	$data = paginator::paginate($this->images, 18, $this->currentPage);
	$count = $data[1];
	$data = $data[0];
	?>
	<?php foreach($data as $key => $value): ?>
		<div class="uk-width-1-3 uk-width-1-4@m">
			<p class="roleBox" data-id="<?= $value['id']; ?>" data-image="<?= $value['url'] ?>">
				<input type="checkbox" value="<?= $value['id']; ?>" name="id" form="modifyAccess" style="display: none;" id="accessCheck<?= $value['id']; ?>" />
				<img src="<?= $value['thumb']; ?>" class="responsive-img <?= ($_GET['id'] == $value['id']) ? 'card-selected-blue': '' ?>">
			</p>
		</div>
	<?php endforeach; ?>

</div>
<div class="row">
	<div class="uk-width-1-1 uk-text-center">
		<hr />
		<?php if($this->currentPage > 2): ?>
			<a  class="uk-button uk-button-default blue-text paginateImages" data-current-page="1">First</a>
		<?php endif; ?>
		<?php if($this->currentPage > 1): ?>
			<a  class="uk-button uk-button-default blue-text paginateImages" data-current-page="<?= $this->currentPage - 1 ?>"><span class="fa fa-arrow-left" ></span></a>
		<?php endif; ?>
		<?php if($this->currentPage < $count): ?>
			<a  class="uk-button uk-button-default blue-text paginateImages" data-current-page="<?= $this->currentPage + 1 ?>"><span class="fa fa-arrow-right" ></span></a>
		<?php endif; ?>
		<?php if($this->currentPage < $count - 1): ?>
			<a  class="uk-button uk-button-default blue-text paginateImages" data-current-page="<?= $count; ?>">Last</a>
		<?php endif; ?>
	</div>
</div>
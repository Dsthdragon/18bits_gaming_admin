<link rel="stylesheet" href="<?php echo URL; ?>public/font-awesome/css/font-awesome.css">
<link href="<?php echo URL; ?>public/css/uikit.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>

<link rel="stylesheet" href="<?php echo URL;?>public/css/default.css"/>
<script src="<?php echo URL; ?>public/js/jquery.js"></script>
<style>
.roleBox2
{
	border-style: solid;
	border-color: #fff;
	border-width: 2px;
}
.card-selected-blue 
{
	border-style: solid;
	border-color: #0275d8;
	border-width: 2px;
}
.roleBox2 img{
	width:  100%;
	margin: auto;
}
</style>
<div class="uk-grid">
	<?php
	$data = paginator::paginate($this->images, 16, $this->currentPage);
	$count = $data[1];
	$data = $data[0];
	?>
	<?php foreach($data as $key => $value): ?>
		<div class="uk-width-1-3 uk-width-1-4@m">
			<p class="roleBox2" data-id="<?= $value['id']; ?>" data-image="<?= $value['url'] ?>">
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
			<a  class="uk-button uk-button-default blue-text paginateImages" href="<?= URL ?>imageManager/1">First</a>
		<?php endif; ?>
		<?php if($this->currentPage > 1): ?>
			<a  class="uk-button uk-button-default blue-text paginateImages" href="<?= URL ?>imageManager/<?= $this->currentPage - 1 ?>">
				<p>
					<span class="fa fa-arrow-left" ></span>
				</p>
			</a>
		<?php endif; ?>
		<?php if($this->currentPage < $count): ?>
			<a  class="uk-button uk-button-default blue-text paginateImages" href="<?= URL ?>imageManager/<?= $this->currentPage + 1 ?>">

				<p>
					<span class="fa fa-arrow-right" ></span>
				</p>
			</a>
		<?php endif; ?>
		<?php if($this->currentPage < $count - 1): ?>
			<a  class="uk-button uk-button-default blue-text paginateImages" href="<?= URL ?>imageManager/<?= $count; ?>">Last</a>
		<?php endif; ?>
	</div>
</div>

<script>
	
	$('.roleBox2').click(function(){
		var id = $(this).attr("data-id");
		var checked = $("#accessCheck"+id).prop('checked');
		$("#accessCheck"+id).prop('checked', checked ? false : true);
		$('.roleBox2').removeClass('card-selected-blue')
		$(this).toggleClass('card-selected-blue');
		window.parent.ImageGallerySelected = $(this).attr("data-image");
	});

	$('#myManagerContainer').on('click', '.paginateImages', function(){
		$('#myManagerContainer').html("<div class='center-align'><span class='fa fa-5x fa-refresh fa-spin'></span></div>");
		var current  = $(this).data('current-page');
		var link = $("#myManagerLink").val();
		var id = $('#articleImg').val();
		$.get(link + "/" + current + '?id=' + id , function(o){
			$('#myManagerContainer').html(o);
		})
	});
</script>
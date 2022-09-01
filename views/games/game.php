<?php $general = new general_model(); ?>
<form id="updatePost" method="post" action="<?= URL ?>game/<?= $this->game['id']; ?>">
	<input type="hidden" value="updatePost" name="form" form="updatePost" />
	<input type="hidden" value="<?= $this->game['image']; ?>" id="selectedImg" data-game="<?= $this->game['id']; ?>" data-page="game" name="image" form="updatePost">
</form>
<form id="publishArticle" method="post" action="<?= URL ?>game/<?= $this->game['id']; ?>">
	<input type="hidden" value="publishArticle" name="form" form="publishArticle" />
</form>
<div class="uk-grid uk-grid-collapse">

	<h4 class="uk-width-1-1 uk-width-1-3@m" style="border-bottom: 1px solid #e5e5e5;"><?= $this->game['title']; ?></h4>
	<ul uk-tab="connect: .switcher-container" class="uk-width-1-1 uk-width-2-3@m uk-flex-right">
		<li <?= ($this->tab == "basic")? 'class="uk-active"' : '' ?> ><a href="#">Basic Info</a></li>
		<li <?= ($this->tab == "extra")? 'class="uk-active"' : '' ?> ><a href="#">Extra Info</a></li>
		<li <?= ($this->tab == "genres")? 'class="uk-active"' : '' ?> ><a href="#">Genres</a></li>
		<li <?= ($this->tab == "images")? 'class="uk-active"' : '' ?> ><a href="#">Images</a></li>
		<li <?= ($this->tab == "videos")? 'class="uk-active"' : '' ?> ><a href="#">Videos</a></li>
		<li <?= ($this->tab == "stores")? 'class="uk-active"' : '' ?> ><a href="#">Stores</a></li>
		<li <?= ($this->tab == "platforms")? 'class="uk-active"' : '' ?> ><a href="#">Platforms</a></li>
	</ul>
</div>
<ul class="uk-switcher uk-margin switcher-container">
	<li>
		<?php $this->render("games/game/basic"); ?>
	</li>
	<li>
		<?php $this->render("games/game/extra"); ?>
	</li>
	<li>
		<?php $this->render("games/game/genres"); ?>
	</li>
	<li>
		<?php $this->render("games/game/images"); ?>
	</li>
	<li>
		<?php $this->render("games/game/videos"); ?>
	</li>
	<li>
		<?php $this->render("games/game/stores"); ?>
	</li>
	<li>
		<?php $this->render("games/game/platforms"); ?>
	</li>
</ul>

<!-- END UPLOAD ISH -->

<!-- Modal Structure -->
<div id="selectImageModal" uk-modal>

	<div class="uk-modal-dialog uk-modal-body">
		<div id="myManagerContainer">

		</div>
		<button class="uk-button uk-button-default uk-modal-close" type="button">CLOSE</button>
	</div>
</div>
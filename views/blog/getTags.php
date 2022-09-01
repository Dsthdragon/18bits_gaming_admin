<ul class="collection">
	<?php foreach($this->tags as $key => $value): ?>
		<li class="collection-item">
			<div>
				<?= $value['tag_name']; ?>
				<a data-id="<?= $value['id'] ?>" data-url="<?= URL ?>deletePostTags/<?= $value['id']; ?>" class="secondary-content deleteTag red-text" ><i class="fa fa-2x fa-trash"></i></a>
			</div>
		</li>
	<?php endforeach; ?>
</ul>
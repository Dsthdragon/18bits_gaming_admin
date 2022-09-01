<?php foreach($this->tags as $key => $value): ?>
	<li class="collection-item" onclick='$("#TagText").val("<?= $value['tag'] ?>") '><?= $value['tag']; ?></li>
<?php endforeach; ?>
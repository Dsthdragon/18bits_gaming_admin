<form action="<?= URL ?>game/<?= $this->game['id']; ?>/stores" method="POST" id="updateGameStore">
	<input type="hidden" name="form" form="updateGameStore" value="updateGameStore">
</form>
<div class="uk-card uk-card-default">
	<div class="uk-card-header">
		<div class="uk-grid">
			<div class="uk-width-1-1@s uk-width-1-3@m">
				STORES
			</div>
			<div class="uk-width-1-1@s uk-width-2-3@m uk-text-right">
				<button class="uk-button uk-button-danger" form="updateGameStore" name="action" value="delete" type="submit">
					<span class="fa fa-trash"></span>
				</button>
				<button class="uk-button uk-button-primary" href="#addGameStoreModal" uk-toggle>
					<span class="fa fa-plus"></span>
				</button>
			</div>
		</div>
	</div>
	<div class="uk-card-body">
		<table class="uk-table">
			<thead>
				<tr>
					<th></th>
					<th></th>
					<th>Store</th>
					<th>Status</th>
					<th>Created</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($this->gameStores as $key => $value): ?>
					<tr>
						<td>
							<input type="checkbox" class="uk-checkbox" name="stores[<?= $value['id'] ?>]" form="updateGameStore" value="<?= $value['id']; ?>">
						</td>
						<td><img width="50" src="<?= URL.$value['logo']; ?>" /></td>
						<td><?= $value['store_title']; ?></td>
						<td><?= $value['url']; ?></td>
						<td><?= $value['created_at']; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>


<div id="addGameStoreModal" uk-modal="">
	<div class="uk-modal-dialog">
		<div class="uk-modal-header">
            <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
            <h4 class="uk-modal-title">Add Game Store</h4>
		</div>
		<div class="uk-modal-body">
			<form action="<?= URL ?>game/<?= $this->game['id']; ?>/stores" method="POST" id="addGameStore">
				<div class="uk-grid">
					<label class="uk-width-1-4">Store:</label>
					<select name="store" class="uk-select uk-width-3-4" form="addGameStore">
						<?php foreach($this->availableStores as $key => $value): ?>
							<option value="<?= $value['id']; ?>"><?= $value['title']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="uk-grid">
					<label class="uk-width-1-4">URL:</label>
					<input type="text" name="url" form="addGameStore" class="uk-input uk-width-3-4" placeholder=''/>
				</div>
			</form>
		</div>
		<div class="uk-modal-footer">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="submit" name="form" value="addGameStore" form="addGameStore" >
                <span class="fa fa-save"></span> ADD
            </button>
		</div>
	</div>
</div>
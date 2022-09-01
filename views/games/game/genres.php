<form action="<?= URL ?>game/<?= $this->game['id']; ?>/genres" method="POST" id="updateGameGenre">
	<input type="hidden" name="form" form="updateGameGenre" value="updateGameGenre">
</form>
<form action="<?= URL ?>game/<?= $this->game['id']; ?>/genres" method="POST" id="addGameGenre">
	<input type="hidden" name="form" form="addGameGenre" value="addGameGenre">
</form>

<div class="uk-card uk-card-default">
	<div class="uk-card-header">
		<div class="uk-grid">
			<div class="uk-width-1-1@s uk-width-1-3@m">
				GENRES
			</div>
			<div class="uk-width-1-1@s uk-width-2-3@m uk-text-right">
				<input style="display: none;" type="text" name="genres" placeholder="Enter Genres Seperate by Commas for multiple" form="addGameGenre" class="uk-input uk-form-width-medium gameGenreEditMode" >
				<button style="display: none;" class="uk-button uk-button-primary gameGenreEditMode" form="addGameGenre" type="submit">
					<span class="fa fa-plus"></span>
				</button>
				<button style="display: none;" class="uk-button uk-button-danger gameGenreEditMode" form="updateGameGenre" name="action" value="delete" type="submit">
					<span class="fa fa-trash"></span>
				</button>
				<button class="uk-button uk-button-default" onclick="$('.gameGenreEditMode').toggle()"><span class="fa fa-edit"></span></button>
			</div>
		</div>
	</div>
	<div class="uk-card-body">
		<table class="uk-table">
			<thead>
				<tr>
					<th class="gameGenreEditMode" style="display: none;"></th>
					<th>Genre</th>
					<th>Created</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($this->gameGenres as $key => $value): ?>
					<tr>
						<td class="gameGenreEditMode" style="display: none;">
							<input type="checkbox" class="uk-checkbox" name="genres[<?= $value['id'] ?>]" form="updateGameGenre" value="<?= $value['id']; ?>">
						</td>
						<td><?= $value['genre_title']; ?></td>
						<td><?= $value['created_at']; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
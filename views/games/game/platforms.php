<form action="<?= URL ?>game/<?= $this->game['id']; ?>/platforms" method="POST" id="updateGamePlaform">
	<input type="hidden" name="form" form="updateGamePlaform" value="updateGamePlaform">
</form>
<div class="uk-card uk-card-default">
	<div class="uk-card-header">
		<div class="uk-grid">
			<div class="uk-width-1-1@s uk-width-1-3@m">
				PLATFORMS
			</div>
			<div class="uk-width-1-1@s uk-width-2-3@m uk-text-right">
				<button style="display: none;" class="uk-button uk-button-secondary gamePlatformEditMode" form="updateGamePlaform" name="action" value="update" type="submit">
					<span class="fa fa-save"></span>
				</button>
				<button style="display: none;" class="uk-button uk-button-danger gamePlatformEditMode" form="updateGamePlaform" name="action" value="delete" type="submit">
					<span class="fa fa-trash"></span>
				</button>
				<button class="uk-button uk-button-primary" href="#addGamePlatformModal" uk-toggle>
					<span class="fa fa-plus"></span>
				</button>
				<button class="uk-button uk-button-default" onclick="$('.gamePlatformEditMode').toggle()"><span class="fa fa-edit"></span></button>
			</div>
		</div>
	</div>
	<div class="uk-card-body">
		<table class="uk-table">
			<thead>
				<tr>
					<th class="gamePlatformEditMode" style="display: none;"></th>
					<th></th>
					<th>Platform</th>
					<th>Status</th>
					<th>Release Date</th>
					<th>Created</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($this->gamePlatforms as $key => $value): ?>
					<tr>
						<td class="gamePlatformEditMode" style="display: none;">
							<input type="checkbox" class="uk-checkbox" name="platforms[<?= $value['id'] ?>]" form="updateGamePlaform" value="<?= $value['id']; ?>">
						</td>
						<td><span class="<?= $value['logo']; ?>"></span></td>
						<td><?= $value['platform_title']; ?></td>
						<td>

							<span class="gamePlatformEditMode"><?= $value['status_title']; ?></span>

							<select name="status[<?= $value['id'] ?>]" class="uk-select gamePlatformEditMode" form="updateGamePlaform" style="display: none;">
								<?php foreach($this->status as $key => $val): ?>
									<option <?= ($value['status'] == $val['id']) ? "selected" : "" ?> value="<?= $val['id']; ?>"><?= $val['title']; ?></option>
								<?php endforeach; ?>
							</select>
						</td>
						<td>
							<span class="gamePlatformEditMode"><?= (strtotime($value['release_date']) == 0) ? "Coming Soon" : relative_time::wordmonth($value['release_date']) ; ?></span>
							<input type="text" name="release_date[<?= $value['id'] ?>]" form="updateGamePlaform" class="uk-input uk-width-3-4 singleDatePicker gamePlatformEditMode" value="<?= $value['release_date']; ?>" placeholder='Select Date' style="display: none;"/>
						</td>
						<td><?= $value['created_at']; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>


<div id="addGamePlatformModal" uk-modal="">
	<div class="uk-modal-dialog">
		<div class="uk-modal-header">
            <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
            <h4 class="uk-modal-title">Add Game Platform</h4>
		</div>
		<div class="uk-modal-body">
			<form action="<?= URL ?>game/<?= $this->game['id']; ?>/platforms" method="POST" id="addGamePlatform">
				
				<div class="uk-grid">
					<label class="uk-width-1-4">Platform:</label>
					<select name="platform" class="uk-select uk-width-3-4" form="addGamePlatform">
						<?php foreach($this->availablePlatforms as $key => $value): ?>
							<option value="<?= $value['id']; ?>"><?= $value['title']; ?> <span class="<?= $value['logo']; ?>"></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="uk-grid">
					<label class="uk-width-1-4">Status:</label>
					<select name="status" class="uk-select uk-width-3-4" form="addGamePlatform">
						<?php foreach($this->status as $key => $value): ?>
							<option value="<?= $value['id']; ?>"><?= $value['title']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="uk-grid">
					<label class="uk-width-1-4">Release Date:</label>
					<input type="text" name="release_date" form="addGamePlatform" class="uk-input uk-width-3-4 singleDatePicker" placeholder='Select Date'/>
				</div>
			</form>
		</div>
		<div class="uk-modal-footer">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="submit" name="form" value="addGamePlatform" form="addGamePlatform" >
                <span class="fa fa-save"></span> ADD
            </button>
		</div>
	</div>
</div>
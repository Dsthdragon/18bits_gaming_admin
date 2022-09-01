<div class="uk-card uk-card-default">
	<div class="uk-card-header">
		<div class="uk-grid">
			<div class="uk-width-1-1@s uk-width-1-3@m">
				EXTRA INFO
			</div>
			<div class="uk-width-1-1@s uk-width-2-3@m uk-text-right">

			</div>
		</div>
	</div>
	<div class="uk-card-body">
		<table class="uk-table uk-table-striped">
			<tbody>
				<tr>
					<th>Genres</th>
					<td>
						<?php 
							$genres = array_column($this->gameGenres, "genre_title");
							echo implode(", ", $genres);
						?>
					</td>
				</tr>
				<tr>
					<th>Stores</th>
					<td>
						<?php 
							$stores = array_column($this->gameStores, "store_title");
							echo implode(", ", $stores);
						?>
					</td>
				</tr>
				<tr>
					<th>Platforms</th>
					<td>
						<?php 
							$platforms = array_column($this->gamePlatforms, "platform_title");
							echo implode(", ", $platforms);
						?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
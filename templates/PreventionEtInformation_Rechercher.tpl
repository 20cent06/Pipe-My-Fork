<div>
	<div class="row">
		<div class="col-xs-3">
			<h3>Rechercher Pays</h3>
			<select class="form-control">
				<?php

				foreach (ListActualites->getLieux() as $lieu) {
				echo "<option>";
				echo $lieu['LIEUX'];
				echo "</option>"


				?>

			</select>

	</div>
</div>
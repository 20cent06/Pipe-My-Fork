<div>
	<div class="row">
		<div class="col-xs-3">
			<h3>Rechercher Pays</h3>
			<select class="form-control">
				<?php
				$listA = new ListActualites('France');
				foreach ($listA->getLieux() as $lieu) {
					$i=0;
					echo "<option>";
					echo $lieu['LIEUX'][$i];
					echo "</option>";
					$i = $i + 1;
				}


				?>

			</select>

	</div>
</div>
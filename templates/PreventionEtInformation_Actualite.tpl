<div class="Actualite">
	<h1>
		<?php
		$pdo = PdoTpPhp::getPdoTpPhp();
		$actualite = $pdo->getActualite(1); 
	
	echo $actualite['titre'];
	?> 
	<small>26/10/2014</small></h1>


	<div class="row">
			
		<div class="col-xs-9">
			<div class="cadre-contenu">
				<img src="img/Actualite-Ebola.png" class="img-responsive img-thumbnail" alt="img-responsive">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut congue erat suscipit, porttitor leo non, ultrices diam. Donec non quam mollis, blandit est ac, varius massa. Mauris a odio nec enim consequat imperdiet. Cras a rhoncus risus. Praesent nisi metus, malesuada eu lacinia nec, sodales eget nulla. Donec a auctor purus, vel pellentesque lectus. Donec quis condimentum leo, vel efficitur eros. Morbi eleifend finibus velit, sit amet vestibulum urna euismod quis.</br></br>

				Vivamus bibendum odio vitae justo malesuada sagittis. Donec laoreet massa a tortor dignissim volutpat. Nulla efficitur quam vel eros eleifend vehicula. Integer dolor purus, bibendum nec risus eu, eleifend finibus nibh. Quisque varius egestas augue eu feugiat. Quisque pulvinar eleifend libero eu iaculis. Nullam lectus ex, convallis eget nulla at, commodo luctus nunc. Cras iaculis ipsum at tellus venenatis vehicula. Nullam tincidunt vulputate bibendum.</br></br>

				Integer semper posuere augue a accumsan. Aliquam neque eros, luctus ut turpis iaculis, suscipit porta ligula. Curabitur et libero ac dolor finibus sollicitudin vel sit amet urna. Donec et mauris in diam rutrum maximus. Integer scelerisque orci a tortor dictum, vitae molestie felis dictum. Praesent elementum mauris eros, a semper eros laoreet in. Quisque enim tellus, finibus nec elit vitae, faucibus vestibulum elit. Proin malesuada non erat quis pretium. Proin luctus magna et mattis dignissim. Pellentesque odio orci, dictum in enim eu, interdum euismod sapien. Maecenas id arcu quis elit placerat consequat. Aliquam pellentesque hendrerit ex in luctus. Maecenas scelerisque urna mi, sed dapibus nunc fringilla vel. Nulla sodales vel risus et pulvinar. Nulla facilisi.</p>
			</div>
		</div>

		<div class="col-xs-2 col-xs-offset-1">
			<div class="cadre-menu-actualite img-thumbnail ">
				<h4> Autres Actualités : </h4>

				<p class="centrer img-thumbnail" style="width: 100%;"></p>

				<a href="#">
					<div class="centrer">
						<h5>La peste</br><small>26/10/2014</small></h5>
						<p class="centrer">Vivamus bibendum odio vitae justo malesuada sagittis. Donec laoreet massa a tortor dignissim volutpat ...</p>
					</div>
				</a>
				
				<p class="centrer img-thumbnail" style="width: 100%;"></p>

				<a href="#">
					<div class="centrer">
						<h5>La peste</br><small>26/10/2014</small></h5>
						<p class="centrer">Vivamus bibendum odio vitae justo malesuada sagittis. Donec laoreet massa a tortor dignissim volutpat ...</p>
					</div>
				</a>

			</div>
		</div>
	</div>

	
</div>
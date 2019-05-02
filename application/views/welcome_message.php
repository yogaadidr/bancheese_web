<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Daftar Menu</div>
				<div class="card-body">
					<div class="row">

					<?php

						foreach ($data['DATA'] as $menu) : ?>
						<div class="col-md-4">
							<div class="card"  style="margin-bottom: 16px;">
								<div class="card-header"><?= $menu['nama_menu'] ?></div>
								<div class="card-body"><?= $menu['harga'] ?></div>
							</div>
						</div>

						<?php endforeach;
					?>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
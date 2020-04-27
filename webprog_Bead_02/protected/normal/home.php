<?php 
	$query = "SELECT felh_nev, tema, tema_szoveg FROM posts ORDER BY id DESC";
	require_once DATABASE_CONTROLLER;
	$posts = getList($query);
?>
<?php if(count($posts) <= 0) : ?>
		<h1>Nincsennek postok az oldalon</h1>
	<?php else : ?>
		<table class="table table-dark">
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($posts as $p) : ?>
					<?php $i++; ?>
					<table class="table table-dark">
						<thead>
							<tr>
								<td><?=$p['felh_nev'] ?> | <?=$p['tema'] ?></td>
							</tr>
						</thead>
						<tbody>
						<tr>
							<td><?=$p['tema_szoveg'] ?></td>
						</tr>
						</tbody>
					</table>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>
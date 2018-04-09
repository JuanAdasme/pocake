<div class="row">
	<div class="col-md-12">
		<div class="page-header">
			<h2>
			Favoritos
			<?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Nuevo', ['controller' => 'bookmarks', 'action' => 'add'], ['class' => 'btn btn-primary pull-right', 'escape' => false]) ?>
			</h2>
		</div>
		<ul class="list-group">
			<?php foreach ($bookmarks as $bookmark): ?>
				<li class="list-group-item">
					<h4 class="list-group-item-heading"><?= h($bookmark->title) ?></h4>
					<p>
						<strong>
							<small>
								<?= $this->Html->link($bookmark->url, null, ['target' => '_blank']) ?>
							</small>
						</strong>
					</p>
					<p class="list-group-item-text">
						<?php h($bookmark->description) ?>
					</p>
				</li>
			<?php endforeach; ?>
		</ul>

		<div class="paginator">
			<ul class="pagination">
				<?= $this->Paginator->prev('< Anterior') ?>
				<?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
				<?= $this->Paginator->next('Siguiente >') ?>
			</ul>
			<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
		</div>

	</div>
	
</div>
<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h3><?= __('Users') ?></h3>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('first_name', ['Nombre']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('last_name', ['Apellido']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('email', ['Correo electrónico']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $this->Number->format($user->id) ?></td>
                            <td><?= h($user->first_name) ?></td>
                            <td><?= h($user->last_name) ?></td>
                            <td><?= h($user->email) ?></td>
                            <td><?= h($user->role) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id],['class' => 'btn btn-sm btn-info']) ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id], ['class' => 'btn btn-sm btn-primary']) ?>
                                <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $user->id], ['confirm' => __('Confirme que desea eliminar al usuario # {0}', $user->id), 'class' => 'btn btn-sm btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
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

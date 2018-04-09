
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2>Crear usuario</h2>
        </div>
        <?= $this->Form->create($user, ['novalidate']) ?>
        <fieldset>
            <?php
            echo $this->Form->control('first_name', ['label' => 'Nombre']);
            echo $this->Form->control('last_name', ['label' => 'Apellido']);
            echo $this->Form->control('email', ['label' => 'Correo electrónico']);
            echo $this->Form->control('password' , ['label' => 'Constraseña']);
            ?>
        </fieldset>
        <?= $this->Form->button('Crear') ?>
        <?= $this->Form->end() ?>
    </div>
</div>

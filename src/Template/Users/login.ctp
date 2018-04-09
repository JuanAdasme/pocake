<?= $this->Html->css('login') ?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="row">

  <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>

    <fieldset>
      <h2>Ingrese sus datos</h2>

      <hr class="colorgraph">

      <div class="form-group">

        <div class="input-group">

          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>

          <?= $this->Form->input('email', ['class' => 'form-control input-lg', 'placeholder' => 'Correo electrónico', 'label' => false, 'required']) ?>

        </div>

      </div>

      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

              <?= $this->Form->input('password', ['class' => 'form-control input-lg', 'placeholder' => 'Contraseña', 'label' => false, 'required']) ?>

            </div>

          </div>

        </div>



        <hr class="colorgraph">

        <div class="row">

          <div class="col-xs-6 col-sm-6 col-md-6">
            <?= $this->Form->button('Acceder', ['class' => 'btn btn-success btn-block btn-lg']) ?>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <?= $this->Html->link('Registrarse', ['controller' => 'Users', 'action' => 'add'],
            ['class' => 'btn btn-primary btn-block btn-lg']) ?>
          </div>

        </div>
      </div>
    </fieldset>
    <?= $this->Form->end() ?>
  </div>
</div>
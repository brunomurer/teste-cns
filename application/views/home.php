<div class="container" style="margin-top: 100px">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-body">
        <h2 style="margin-top:0px">Cadastrar paciente </h2>
         <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-info" role="alert" align="center"> <?php echo $this->session->flashdata('message') ?> </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger" role="alert" align="center"> <?php echo $this->session->flashdata('error') ?> </div>
        <?php endif; ?>
        <form class="" action="" method="post">
        <div class="form-group">
            <label for="varchar">Nome completo <?php echo form_error('nomeCompleto') ?></label>
            <input type="text" class="form-control" name="nomeCompleto" id="nomeCompleto" placeholder="Nome completo do titular" value="<?php echo $nomeCompleto; ?>" />
          </div>
          <div class="form-group">
            <label for="varchar">Nome da mãe <?php echo form_error('nomeMae') ?></label>
            <input type="text" class="form-control" name="nomeMae" id="nomeMae" placeholder="Nome da Mãe" value="<?php echo $nomeMae; ?>" />
          </div>
          <div class="form-group">
            <label for="varchar">Data de nascimento <?php echo form_error('dataNascimento') ?></label>
            <input type="date" class="form-control" name="dataNascimento" id="dataNascimento" placeholder="00/00/0000"  value="<?php echo $dataNascimento; ?>" />
          </div>
          <div class="form-group">
            <label for="varchar">CPF <?php echo form_error('numeroCpf') ?></label>
            <input type="number" class="form-control" name="numeroCpf" id="numeroCpf" placeholder="Numero do Cpf" value="<?php echo $numeroCpf; ?>" />
          </div>
          <div class="form-group">
            <label for="number">Numero do cartao de saúde<?php echo form_error('numeroCartao') ?></label>
            <input type="number" class="form-control" name="numeroCartao" id="numeroCartao" placeholder="Numero do cartao de saúde" value="<?php echo $numeroCartao; ?>" />
          </div>
          <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="<?php echo site_url('patients') ?>" class="btn btn-default">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

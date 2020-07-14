<div class="container" style="margin-top: 100px">
  <div class="col-md-10 col-md-offset-1">
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
          <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="varchar">Nome completo <?php echo form_error('nomeCompleto') ?></label>
              <input type="text" class="form-control" name="nomeCompleto" id="nomeCompleto" placeholder="Nome completo do titular" value="<?php echo $nomeCompleto; ?>" />
            </div>
            <div class="form-group">
              <label for="varchar">Nome da mãe <?php echo form_error('nomeMae') ?></label>
              <input type="text" class="form-control" name="nomeMae" id="nomeMae" placeholder="Nome da Mãe" value="<?php echo $nomeMae; ?>" />
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="varchar">Data de nascimento <?php echo form_error('dataNascimento') ?></label>
                  <input type="date" class="form-control" name="dataNascimento" id="dataNascimento" placeholder="00/00/0000"  value="<?php echo $dataNascimento; ?>" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="varchar">CPF <?php echo form_error('numeroCpf') ?></label>
                  <input type="text" class="form-control" name="numeroCpf" id="numeroCpf" placeholder="Numero do Cpf" value="<?php echo $numeroCpf; ?>" />
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="varchar">Numero do cartao de saúde<?php echo form_error('numeroCartao') ?></label>
              <input type="text" class="form-control" name="numeroCartao" id="numeroCartao" placeholder="Numero do cartao de saúde" value="<?php echo $numeroCartao; ?>" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="varchar">Endereço<?php echo form_error('endereco') ?></label>
                  <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Nome da rua/Avenida" value="<?php echo $endereco; ?>" />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="varchar">Número<?php echo form_error('numero') ?></label>
                  <input type="text" class="form-control" name="numero" id="numero" placeholder="Número" value="<?php echo $numero; ?>" />
                </div>
              </div>
            </div>
             <div class="row">
              <div class="col-md-6">
            <div class="form-group">
              <label for="varchar">Cep<?php echo form_error('cep') ?></label>
              <input type="text" class="form-control" name="cep" id="cep" placeholder="Número" value="<?php echo $cep; ?>" />
            </div>
            </div>
             <div class="col-md-6">
            <div class="form-group">
              <label for="varchar">Bairro<?php echo form_error('bairro') ?></label>
              <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro" value="<?php echo $bairro; ?>" />
            </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="varchar">Cidade<?php echo form_error('cidade') ?></label>
                  <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade" value="<?php echo $cidade; ?>" />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="varchar">Estado<?php echo form_error('estado') ?></label>
                  <input type="text" class="form-control" name="estado" id="estado" placeholder="Estado" value="<?php echo $estado; ?>" />
                </div>
              </div>
            </div>
          </div>
          </div>
          <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="<?php echo site_url('patients') ?>" class="btn btn-default">Cancelar</a> </div>
        </form>
      </div>
    </div>
  </div>
</div>

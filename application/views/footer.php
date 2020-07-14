
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
<script src="<?php echo base_url('assets/js/jquery-1.12.4.min.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        /* MASK */
        $('.cnpj').mask('00.000.000/0000-00', {placeholder: "cnpj"});
        $('.cpf').mask('000.000.000-00', {placeholder: "CPF"});
        $('.nascimento').mask('00/00/0000', {placeholder: "Nascimento"});
		
	});
</script>
</body></html>
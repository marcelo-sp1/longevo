<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');
?>
<script>
	function buscaPedido(pedido){		
		if(pedido != ""){
			$.ajax({
				url: '<?= base_url(); ?>' + 'index.php/pedidos/buscar',
				type: 'POST',
				data: {'pedido':pedido},		
				success: function(retorno){
					if(retorno == 'erro'){
						alert('Numero de pedido não encontrado');
						$('#pedido').focus();
						$('#pedido').css("background-color", "#cccccc"); 
					}else{
						$('#pedido').css("background-color", "white");
					} 
					
				}
					
			});
		}	
	}
</script>

<div id="container">
	<h1>Formulario de SAC -&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url('index.php/chamados/listar'); ?>"> <input name="lista" id="lista" value="Lista de Pedidos" class="btn btn-primary" type="text" ></a></h1>

	<div id="body">
		<form class="form-signin" action="<?php echo base_url('index.php/sac/enviar'); ?>" method="post" role="form">
			
			<input name="pedido" id="pedido" type="text" onkeyup="somenteNumeros(this);" class="btn btn-default navbar-btn" placeholder="Pedido" onblur="buscaPedido(this.value)" required autofocus value=""><br>
			<input name="nome" type="text" class="form-control" placeholder="Nome" required autofocus value=""><br>
			<input name="titulo" type="text" class="form-control" placeholder="Titulo" required autofocus value=""><br>			
			<input name="email" type="text" class="form-control" placeholder="Email" required autofocus value=""><br>
			<textarea name="obs" class="form-control" rows="5" cols="20" id="comment"></textarea><br>			
			
			<input type="submit" class="btn btn-lg btn-primary btn-block" value="Enviar" >
		</form>
	</div>	
</div>

</body>
</html>
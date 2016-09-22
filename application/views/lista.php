<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');
?>

<div id="container">
	<h1>Listagem de Chamados -&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(''); ?>"> <input name="lista" id="lista" value="Lista de Pedidos" class="btn btn-primary" type="text" ></a>
		</br></br>					
		<div class="row">
				<form action="<?php echo base_url('index.php/chamados/listarID'); ?>" method="post">
				  <div class="col-lg-6">
					<div class="input-group">
					  <span class="input-group-btn">
						<button class="btn btn-default"  type="submit">Go!</button>
					  </span>
					  <input type="text" id="chamado" onkeyup="somenteNumeros(this);" name ="chamado" class="form-control" placeholder="Numero Pedido...">
					</div>
				  </div>
				 </form>
	</h1>

	<div id="body">
		<table class ="table table striped">
			<tr>
			    <th>Num chamado<th>
				<th>titulo<th>
				<th>observação<th>				
			</tr>
			<?php foreach($lista as $list): ?>
			<tr>
				<td><?php echo $list->id; ?><td>
				<td><?php echo $list->titulo; ?><td>
				<td><?php echo $list->obs; ?><td>				
			</tr>
			<?php endforeach; ?>
			<?php if(isset($pagination) && $pagination != ""){ ?>
			<tr>
				<td colspan="4"><?php echo $pagination; ?><td>							
			</tr>				
			<?php } ?>
		</table>
		
	</div>	
</div>	

</body>
</html>
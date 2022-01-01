<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<?php
#incluinfo os dados necessarios
	include_once 'Connect.class.php';
	include_once 'Manager.class.php';


	# buscando os dados la na tabela
	$manager = new Manager;

	$dados = $manager->select_common("produto",null, ['codproduto'=>$_GET['id']], " ORDER BY codproduto DESC");	
?>

<div class="container">
	<div class="row">
		<div class="col-md-2">
			
		</div>

		<div class="col-md-8">
			
			<h3> Formulario de Edição </h3>


			<form action="controllerProduto.php" method="POST">
				<label> Produto </label>
				<input type="text" name="descricao" value="<?=$dados[0]['descricao'];?>" class="form-control"><br><br>

				<label> Peso </label>
				<input type="number" name="peso" value="<?=$dados[0]['peso'];?>" class="form-control"><br><br>

				<?php var_dump($dados[0]['controlado']); ?>
				<label> Situação </label>
				<select name="controlado" class="form-control" value="<?php switch ($dados[0]['controlado']) {
								case "1":
									echo "<td>Controlado</td>";
									break;
								case "0":
									echo "<td>DesControlado</td>";
									break;
							};?>">
					<option value="1">Controlado</option>
					<option value="0">Não controlado</option>
				</select><br><br>

				<label> Quantidade </label>
				<input type="number" name="qtdemin" value="<?=$dados[0]['qtdemin'];?>" class="form-control"><br><br>

				<input type="hidden" name="action" value="edit">
				<input type="hidden" name="codproduto" value="<?=$dados[0]['codproduto'];?>">

				<button class="btn btn-primary" type="submit"> Enviar </button>
			</form>
		</div>

	</div>

</div>
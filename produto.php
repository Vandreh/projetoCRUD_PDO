<?php 
	include_once 'Connect.class.php';
	include_once 'Manager.class.php';


	# buscando os dados la na tabela
	$manager = new Manager;

	$dados = $manager->select_common("produto",null, null, " ORDER BY codproduto DESC");
?>

<style>
	table{
		width: 90%;
		border: 2px;
	}
	td, th{
		width: 20%;
		border: 1px solid #000;
	} ;
	thead{font-weight: bold;}
	
</style>

<table cellspacing="0">
	<thead>
		<tr><th colspan="5">Produto</th></tr>
		<tr>
			<th>CÓDIGO</th>
			<th>DESCRIÇÃO</th>
			<th>PESO</th>
			<th>CONTROLADO</th>
			<th>QUANTIDADE</th>
		</tr>
	</thead>
	
	<tbody>
		<?php foreach($dados as $d): ?>
		<tr>
			<td><?=$d['codproduto'];?></td>
			<td><?=$d['descricao'];?></td>
			<td><?=$d['peso'];?></td>

			<?php switch ($d['controlado']) {
				case "1":
					echo "<td>Controlado</td>";
					break;
				case "0":
					echo "<td>Não Controlado</td>";
					break;
			};?>

			<td><?=$d['qtdemin'];?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
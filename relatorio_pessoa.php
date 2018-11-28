<?php	

	include_once("conexao.php");

	$id = $_GET['id'];

	require_once 'dompdf/lib/html5lib/Parser.php';
	require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
	require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
	require_once 'dompdf/src/Autoloader.php';
	Dompdf\Autoloader::register();


	$sql = "select idpessoas, nome, cpf, endereco, data_nascimento,
	genitor1, genitor2, endereco, rg,
	bairro, cep, genero,
	cidade, uf, renda, celular,
	telefone, cpf from pessoas where idpessoas = ".$id ;

	$result = mysqli_query($conexao,$sql) or die();

	$pessoa = mysqli_fetch_assoc($result);

	$datanascimento = date("d/m/Y",strtotime(str_replace('-','/',$pessoa['data_nascimento'])));
	$html = '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">';

		$html .= '<div class="container-fluid">';
		$html .= '<b>Nome: </b> ' . $pessoa['nome']. '<br>';
		$html .= '<b>CPF: </b>'. $pessoa['cpf']. '<br>';
		$html .= '<b>RG: </b>'. $pessoa['rg']. '<br>';
		$html .= '<b>Data de Nascimento: </b> ' . $datanascimento . '<br>';
		$html .= '<b>Gênero: </b>' . $pessoa['genero'] . '<br>';
		$html .= '<b>Renda(R$): </b>' . $pessoa['renda'] . '<br>';

		$html .= '<b>Endereço: </b>' . $pessoa['endereco'] .' <br>';
		$html .= '<b>Bairro: </b>' . $pessoa['bairro'] .'<br>';

		$html .= '<b>CEP: </b>' . $pessoa['cep'] . '<br>';
		$html .= '<b>Data de Cadastro: </b>25/10/2018 <br>';

		$html .= '<b>Cidade: </b>' . $pessoa['cidade']. '<br>';

		$html .= '<b>Telefone: </b>' . $pessoa['telefone']. '<br>';

		$html .= '<b>Celular: </b>' . $pessoa['celular']. '<br>';
		$html .= '<b>UF: </b>'. $pessoa['uf']. '<br>';
		$html .= '</div>';


	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega seu HTML
	$dompdf->load_html('
			<h2 style="text-align: center;">Relatorio Pessoas Detalhado</h2><hr/>
			'. $html .' <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>' . '
	 			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>' . '
	 			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_pessoa.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>
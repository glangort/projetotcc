<?php

require ('conexao.php');

$id = $_GET['id'];
$sql = "select idpessoas, nome, cpf, endereco, data_nascimento,
genitor1, genitor2, endereco,
bairro, cep, genero,
cidade, uf, renda, celular,
telefone, cpf from pessoas where idpessoas = 1";
  

  $result = mysqli_query($conexao,$sql) or die();
  $pessoa = mysqli_fetch_array($result);


    include("MPDF57/mpdf.php");
    $mpdf = new mPDF();

    //$html = '<h1>Welcome</h1>';
    $html = '<div class="container-fluid">
              <dl class="dl-horizontal">
                <dt>Nome:</dt>
                <dd><?php echo $pessoa[nome]; ?></dd>

                <dt>CPF:</dt>
                <dd><?php echo $pessoa[cpf]; ?></dd>

                <dt>Data de Nascimento:</dt>
                <dd><?php echo $pessoa[data_nascimento]; ?></dd>

                <dt>Gênero:</dt>
                <dd><?php echo $pessoa[genero];?></dd>
              </dl>

              <dl class="dl-horizontal">
                <dt>Endereço:</dt>
                <dd><?php echo $pessoa[endereco]; ?></dd>

                <dt>Bairro:</dt>
                <dd><?php echo $pessoa[bairro]; ?></dd>

                <dt>CEP:</dt>
                <dd><?php echo $pessoa[cep]; ?></dd>

                <dt>Data de Cadastro:</dt>
                <dd><?php echo $pessoa[datacadastro]; ?></dd>
              </dl>

              <dl class="dl-horizontal">
                <dt>Cidade:</dt>
                <dd><?php echo $pessoa[cidade]; ?></dd>

                <dt>Telefone:</dt>
                <dd><?php echo $pessoa[telefone]; ?></dd>

                <dt>Celular:</dt>
                <dd><?php echo $pessoa[celular]; ?></dd>

                <dt>UF:</dt>
                <dd><?php echo $pessoa[uf]; ?></dd>

              </dl>'; 

      $path       = 'upload/';
      $file_name ="pdfteste-".time().".pdf";
      $stylesheet = '<style>'.file_get_contents('pessoasrel.css').'</style>';  // Read the css file
      $mpdf->WriteHTML($stylesheet,1);  //
      $mpdf->WriteHTML($html,2);
      $mpdf->Output();

    /*-------------------- for genearte pdf close -----------------*/
?>
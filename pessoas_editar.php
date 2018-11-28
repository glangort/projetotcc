<?php require_once 'header.php'; ?>
<?php require 'conexao.php'; ?>


<?php
  session_start();
  if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
  {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
  }
   
  $usuario_login = $_SESSION['login'];
  $usuario_id =$_SESSION['idusario'];
  $usuario_nome = $_SESSION['nome'];

  $id = $_GET['id'];
  $sql = "select idpessoas, nome, cpf, endereco, data_nascimento,
  genitor1, genitor2, endereco, rg,
  bairro, cep, genero,
  cidade, uf, renda, celular,
  telefone, cpf from pessoas where idpessoas =". $id;


  if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $nome = $_POST["nome"];
  $cpf = $_POST["cpf"];
  $datanascimento = $_POST["datanascimento"];
  $datanascimento = date("Y-m-d",strtotime(str_replace('/','-',$datanascimento)));  
  $genitor1 = $_POST["genitor1"];
  $genitor2 = $_POST["genitor2"];
  $endereco = $_POST["endereco"];
  $bairro = $_POST["bairro"];
  $cep = $_POST["cep"];
  $genero = $_POST["genero"];
  $cidade = $_POST["cidade"];
  $uf = $_POST["estado"];
  $renda = $_POST["renda"];
  $renda = str_replace('.','',$renda); 
  $renda = str_replace(',','.',$renda);
  //  
  $celular = $_POST["celular"];
  $telefone = $_POST["telefone"];
  $rg = $_POST["rg"];

  $qryInsert = sprintf("
    update pessoas set
    nome = '%s' , cpf = '%s',data_nascimento = '%s',
    genitor1 = '%s', genitor2 = '%s', endereco = '%s',
    bairro = '%s', cep = '%s', genero = '%s',
    cidade = '%s', uf = '%s', renda = '%s',
    celular = '%s', telefone = '%s', rg = '%s',  data_atualizacao = Now() where idpessoas = '%s'" ,$nome, $cpf ,$datanascimento, $genitor1, $genitor2, $endereco, $bairro, $cep, $genero, $cidade, $uf, $renda, $celular, $telefone, $rg, $id);


    //echo "$qryInsert";
    

    $result = mysqli_query($conexao,$qryInsert);
    header("Location: principal.php");
      
}

   
  $result = mysqli_query($conexao,$sql) or die();
  $pessoa = mysqli_fetch_array($result);
  $id = $pessoa['idpessoas'];

  $datanascimento = date("d/m/Y",strtotime(str_replace('-','/',$pessoa['data_nascimento'])));  
?>
<?php echo "  
<form action='pessoas_editar.php?id=$id' method='post'>";
?>
  <hr />
  <div class="container-fluid">
     <div class="row">
        <div class="form-group col-md-5">
          <label for="name">Nome</label>
          <input type="text" class="form-control" name="nome" value="<?php echo $pessoa['nome']; ?>" required="required">
        </div>

        <div class="form-group col-md-2">
          <label for="campo2">CPF</label>
          <input type="text" class="form-control" name="cpf" id="cpf" value="<?php echo $pessoa['cpf']; ?>"required="required">
        </div>

        <div class="form-group col-md-3">
          <label for="campo2">RG</label>
          <input type="text" class="form-control" name="rg" id="rg" value="<?php echo $pessoa['rg']; ?> "required="required">
        </div>

        
      </div>

      <div class="row">
        <div class="form-group col-md-5">
          <label for="name">Genitor 1</label>
          <input type="text" class="form-control" name="genitor1" value="<?php echo $pessoa['genitor1'];?>" required="required">
        </div>

        <div class="form-group col-md-5">
          <label for="name">Genitor 2</label>
          <input type="text" class="form-control" name="genitor2" value="<?php echo $pessoa['genitor2'];?>" required="required">
        </div>
      </div>

        <div class="row">
          <div class="form-group col-md-5">
            <label for="campo1">Endereço</label>
            <input type="text" class="form-control" name="endereco" value="<?php echo $pessoa['endereco'];?>" required="required">
          </div>

          <div class="form-group col-md-3">
            <label for="campo2">Bairro</label>
            <input type="text" class="form-control" name="bairro" value="<?php echo $pessoa['bairro'];?>" required="required">
          </div>

          <div class="form-group col-md-2">
            <label for="campo3">CEP</label>
            <input type="text" class="form-control" name="cep" id="cep" value="<?php echo $pessoa['cep'];?>" required="required">
          </div>
        </div>

        <div class="row">

        <div class="form-group col-md-2">
        <label for="data-pagamento">Data de Nascimento</label>
                <div class="input-group date" data-date-format="dd/mm/yyyy" required="required">
                  <input  type="text" class="form-control" value="<?php echo $datanascimento ?>" name="datanascimento">
                  <div class="input-group-addon" >
                      <span class="glyphicon glyphicon-th"></span>
                  </div>
                </div>
        </div>

        <div class="form-group col-md-2">
          <label for="campo3">Gênero</label>
          <select class="form-control" id="genero" required="required" value="<?php echo $pessoa['genero'];?>" name="genero"> 
              <option>Masculino</option>
              <option>Feminino</option>
          </select>
        </div>

        <div class="form-group col-md-2">
          <label for="campo3">Data de Cadastro</label>
          <input type="text" class="form-control" name="dateCadastro" disabled>
        </div>

        <div class="form-group col-md-3">
          <label for="campo1">Cidade</label>
          <input type="text" class="form-control" name="cidade" value="<?php echo $pessoa['cidade'];?>" required="required">
        </div>

        <div class="form-group col-md-1">
          <label for="campo2">UF</label>
          <input type="text" class="form-control" name="estado" id="estado" value="<?php echo $pessoa['uf'];?>" required="required">
        </div>

        </div>

        <div class="row">       
          <div class="form-group col-md-2">
            <label for="campo1">Telefone</label>
            <input type="text" class="form-control" name="telefone" value="<?php echo $pessoa['telefone'];?>" id="telefone" required="required">
          </div>

          <div class="form-group col-md-2">
            <label for="campo2">Celular</label>
            <input type="text" class="form-control" name="celular" value="<?php echo $pessoa['celular'];?>" id="celular">
          </div>

          <div class="form-group col-md-2">
            <label for="campo3">Renda</label>
            <input type="text" class="form-control" name="renda" value="<?php echo $pessoa['renda'];?>" id="renda">
          </div>
        </div>
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="principal.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php require_once 'footer.html';  ?>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js'></script>
    <script>
      $('.input-group.date').datepicker({format: "dd/mm/yyyy"});
    </script>

    <script type="text/javascript" src="js/jquery.mask.min.js"></script>  
    <script type="text/javascript">
    $(document).ready(function(){
      $("#cpf").mask("000.000.000-00")
      $("#telefone").mask("(00) 00000-0000")
      $("#celular").mask("(00) 00000-0000")
      $("#renda").mask("999.999.990,00", {reverse: true})
      $("#cep").mask("00.000-000")
      $("#dataNascimento").mask("00/00/0000")
      
      /*$("#rg").mask("999.999.999-W", {
        translation: {
          'W': {
            pattern: /[X0-9]/
          }
        },
        reverse: true
      })
      
      var options = {
        translation: {
          'A': {pattern: /[A-Z]/},
          'a': {pattern: /[a-zA-Z]/},
          'S': {pattern: /[a-zA-Z0-9]/},
          'L': {pattern: /[a-z]/},
        }
      }*/
      
      $("#codigo").mask("AA.LLL.0000", options)
      
      $("#celular").mask("(00) 0000-00009")
      
      $("#celular").blur(function(event){
        if ($(this).val().length == 15){
          $("#celular").mask("(00) 00000-0009")
        }else{
          $("#celular").mask("(00) 0000-00009")
        }
      })
    })
    </script>
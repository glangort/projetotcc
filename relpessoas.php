<?php
       $id = $_GET['id'];
        //definimos uma constante com o nome da pasta
        define('MPDF_PATH', 'MPDF57/');
        //incluimos o arquivo
        include(MPDF_PATH.'mpdf.php');
        //definimos o timezone para pegar a hora local
        date_default_timezone_set('America/Brasilia');

        //Inicia o buffer, qualquer HTML que for sair agora será capturado para o buffer
        ob_start();
        include('relatorio_pessoas.html?id=$id');
        //Limpa o buffer jogando todo o HTML em uma variável.
        $html = ob_get_clean();
        $mpdf=new mPDF();
        //e escreve todo conteudo html vindo de nossa página html em nosso arquivo
        $mpdf->WriteHTML($html);
        $stylesheet = file_get_contents('pessoasrel.css');
        $mpdf->WriteHTML($css,1);
        //definimos o tipo de exibicao
        $mpdf->SetDisplayMode('fullpage');
        //definimos estilos de fonts
        $mpdf->useOnlyCoreFonts = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        //definimos se vamos exibir a marca d'agua
        $mpdf->showWatermarkText = false;
        $mpdf->SetWatermarkText('Marca d\'agua');
        //colocamos um icone de logo tipo no pdf
        $mpdf->SetWatermarkImage('icones/logoif.png', 1, '', array(140,10));
        //definimos se sera exibido ou nao o logo no pdf
        $mpdf->showWatermarkImage = false;
        //escrve o titulo de nosso pdf
        $mpdf->WriteHTML('<br/><h1>Teste</h1><hr/>');
        //definimos oque vai conter no rodape do pdf
        $mpdf->SetFooter('{DATE j/m/Y  H:i}||Pagina {PAGENO}/{nb}');
        //e finalmente escrevemos todo nosso conteudo no pdf para exibir
        $mpdf->WriteHTML($html);
        //fechamos nossa instancia ao pdf
        $mpdf->Output();
        //pausamos a tela para exibir o que foi feito
        header("Location:principal.php");
?>
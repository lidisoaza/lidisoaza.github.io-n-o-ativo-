<?php
//session_unset(); //Removendo sesssoes anteriores
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<!-- JS MODAL -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- FIM JS MODAL -->
    <meta charset="UTF-8">
    <title>Chignall Sports</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../estilos2/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />

	<!-- Theme style -->
    <link href="../estilos2/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../estilos2/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
        
    </head>  
    <body>
        
       




<?php


include_once '/home/chignall/www/chignall/util/controlelogin.class.php';
include_once '/home/chignall/www/chignall/modelo/profissionais.class.php';
include_once '/home/chignall/www/chignall/modelo/pessoa_fisica.class.php';
include_once '/home/chignall/www/chignall/util/validacao.class.php';

include_once '/home/chignall/www/chignall/dao/pessoa_fisicaDAO.class.php';
include_once '/home/chignall/www/chignall/modelo/upload_passaporte_pf.class.php';
include_once '/home/chignall/www/chignall/modelo/upload_identidade_pf.class.php';


//var_dump($_POST); //primeiro teste
    if(isset($_GET['op'])){
	switch($_GET['op']){
		
	
		case 'cadastrar_pessoa_fisica':
					
					
					//---------------------  PASSPOARTE PF  ----------------------------------------
					$erros = array();
					if(!empty($_FILES['passaporte_pf']['name'])){
						$up = new uploadPasspoartePF($_FILES['passaporte_pf']);
						$up->diretorio = '../arquivos_pf';
						
		
		
						/* Tipos de arquivos aceitos.. para aceitar outros arquivos, pesquise sobre mime-types em: http://www.webmaster-toolkit.com/mime-types.shtml 
						application/msword==> .doc
						application/vnd.openxmlformats-officedocument.wordprocessingml.document ==> .docx
						application/pdf ==> .pdf
						*/
						$aceitos = array('application/pdf','image/jpeg','image/png');
						$up->formatos = $aceitos;
						
						//Verificando se houve algum erro
						if($up->erro!=0){
							$erros[] = $up->obterErro();
						}
						if(!$up->verificarTamanho()){
							$erros[] = 'Tamanho invalido';
						}
						if(!$up->verificarTipo()){
							$erros[] = 'Formato de arquivo não permitido = ' . $up->tipo;
						}
						//if(!Validacao::validarNome($_POST['txtnome'])){
							//$erros[]='Nome incorreto';
						//}
					}else{
						$erros[] = 'Nenhum arquivo selecionado';
					}

						

					if(count($erros)!=0){
						//Enviando para a GuiUpload.php para mostrar os erros.
						ControleLogin::inserirVariavel('erros',$erros);
						
						//echo "<script>alert('Deu M!');location.href = '../visao/curriculo_externo.php';</script>";
						
						
					}else{
						
						
						//Retirar qualquer espaço que houve no nome
						$novonome = Validacao::retirarEspacos('PassaportePF_'.time());
						//Validacao::retirarEspacos($_POST['txtnome']);
						//enviando para upload o novonome sem os espaços
						//echo $_SESSION['caminho'];
						$up->upload($novonome);
						//redirecionando para o local onde o arquivo foi enviado. Opcional.
						//echo "<script>alert('Curriculo cadastrado com sucesso!');location.href = '../visao/upload.php';</script>";
						
					}
					
					
					
					//---------------------  IDENTIDADE PF  ----------------------------------------
					$erros = array();
					if(!empty($_FILES['identidade_pf']['name'])){
						$up = new uploadIdentidadePF($_FILES['identidade_pf']);
						$up->diretorio = '../arquivos_pf';
						
		
		
						/* Tipos de arquivos aceitos.. para aceitar outros arquivos, pesquise sobre mime-types em: http://www.webmaster-toolkit.com/mime-types.shtml 
						application/msword==> .doc
						application/vnd.openxmlformats-officedocument.wordprocessingml.document ==> .docx
						application/pdf ==> .pdf
						*/
						$aceitos = array('application/pdf','image/jpeg','image/png');
						$up->formatos = $aceitos;
						
						//Verificando se houve algum erro
						if($up->erro!=0){
							$erros[] = $up->obterErro();
						}
						if(!$up->verificarTamanho()){
							$erros[] = 'Tamanho invalido';
						}
						if(!$up->verificarTipo()){
							$erros[] = 'Formato de arquivo não permitido = ' . $up->tipo;
						}
						//if(!Validacao::validarNome($_POST['txtnome'])){
							//$erros[]='Nome incorreto';
						//}
					}else{
						$erros[] = 'Nenhum arquivo selecionado';
					}

						

					if(count($erros)!=0){
						//Enviando para a GuiUpload.php para mostrar os erros.
						ControleLogin::inserirVariavel('erros',$erros);
						
						//echo "<script>alert('Deu M!');location.href = '../visao/curriculo_externo.php';</script>";
						
						
					}else{
						
						
						//Retirar qualquer espaço que houve no nome
						$novonome = Validacao::retirarEspacos('IdentidadePF_'.time());
						//Validacao::retirarEspacos($_POST['txtnome']);
						//enviando para upload o novonome sem os espaços
						//echo $_SESSION['caminho'];
						$up->upload($novonome);
						//redirecionando para o local onde o arquivo foi enviado. Opcional.
						//echo "<script>alert('Curriculo cadastrado com sucesso!');location.href = '../visao/upload.php';</script>";
						
					}
					
					
					


                    //Cadastro sem validação
                    $pf = new PessoaFisica();
                    $pf->idProfissional			= $_POST['selprofissional'];
                    $pf->nome_completo_pf		= $_POST['txtnome_completo_pf'];
                    $pf->cpf_pf 				= $_POST['txtcpf_pf'];
					$pf->num_inscricao_cbf_pf	= $_POST['txtn_insc_cbf_pf'];
					$pf->email_pf 				= $_POST['txtemail_pf'];
					$pf->num_passaporte_pf 		= $_POST['txtnum_passaporte_pf'];
					$pf->caminho_passaporte_pf  = $_SESSION['caminho_passaporte_pf'];
					$pf->caminho_identidade_pf  = $_SESSION['caminho_identidade_pf'];
                    $pf->data_cadastro_pf 		= date('Y-m-d H:i:s');
					
					
					
				
					
                    
					$pfDAO = new PessoaFisicaDAO();
                    $pfDAO->cadastrarPessoaFisica($pf);
                    $_SESSION['pf'] = serialize($pf);
					

				break;
				

				default: 
					echo 'erro no switch';
				break;
				
				
				
				
        }//fecha switch
    }//FECHA ISSET OP    

?>
	
	<!-- jQuery 2.1.3 -->
    <script src="../estilos2/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../estilos2/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

	
    <!-- Slimscroll -->
    <script src="../estilos2/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../estilos2/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../estilos2/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../estilos2/dist/js/demo.js" type="text/javascript"></script>
	<script src="../js/funcoes.js" type="text/javascript"></script>
	<!-- page script -->
    
  	
	</body>	
</html>    

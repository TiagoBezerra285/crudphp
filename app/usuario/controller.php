<?php
	$titulo = "Manutenção de Usuários";
	$conexao = @mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	
	if( mysqli_connect_errno($conexao) ){
		echo "A conexão falhou, erro reportado: ".mysqli_connect_error();
		exit();
	}
	
	require("mdl_usuario.php");
	
	// qual será a view a ser carregada
	// p = listar, p = cadastrar e p = excluir
	
	if(isset($_GET['p'])) {
		$passo = $_GET['p'];
	} else {
		$passo = null;
	}
	
	
	switch($passo){
		case "cadastrar" :
			cadastrarUsuario( $conexao );
			break;
			
		case "alterar" :
			alterarUsuario( $conexao );
			break;
			
		case "excluir" :
			$retornoExc = excluirUsuario( $conexao );
			$dados = listarDados($conexao);
			require("view_lista.php");
			break;
		
		default:
			$dados = listarDados($conexao);
			require("view_lista.php");
			break;
	}
	
	function listarDados($conexao) {
		$resultado = usuario_listar($conexao);
		$data = array();
		
		while($row = mysqli_fetch_array($resultado)){
			$data[] = array("id" => $row['id'], "nome" => utf8_encode ( $row['nome'] ), "idade" => ($row['idade'] == "") ? "--" : $row['idade']);
		}
		
		return $data;
	}
	
	function excluirUsuario( $conexao ){
		$id_usuario = (isset($_GET["codigo"])) ? $_GET["codigo"] : -1;
		$resultado = usuario_excluir($conexao, $id_usuario);
		
		if($resultado) {
			return "Exclusão efetuada com sucesso!";
		} else {
			return "";
		}
	}
	
	function cadastrarUsuario( $conexao ) {
		$titulo = "Cadastro de novo usuário";
		// verificamos se o formulário foi postado
		if( isset($_POST['frmCadUsuario']) ) {
			// postou o formulário de cadastro
			$usuario = $_POST['txtNomeUsuario'];
			$idade   = $_POST['txtIdadeUsuario'];
			
			if(usuario_cadastrar( $conexao, $usuario, $idade )) {
				$retornoExc = "Usuário cadastrado com sucesso!";
				$dados = listarDados($conexao);
				require("view_lista.php");
			} else {
				echo "O cadastro falhou, tente novamente!";
				require("view_form_cadastro_novo_usuario.php");
			}
			
		} else {
			// mostrar o formulário de cadastro
			require("view_form_cadastro_novo_usuario.php");
		}
	}
	
	function alterarUsuario( $conexao ){
		
		$titulo = "Alterar Usuário";
		
		if(isset($_POST['idusuario'])) {
			$usuario = $_POST['txtNomeUsuario'];
			$idade   = $_POST['txtIdadeUsuario'];
			$id      = $_POST['idusuario'];
			
			if(usuario_alterar( $conexao, $usuario, $idade, $id)){
				$retornoExc = "Usuário alterado com sucesso!";
				$dados = listarDados($conexao);
				require("view_lista.php");
				return false;
			} else {
				echo "A alteração falhou, verifique os dados!";
			}
			
		}
		
		if(isset($_POST['idusuario'])){
			$id = $_POST['idusuario'];
		} else {
			$id = $_GET['codigo'];
		}
		
		$retorno = usuario_porId($conexao, $id);
		
		if(!$retorno){
			echo "Falha em buscar o usuário por ID";
			return false;
		}
		
		$dadosUsuario = mysqli_fetch_row($retorno);
		$dados = array("id" => $dadosUsuario[0], "nome" => $dadosUsuario[1], "idade" => $dadosUsuario[2]);
		require("view_form_cadastro_altera_usuario.php");
	}
	
	@mysqli_close($conexao);
	
	
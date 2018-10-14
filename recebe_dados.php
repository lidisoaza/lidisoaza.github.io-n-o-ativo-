<?php

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$localidade = $_POST['localidade'];
	$endereco = $_POST['endereco'];
	$depoimento = $_POST['depoimento'];
	
	echo "<script>alert('Denúncia registrada com sucesso!Nome: $nome Email: $email Localidade: $localidade Endereço: $endereco Depoimento: $depoimento');location.href = 'index.html';</script>";
	
	//echo "Nome: $nome<br>";
	//echo "Email: $email<br>";
	//echo "Localidade: $localidade<br>";
	//echo "Depoimento: $depoimento<br>";

	





?>
<?php
$conexao = mysql_connect('localhost', 'root', '')
or die ("Erro na conexão ao banco de dados.");
$db = mysql_select_db("saetis")
or die ("Ocorreu um erro na seleção ao banco de dados.");



?>
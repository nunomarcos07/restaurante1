<<?php  

Class Usuario {

    private $pdo;
	public $msgErro="";

	public function conectar($nome, $host, $usuario, $senha) 
	{
		global $pdo;
		try {

			$pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
			
		} catch (PDOException $e) {
			$msgErro = $e->getMessage();
			
		}
	}
	public function cadastrar($nome, $telefone, $email, $senha)
	{
		global $pdo;
		//Verificar se já existe email cadastrado
		$sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
		$sql->bindValue(":e",$email);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			return false;
		}
		else{
			$sql = $pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
			$sql->bindValue(":n",$nome);
			$sql->bindValue(":t",$telefone);
			$sql->bindValue(":e",$email);
			$sql->bindValue(":s",md5($senha));
			$sql->execute();
			return true;
		}

		//caso não, cadastrar
	}


	public function logar ($email, $senha)
	{
		global $pdo;

		//Verificar se oemail e senha estão cadastrado, se sim
		$sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
		$sql->bindValue(":e",$email);
		$sql->bindValue(":s",md5($senha));
		$sql->execute();
		if($sql->rowCount() > 0){
			//entra no sistema (sessão)
			$dado = $sql->fetch();
			session_start();
			$_SESSION ['id_usuario'] = $dado['id_usuario'];
			return true; //Logado com sucesso
		}
		else{

			return false;//Não foi possivel logar 

		}
	
	}

	public function logged($id_suario){
		global $pdo;

		$array = array();

		$sql = "SELECT nome FROM usuarios WHERE id_usuario = :id_usuario";
		$sql = $pdo->prepare($sql);
		$sql->bindValue("id_usuario",$id_suario);
		$sql->execute();

		if($sql->rowCount()> 0){
			$array = $sql->fetch();
		}
		return $array;

        

    }
}
?>
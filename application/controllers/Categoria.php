<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

	public function add()
	{
		// Instancia o objeto Categoria
		$categoria = new Entity\Categoria();

		// Define um nome para a categoria
	    $categoria->setNome('Teste 2');

		// Aplica a persistência dos dados e executa a inserção no banco
	    $this->doctrine->em->persist($categoria);
	    $this->doctrine->em->flush();
	}
}

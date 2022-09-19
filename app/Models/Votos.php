<?php 

class Votos
{
    private $id;
    private $nome;
    private $cpf;
    private $idade;
    private $candidato;
    private $dataRegistro;
    public $erro;

    public function __construct($nome, $cpf, $idade, $candidato)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->idade = $idade;
        $this->candidato = $candidato;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    
    public function getIdade()
    {
        return $this->idade;
    }

    public function setIdade($idade)
    {
        $this->idade = $idade;
    }
    
    public function getCandidato()
    {
        return $this->candidato;
    }

    public function setCandidato($candidato)
    {
        $this->candidato = $candidato;
    }
    
    public function getDataRegistro()
    {
        return $this->dataRegistro;
    }

    public function validarVotos() 
    {
        if (empty($this->nome)) {
            $this->erro = "O campo nome está vazio!";
        }

        if (empty($this->nome)) {
            $this->erro = "O campo CPF está vazio!";
        }

        if (empty($this->nome)) {
            $this->erro = "O campo idade está vazio!";
        }

        if (empty($this->nome)) {
            $this->erro = "Selecione um candidato!";
        }

        $this->cpf = str_replace("-", "",str_replace(".", "", $this->cpf));
        if(!is_numeric($this->cpf)) {
            $this->erro = "Digite somente números no CPF!";
        }

        if ($this->idade < 0 || $this->idade > 120 || !is_numeric($this->idade)) {
            $this->erro = "Idade inválida!";
        }

        if ($this->idade < 16) {
            $this->erro = "É necessário ter 16 anos ou mais para votar!";
        }
        
    }

    
}

?>
<?php

namespace Classes\Entity;

use \Classes\Dao\db;
use \PDO;
class funcionario{

    /**
     * Declaração das variáveis presentes no banco de dados.
     * obs: não precisa ser na mesma ordem do banco porém tem que ter o mesmo nome que está no banco,
     * pois mais à frente usaremos de uma funcionalidade do PDO para
     * atribuir os valores do banco diretamente à classe por meio do FETCH::CLASS.
     */
    public $idFuncionario;
    public $nome;
    public $dtNasc;
    public $sexo;
    public $telefone;
    public $email;
    public $perfil;
    public $login;
    public $senha;
    public $statusFuncionario;
   
    public function cadastrar(){

        $this->dataRegistro = date('Y-m-d H-i-s');

        $obdb = new db('funcionario');
        $this->idFuncionario = $obdb->insertSQL([
                            'nome' => $this->nome,
                            '$dtNasc'=>$this->dtNasc,
                            'sexo' =>$this->sexo,
                            'telefone'=> $this->telefone,
                            'email'=> $this->email,
                            'perfil'=> $this->perfil,
                            'login'=> $this->login,
                            'senha'=> $this->senha,
                            'statusFuncionario'=>$this->statusFuncionario

        ]);

    }

    /**
     * Função responsável por: executar a function presente em db.php->selectSQL passando os parâmetros desejados; Receber os dados pesquisados por ela; Atribuí-los
     * à classe por meio do PDO::FETCH_CLASS em várias instancias de uma só vez
     * Para mais informações sobre isso: descomentar a linha 14 de pesquisar.php. 
     * obs: pré requisito necessário: linhas já inseridas na tabela.
     *
     * @param string $where
     * @param string $like
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return array
     */
    public static function getFuncionario($where = null, $like = null, $order = null, $limit = null, $fields = '*'){
        return (new db('funcionario'))->selectSQL($where,$like,$order,$limit,$fields)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
    /**
     * Método para obter uma vaga específica por meio do uso do ID $id
     *
     * @param int $id
     * @return object
     */
    public static function gatFuncionario($idFuncionario){
        return (new db('funcionario'))->selectSQL('id = '.$idFuncionario)
                                   ->fetchObject(self::class); 

    }
}

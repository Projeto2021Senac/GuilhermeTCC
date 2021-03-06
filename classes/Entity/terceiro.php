<?php

namespace Classes\Entity;

use \Classes\Dao\db;
use \PDO;
class Terceiro{

    public $idTerceiro;
    public $nomeTerceiro;
    public $telefone;
    public $statusTerceiro;
    
   
    public function cadastro(){

        $this->dataRegistro = date('Y-m-d H-i-s');

         $obdb = new db('terceiro');
            $this->idTerceiro= $obdb->insertSQL([
            'nomeTerceiro' => $this->nomeTerceiro,
            'telefone' => $this->telefone,
            'statusTerceiro' => $this->statusTerceiro
        ])[1];
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
    public static function getTerceiros($where = null, $like = null, $order = null, $limit = null, $fields = '*'){
        return (new db('terceiro'))->selectSQL($where,$like,$order,$limit,$fields)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
    /**
     * Método para obter uma vaga específica por meio do uso do ID $id
     *
     * @param int $id
     * @return object
     */
    public static function getTerceiro($idTerceiro){
        return (new db('terceiro'))->selectSQL('idTerceiro = '.$idTerceiro)
                                   ->fetchObject(self::class); 

    }
    public function AtualizarTerceiro()
    {
        return (new db('terceiro'))->updateSQL('idTerceiro= ' . $this->idTerceiro, [
                'nomeTerceiro' => $this->nomeTerceiro,
                'telefone' => $this->telefone,
                'statusTerceiro' => $this->statusTerceiro
            ]);
    }
}

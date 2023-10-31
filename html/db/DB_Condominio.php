<?php 
    require_once "30_DB_crud.php";

    class Condominio extends CRUD{
        protected $table = 'CONDOMINIO';
        private $cnpj;
        private $nome;
        private $codigo_condominio;
        private $senha;
        private $email;
        private $regimento;
        private $tipo_moradia;
        private $endereco;
        private $faixa_qtd_moradores;

        public function insert(){
            $sql="INSERT INTO $this->table (cnpj, nome, codigo_condominio, senha, email, fk_regimento_codigo_regimento, fk_tipo_moradia_codigo_tipo_moradia, fk_endereco_codigo_endereco, fk_faixa_qtd_moradores_codigo_faixa) VALUES (:cnpj, :nome, :codigo_condominio, :senha, :email, :fk_regimento_codigo_regimento, :fk_tipo_moradia_codigo_tipo_moradia, :fk_endereco_codigo_endereco, :fk_faixa_qtd_moradores_codigo_faixa)";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':cnpj', $this->cnpj);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':senha', $this->senha);
            $stmt->bindParam(':codigo_condominio', $this->codigo_condominio);
            $stmt->bindParam(':fk_regimento_codigo_regimento', $this->regimento);
            $stmt->bindParam(':fk_tipo_moradia_codigo_tipo_moradia', $this->tipo_moradia);
            $stmt->bindParam(':fk_endereco_codigo_endereco', $this->endereco);
            $stmt->bindParam(':fk_faixa_qtd_moradores_codigo_faixa', $this->faixa_qtd_moradores);
            
            return $stmt->execute();
        }
        
        /***************
        Objetivo: Atuliza um cliente pelo id
        Parâmetro de entrada: $id - id do cliente
        Parâmetro de saída: Retorna true em caso de sucesso ou false em caso de falha.
        ***************/
        public function update($id){
            $sql="UPDATE $this->table SET nome = :nome, email = :email , senha = :senha,  WHERE cpf = :cpf ";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':cnpj', $this->cnpj);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':senha', $this->senha);
            $stmt->bindParam(':codigo_condominio', $this->codigo_condominio);
            $stmt->bindParam(':fk_regimento_codigo_regimento', $this->regimento);
            $stmt->bindParam(':fk_tipo_moradia_codigo_tipo_moradia', $this->tipo_moradia);
            $stmt->bindParam(':fk_endereco_codigo_endereco', $this->endereco);
            $stmt->bindParam(':fk_faixa_qtd_moradores_codigo_faixa', $this->faixa_qtd_moradores);
            return $stmt->execute();
        }
        
    }
?>
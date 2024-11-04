<?php


class Validacao
{

    public $validacoes = [];

    public static function validar($regras, $dados)
    {
        $validacao = new self;

        foreach ($regras as $campo => $regrasDoCampo) {
            foreach ($regrasDoCampo as $regra) {
                $valorDoCampo = $dados[$campo];

                if ($regra == 'confirmed') {
                    $validacao->$regra($campo, $valorDoCampo, $dados["{$campo}_confirmacao"]);
                } elseif (str_contains($regra, ':')) {
                    $temp = explode(':', $regra);

                    $regra = $temp[0];
                    $regraAr = $temp[1];
                    $validacao->$regra($regraAr, $campo, $valorDoCampo);
                } else {
                    $validacao->$regra($campo, $valorDoCampo);
                }
            }
        }

        return $validacao;
    }


    private function unique($table, $campo, $valor)
    {
        if (strlen($valor) == 0) {
            return;
        }

        $db = new DB(config('database'));

        $resultado = $db->query(
            query: "select * from 
        $table where $campo = :valor",
            params: ['valor' => $valor]
        )
            ->fetch();

        if ($resultado) {
            $this->validacoes[] = "O $campo informado já existe";
        }
    }

    private function required($campo, $valor)
    {
        if (strlen($valor) == 0) {
            $this->validacoes[] = "O $campo não pode ser vazio";
        }
    }

    private function email($campo, $valor)
    {
        if (!filter_var($valor, FILTER_VALIDATE_EMAIL)) {
            $this->validacoes[] = "O $campo informado é inválido";
        }
    }

    private function confirmed($campo, $valor, $valorDeConfirmacao)
    {
        if ($valor != $valorDeConfirmacao) {
            $this->validacoes[] = "O $campo de confirmação não confere";
        }
    }

    private function min($min, $campo, $valor)
    {
        if (strlen($valor) < $min) {
            $this->validacoes[] = "O $campo deve ter pelo menos $min caracteres";
        }
    }

    private function max($max, $campo, $valor)
    {
        if (strlen($valor) > $max) {
            $this->validacoes[] = "O $campo deve ter no máximo $max caracteres";
        }
    }

    private function strong($campo, $valor)
    {
        if (!preg_match('/[a-z]/', $valor) || !preg_match('/[A-Z]/', $valor) || !preg_match('/[0-9]/', $valor)) {
            $this->validacoes[] = "O $campo deve ter pelo menos uma letra e um número";
        }
    }
    public function naoPassou($nomeCustomizado = null)
    {

        $chave = 'validacoes';
        if ($nomeCustomizado) {
            $chave .= '_' . $nomeCustomizado;
        }
        flash()->push($chave, $this->validacoes);

        if ($this->validacoes !== null && is_array($this->validacoes)) {
            return sizeof($this->validacoes) > 0;
        } else {
            return false;
        }
    }
}

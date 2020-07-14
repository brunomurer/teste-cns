<?php

class Cns 
{
    private $cns;
    
    /**
     * Validate a given value
     * @param $label Identifies the value to be validated in case of exception
     * @param $value Value to be validated
     * @param $parameters aditional parameters for validation (ex: mask)
     */
    public function run($value, $parameters = NULL)
    {
        // Retira todos os caracteres que nao sejam 0-9
        $this->cns = preg_replace('/[^0-9]/', '', $value);
        
        // Retorna falso se for diferente que 15 caracteres
        if ((strlen(trim($this->cns))) != 15) { 
			//throw new Exception('The field ^1 has not a valid CNS');
			return false;
		}
		
		// Retorna falso se houver letras no cns
        if (!(preg_match('/[0-9]/',$this->cns)))
        {
           // throw new Exception('The field ^1 has not a valid CNS');
			return false;
        }
        
		$acao = substr($this->cns,0,1);
		switch ($acao)
		{
		    case '1':
		    case '2': $ret = $this->validaCNS(); break;
		    case '7': 
		    case '8':
		    case '9': $ret = $this->validaCNS_PROVISORIO(); break;
		    default: $ret = FALSE;
		}
		
		// Analisa o retorno e gera um Exception se for falso
		if (!$ret)
		{
  //         throw new Exception('The field ^1 has not a valid CNS');
			return $ret;
        } else {
		return $ret;	
		}
    }
    
    private function validaCNS()
    {
        $pis = substr($this->cns,0,11);
        $soma = 0;
        for ($i = 0, $j = strlen($pis), $k = 15; $i < $j; $i++, $k--)
        {
            $soma += $pis[$i] * $k;
        }
        $dv = 11 - fmod($soma, 11);
        $dv = ($dv != 11) ? $dv : '0'; // retorna '0' se for igual a 11

        if ($dv == 10)
        {
            $soma += 2;
            $dv = 11 - fmod($soma, 11);
            $resultado = $pis.'001'.$dv;
        }
        else
        {
            $resultado = $pis.'000'.$dv;
        }

		if ( $this->cns != $resultado )
		{
            return FALSE;
        }
        else
        {
        	return TRUE;
		}
	}
	
	private function validaCNS_PROVISORIO()
	{
	    $soma = 0;
        for ( $i = 0, $j = strlen($this->cns), $k = $j; $i < $j; $i++, $k-- )
        {
            $soma += $this->cns[$i] * $k;
        }
        return $soma % 11 == 0 && $j == 15;
	}
}
?>
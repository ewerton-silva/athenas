<?php

namespace App\Observers;

use App\Models\FinContaReceber;
use App\Models\FinRecebimento;
use App\Service\MovimentoContaBancariaService;

class RecebimentoObserver
{
    public function created(FinRecebimento $recebimento)
    { 
        MovimentoContaBancariaService::inserirMovimentoRecebimento($recebimento);       
        
        if($recebimento->conta_receber_id ){
            FinContaReceber::atualizar($recebimento->conta_receber_id);
        }
         
    }
    
   
}

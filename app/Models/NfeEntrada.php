<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\EmpresaTrait;

class NfeEntrada extends Model
{
    use HasFactory, EmpresaTrait;
    protected $fillable =[
        'transportadora_id',
        'fornecedor_id',
        'empresa_id',
        'fornecedor_id',
        'data_cadastro',
        'status_id',
        'chave',
        'recibo',
        'protocolo',
        'cUF',
        'cNF',
        'natOp',
        'indPag',
        'modelo',
        'serie',
        'nNF',
        'dhEmi',
        'dhSaiEnt',
        'tpNF',
        'idDest',
        'cMunFG',
        'tpImp',
        'tpEmis',
        'cDV',
        'tpAmb',
        'finNFe',
        'indFinal',
        'indPres',
        'indIntermed',
        'procEmi',
        'verProc',
        'dhCont',
        'xJust',
        'vBC',
        'vICMS',
        'vICMSDeson',
        'vFCP',
        'vBCST',
        'vST',
        'vFCPST',
        'vFCPSTRet',
        'vProd',
        'vFrete',
        'modFrete',
        'vSeg',
        'vDesc',
        'vII',
        'vIPI',
        'vIPIDevol',
        'vPIS',
        'vCOFINS',
        'vOutro',
        'vNF',
        'vTotTrib',
        'vOrig',
        'vLiq',
        'infAdFisco',
        'infCpl',
        'em_xNome',
        'em_xFant',
        'em_IE',
        'em_IEST',
        'em_IM',
        'em_CNAE',
        'em_CRT',
        'em_CNPJ',
        'em_CPF',
        'em_xLgr',
        'em_nro',
        'em_xCpl',
        'em_xBairro',
        'em_cMun',
        'em_xMun',
        'em_UF',
        'em_CEP',
        'em_cPais',
        'em_xPais',
        'em_fone',
        'em_EMAIL',
        'em_SUFRAMA',
        'atualizacao',
        'tPag'
    ];
    
    public function empresa(){
        return $this->belongsTo(Empresa::class,"empresa_id","id");
    }
    
    public function fornecedor(){
        return $this->belongsTo(Fornecedor::class,"fornecedor_id","id");
    }
    
    public function duplicatas(){
        return $this->hasMany(NfeEntradaDuplicata::class, 'nfe_id');
    }
    
    public function itens(){
        return $this->hasMany(NfeEntradaItem::class, 'nfe_id');
    }
    
    public static function filtro($filtro){
        $retorno = NfeEntrada::orderBy('nfe_entradas.data_cadastro', 'asc');
        if($filtro->fornecedor_id){
            $retorno->where("fornecedor_id", $filtro->fornecedor_id);
        }
        
        if($filtro->status_id){
            $retorno->where("status_id", $filtro->status_id);
        }else{
            $retorno->where("status_id", "!=", config("constantes.status.DELETADO"));
        }               
        
        if($filtro->data2){
            if($filtro->data2){
                $retorno->where("data_cadastro",">=", $filtro->data1)->where("data_cadastro","<=", $filtro->data2);
            }else{
                $retorno->where("data_cadastro", $filtro->data1);
            }
        }
        
        
        return $retorno->get();
    }
}

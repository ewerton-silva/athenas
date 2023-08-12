<?php

namespace App\Http\Controllers\Admin\Recorrencia;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Cobranca;
use App\Models\ProdutoRecorrente;
use App\Models\TipoCobranca;
use App\Models\VendaRecorrente;
use App\Service\ConstanteService;
use Illuminate\Http\Request;

class VendaRecorrenteController extends Controller{    
    
    public function index(){      
        $filtro = new \stdClass();
        $filtro->data1      = hoje();
        $filtro->data2      = hoje();
        $filtro->status_id  = null;
        $filtro->cliente_id = null;
        
        $dados["lista"]                 = VendaRecorrente::get();
        $dados["status"]                = ConstanteService::listaStatusVenda();
        $dados["status_financeiro"]     = ConstanteService::listaStatusFinanceiro();
        $dados["filtro"]                = $filtro;
        
        return view("Admin.Recorrencia.VendaRecorrente.Index", $dados);   
        
    }
    
    public function create(){      
      
        $dados["clientes"]          = Cliente::get();
        $dados["produtos"]          = ProdutoRecorrente::get();
        $dados["tipos"]             = TipoCobranca::get();
        $dados["clienteJs"]         = true;
        return view("Admin.Recorrencia.VendaRecorrente.Create", $dados);
    }    
    
    public function edit($id){
        $dados["lista"]             = Cobranca::where("venda_recorrente_id", $id)->get();
        $dados["vendarecorrente"]   = VendaRecorrente::find($id); 
        $dados["clientes"]          = Cliente::get();
        $dados["produtos"]          = ProdutoRecorrente::get();
        $dados["tipos"]             = TipoCobranca::get();
        
        $dados["clienteJs"]         = true;
        return view("Admin.Recorrencia.VendaRecorrente.Edit", $dados);
    }
    
    public function novaCobranca($id){
        $dados["tipos"]             = TipoCobranca::get();
        $dados["vendarecorrente"]   = VendaRecorrente::find($id);
        return view("Admin.Financeiro.Cobranca.Create", $dados);
    }
    
    public function gerarCobranca(Request $request){
        $req = $request->except(["_token","_method","qtde"]);
        try {
            $req["status_financeiro_id"]    = config('constantes.status.ABERTO');
            $req["valor_recorrente"]        = getFloat($req["valor_recorrente"]);
            $recorrencia                    = VendaRecorrente::find($request->venda_recorrente_id);
            $tipo_cobranca                  = TipoCobranca::find($req["tipo_cobranca_id"]);
            $qtde = $request->qtde;
            for($i=0; $i<$qtde; $i++){
                $cobranca = new \stdClass();
                $cobranca->venda_recorrente_id  = $recorrencia->id;
                $cobranca->cliente_id           = $recorrencia->cliente_id;
                $cobranca->descricao            = $req["descricao"] ?? "Cobrança Recorrente "  ;
                $cobranca->status_id            = config('constantes.status.ATIVO');
                $cobranca->status_financeiro_id = config('constantes.status.ABERTO');
                $cobranca->valor                = $recorrencia->valor_recorrente;
                $cobranca->data_cadastro        = hoje();
                $cobranca->data_vencimento      = somarData($req["primeiro_vencimento"], $tipo_cobranca->qtde_dias * $i);
                Cobranca::Create(objToArray($cobranca));
            }
            return redirect()->route('admin.vendarecorrente.edit', $recorrencia->id)->with('msg_sucesso', "Inserido com sucesso.");
            
        } catch (\Exception $e) {
            return redirect()->back()->with('msg_erro', $e->getMessage());
        }
    }
    
    public function store(Request $request){
        $req = $request->except(["_token","_method","qtde"]);
        try {          
            $req["status_id"]               = config('constantes.status.DIGITACAO');
            $req["status_financeiro_id"]    = config('constantes.status.ABERTO');
            $req["valor_primeira_parcela"]  = getFloat($req["valor_primeira_parcela"]);
            $req["valor_recorrente"]        = getFloat($req["valor_recorrente"]);
            $recorrencia = VendaRecorrente::Create($req); 
            $tipo_cobranca = TipoCobranca::find($req["tipo_cobranca_id"]);
            $qtde = $request->qtde;
            for($i=0; $i<$qtde; $i++){
                $valor = $recorrencia->valor_recorrente;
                if($i==0){
                    $valor = $req["valor_primeira_parcela"];
                    
                }
                $cobranca = new \stdClass();
                $cobranca->venda_recorrente_id  = $recorrencia->id;
                $cobranca->cliente_id           = $recorrencia->cliente_id;
                $cobranca->status_id            = config('constantes.status.ATIVO');
                $cobranca->status_financeiro_id = config('constantes.status.ABERTO');
                $cobranca->valor                = $valor;
                $cobranca->data_cadastro        = hoje();
                $cobranca->data_vencimento      = somarData($req["primeiro_vencimento"], $tipo_cobranca->qtde_dias * $i);
                Cobranca::Create(objToArray($cobranca));
            }
            return redirect()->route('admin.vendarecorrente.edit', $recorrencia->id)->with('msg_sucesso', "Inserido com sucesso.");
            
        } catch (\Exception $e) {
            return redirect()->back()->with('msg_erro', $e->getMessage());
        }
     }
    
     public function update(Request $request, $id){
         
         $req                    = $request->except(["_token","_method",  "file"]);
         
         try {
             $req["valor_primeira_parcela"]  = getFloat($req["valor_primeira_parcela"]);
             $req["valor_recorrente"]        = getFloat($req["valor_recorrente"]);             
             
             ProdutoRecorrente::where("id", $id)->update(objToArray($req));
             return redirect()->route('admin.produtorecorrente.index')->with('msg_sucesso', "Produto Inserido com sucesso.");
             
         } catch (\Exception $e) {
             return redirect()->back()->with('msg_erro', $e->getMessage());
         }
     }
     
     

   
    
}

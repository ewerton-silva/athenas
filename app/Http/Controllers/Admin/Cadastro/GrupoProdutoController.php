<?php

namespace App\Http\Controllers\Admin\Cadastro;

use App\Http\Controllers\Controller;
use App\Models\GrupoProduto;
use Illuminate\Http\Request;

class GrupoProdutoController extends Controller
{
    
    public function index()
    {
        $dados["lista"] = GrupoProduto::get();
        return view("Admin.Cadastro.GrupoProduto.Index", $dados);
    }

    
    public function create()
    {
        return view("Admin.Cadastro.GrupoProduto.Create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){      
        
        $req = $request->except(["_token","_method"]);
        $req["empresa_id"] = session('empresa_selecionada_id');
        GrupoProduto::firstOrCreate($req);
        return redirect()->route('admin.tributacao.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados["tributacao"]     = GrupoProduto::find($id);
        $dados["tributacaos"]    = GrupoProduto::where('empresa_id', session('empresa_selecionada_id'))->get();
        return view('Admin.Cadastro.GrupoProduto.Index', $dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $req     =   $request->except(["_token","_method"]);
        GrupoProduto::where("id", $id)->update($req);
        return redirect()->route("admin.tributacao.index");
    }


    public function destroy($id)
    {
        try{
            $h = GrupoProduto::find($id);
            $h->delete();
            return redirect()->back()->with('msg_sucesso', "Ítem apagado com sucesso.");
        }catch (\Exception $e){
            $cod = $e->getCode();
            return redirect()->back()->with('msg_erro', "Houve um problema ao apagar [$cod]");
        }
    }
}

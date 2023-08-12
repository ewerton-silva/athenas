<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\EmpresaTrait;

class CupomDesconto extends Model
{
    use HasFactory, EmpresaTrait;
    protected $fillable=["empresa_id","produto_id","categoria_id","ativo",
                         "descricao","valor_desconto","percentual_desconto","data_validade","qtde_limite"];
}

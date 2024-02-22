<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service       //estamos fazendo um injeção de dependencia do supportService e atribuindo a variavel $service
    )
    {}

    public function index(Request $request){    //também posso fazer isso com uma injeção de dependencias do laravel, ai nao preciso instanciar 
        
        $supports = $this->service->getAll($request->filter);   //estou utilizando a função que criei no SupportService

        return view('admin/supports/index', compact('supports'));  //compact('supports')); retorna um array que os indices são as colunas da tabela e o valor é o valor do registro?

    }   

    public function show(string | int $id)
    {
    
        if(!$support = $this->service->findOne($id)){   //estou utilizando a função que criei no SupportService
            return back();      //se Support nao encontrar o id, ele volta para a pagina
        }

        return view('admin/supports/show', compact('support'));
        
    }

    public function create()
    {
        return view('admin/supports/create');
    }

    public function store(StoreUpdateSupport $request, Support $support) //com o request eu pego todos os dados que vem da requisição
    {
        $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );

        return redirect()->route('supports.index');
    }

    public function edit(Support $support, string | int $id)
    {
        //if(!$support = $support->where('id', $id)->first()){
        if (!$support = $this->service->findOne($id)){  
            return back();
        }

        return view('admin/supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, Support $support, string $id) 
    {
        $this->service->update(
            UpdateSupportDTO::makeFromRequest($request)
        );

        if(!$support){
            return back();
        }

        return redirect()->route('supports.index');     
    }

    public function destroy(string | int $id)
    {
        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
     

}

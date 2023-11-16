<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Log;



class ContactController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('index');
    }

    public function index(Request $request){
        $search = $request->get('search');
        $contacts = Contact::where('name', 'like', '%' . $search . '%')
            ->orWhere('contact', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->paginate(10);
        session()->put('index_url', $request->url() . '?page=' . $request->get('page', 1));
        return view('contacts.index', compact('contacts'));
    }

    public function create(){
        return view('contacts.create');
    }

    public function store(ContactRequest $request){
        Contact::create($request->validated());
        return redirect()->route('contacts.index')->with('success', 'Contato salvo com sucesso!');
    }

    public function show(Contact $contact){
        session()->put('previous_url', url()->previous());
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact){
        session()->put('previous_url', url()->previous());
        return view('contacts.edit', compact('contact'));
    }

    public function update(ContactRequest $request, Contact $contact){
        $contact->update($request->validated());
        $index_url = session()->get('index_url', route('contacts.index'));
        return redirect($index_url)->with('success', 'Contato atualizado com sucesso!');
    }

    public function confirmDestroy(Contact $contact){
        session()->put('previous_url', url()->previous());
        return view('contacts.destroy', compact('contact'));
    }

    public function destroy(Contact $contact){
        $contact->delete();
        $index_url = session()->get('index_url', route('contacts.index'));
        return redirect($index_url)->with('success', 'Contato excluído com sucesso!');
    }


    public function roadmap(){
        session()->put('previous_url', url()->previous());
        $items = [
            [
                'href' => 'https://github.com/fscpinheiro/alfasoft/commit/a84841fdb5be9a20b736a23c4591daea118a239d',
                'heading' => 'Setup Local',
                'date' => '13/11',
                'content' => 'Criação do banco de dados, e configurações locais',
                'small' => '',
            ],
            [
                'href' => 'https://github.com/fscpinheiro/alfasoft/tree/24deeaf89a1a26934d0251fa2d4e15c5cea5b560',
                'heading' => 'Migration e Model',
                'date' => '13/11',
                'content' => 'Criação da migration e model para contato e usuario',
                'small' => '',
            ],
            [
                'href' => 'https://github.com/fscpinheiro/alfasoft/tree/de19bbd1c32b204809af1e099b7cb8e67a48e6ef',
                'heading' => 'Factory e Seeder',
                'date' => '13/11',
                'content' => 'Criação das Factories com Faker e Seeder para popular o banco a fim de realizar os testes',
                'small' => '',
            ],
            [
                'href' => 'https://github.com/fscpinheiro/alfasoft/tree/5c79f208a85d16f14b9f65ddbe964adc214ee17d',
                'heading' => 'ContactRequest, ContactController, ContactControllerTest',
                'date' => '13/11',
                'content' => 'Criação da request personalizada para contato, definição dos metodos do controle, incluindo um metodo a mais para destroy e testes automatizados para os metodos do controller.',
                'small' => '',
            ],
            [
                'href' => 'https://github.com/fscpinheiro/alfasoft/tree/72b9c18323597d4c8c7fd76b246f2a0a489baeda',
                'heading' => 'Views index, create, show, edit, destroy',
                'date' => '13/11',
                'content' => 'Criação das views confirmar exclusão, detalhamento do contato, lista dos contatos com paginação, criação e edição.',
                'small' => '',
            ],
            [
                'href' => 'https://github.com/fscpinheiro/alfasoft/tree/b42a3453606da0de9ddeb58e117031b0f7a236e6',
                'heading' => 'Correção do pull que foi errado!',
                'date' => '13/11',
                'content' => 'Correção das views, Implementação de sessão para paginação e Roadmap do que foi feito',
                'small' => '',
            ],
            [
                'href' => 'https://github.com/fscpinheiro/alfasoft/tree/b42a3453606da0de9ddeb58e117031b0f7a236e6',
                'heading' => 'Deploy + Menu com logout (correção)',
                'date' => '16/11',
                'content' => 'Correção das views, Implementação de sessão para paginação e Roadmap do que foi feito',
                'small' => '',
            ],
        ];
    
        return view('roadmap', ['items' => $items]);
    }

}

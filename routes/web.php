<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;

Route::get('/robots.txt', function () {
    return response(file_get_contents(public_path('robots.txt')), 200, [
        'Content-Type' => 'text/plain; charset=UTF-8',
    ]);
})->name('robots');

Route::view('/', 'home')->name('home');

Route::get('/solucoes', [ContentController::class, 'solutions'])->name('solutions');
Route::get('/solucoes/{solution}', [ContentController::class, 'solution'])->name('solutions.show');
Route::get('/setores', [ContentController::class, 'sectors'])->name('sectors');
Route::get('/setores/{sector}', [ContentController::class, 'sector'])->name('sectors.show');

Route::view('/sobre', 'about')->name('about');
Route::view('/resultados', 'results')->name('results');

Route::get('/contacto', [ContactController::class, 'create'])->name('contact');
Route::post('/contacto', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');

Route::get('/privacidade', function () {
    return view('legal', ['document' => [
        'title' => 'Política de Privacidade',
        'description' => 'Como recolhemos, utilizamos e protegemos os dados enviados através do website.',
        'notice' => 'Este texto é uma base de trabalho e ainda precisa de revisão jurídica antes da versão definitiva.',
        'sections' => [
            [
                'title' => 'Dados recolhidos',
                'paragraphs' => ['O formulário de consultoria recolhe nome, empresa, setor, telefone, email e mensagem para permitir o encaminhamento comercial e a resposta ao pedido.'],
                'items' => [],
            ],
            [
                'title' => 'Finalidade e fundamento',
                'paragraphs' => ['Os dados são tratados para responder ao contacto solicitado, preparar uma eventual proposta e manter o histórico necessário ao acompanhamento comercial.'],
                'items' => ['Resposta a pedidos de informação e consultoria', 'Comunicação relacionada com o pedido', 'Segurança, prevenção de abuso e cumprimento legal'],
            ],
            [
                'title' => 'Conservação e acesso',
                'paragraphs' => ['O acesso deve limitar-se às pessoas da Wecomp que necessitam dos dados para acompanhar o pedido. Os prazos de conservação serão definidos na versão jurídica final.'],
                'items' => [],
            ],
            [
                'title' => 'Direitos do titular',
                'paragraphs' => ['O titular pode solicitar acesso, correção ou eliminação dos seus dados através dos contactos oficiais da Wecomp, sujeito às obrigações legais aplicáveis.'],
                'items' => [],
            ],
        ],
    ]]);
})->name('privacy');

Route::get('/termos', function () {
    return view('legal', ['document' => [
        'title' => 'Termos de Utilização',
        'description' => 'Condições aplicáveis ao acesso e utilização do website institucional da Wecomp.',
        'notice' => 'Este texto é uma base de trabalho e ainda precisa de revisão jurídica antes da versão definitiva.',
        'sections' => [
            [
                'title' => 'Natureza da informação',
                'paragraphs' => ['O conteúdo deste website tem natureza institucional e informativa. Não substitui uma avaliação técnica, projeto, parecer legal ou proposta comercial.'],
                'items' => [],
            ],
            [
                'title' => 'Pedidos de consultoria',
                'paragraphs' => ['O envio de um formulário não constitui adjudicação, contrato ou garantia de execução. O âmbito e as condições são definidos após análise do pedido.'],
                'items' => [],
            ],
            [
                'title' => 'Propriedade intelectual',
                'paragraphs' => ['Textos, identidade visual, fotografias e materiais técnicos pertencem à Wecomp ou são utilizados com autorização. A reprodução depende de autorização prévia.'],
                'items' => [],
            ],
            [
                'title' => 'Limitação de responsabilidade',
                'paragraphs' => ['A Wecomp procura manter a informação atualizada, mas o enquadramento técnico e legal deve ser confirmado para cada instalação e contexto operacional.'],
                'items' => [],
            ],
        ],
    ]]);
})->name('terms');

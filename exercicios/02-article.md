Uma forma de revisar todo o conteúdo necessário para desenvolver, não somente em Laravel, mas em outros frameworks que trabalha com rotas e models, esse artigo serve para você realizar uma pesquisa sobre os assuntos citados abaixo para ter mais experiência dessas funcionalidades. Apenas responda os itens abaixo juntamente com pequenos exemplos.

#### Qual a importância das rotas? como usar?

As rotas são a porta de entrada da sua aplicação e possuem um papel fundamental na usabilidade do produto.

Ele permite voce registrar rotas que respondam a qualquer desses verbos HTTP

Route::get($uri, $callback);
Route::post($uri, $callback);
Route::put($uri, $callback);
Route::patch($uri, $callback);
Route::delete($uri, $callback);
Route::options($uri, $callback);

Algumas vezes voce pode registrar a resposta a multiplos verbos http.Você pode fazê-lo usando o método de correspondência. Ou, você pode até mesmo registrar uma rota que responde a todos os verbos HTTP usando qualquer método:
Route::match(['get', 'post'], '/', function () {
    //
});

Route::any('foo', function () {
    //
});


#### Qual é a importância das migrations no Laravel?
Ajuda equipes de desenvolvimento a não perderem tempo ao que se refere no banco de dados, o uso dela garante que o projeto ja tenha o banco de dados atualizado.

#### Quais as possibilidades e utilização dos controller?
Usando resource voce garante uma série de metodos prontos para uso, tambem é possivel criar metodos proprios para utilizacao.

#### Para que serve os arquivos blade?
É um motor de frontend criada pela laravel que permite uso de php fora as funcionalidades tradicionais que outros motores de frontend oferecem.



> Para enviar clone este repositório, crie uma pasta dentro de **exercicios** com **o seu nome**, e coloque sua pesquisa em formato **.md**

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="css/img/logo.png"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <script src="js/script.js" defer></script>
    <script src="js/formulario.js" defer></script>
    <title> Cadastro do condomínio - Domos </title>
    <title>Document</title>
</head>
<body>
    <div class="fundo-imagem pb-5">
        <!-- Cabeçalho da página --> 
        <header class="d-flex justify-content-between p-2">

            <!-- Ícone do site -->
            <a href="index.php"> <img src="css/img/logo_branca.png" class="img-fluid col-10 col-md-12 position-relative justify-content-start" alt="Domos"> </a>
            <div class="d-flex position-relative justify-content-end">

                 <!-- Menu -->
                <nav class="d-flex navbar navbar-expand-lg navbar-dark position-relative">
                    <div class="container-fluid d-flex justify-content-end">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                            <a class="text-end nav-link text-white fs-4 p-3" aria-current="page" href="index.php">Home</a>
                            <li class="nav-item">
                            <a class="text-end nav-link text-white fs-4 p-3" aria-current="page" href="#contatos">Contatos</a>
                            </li>
                            <li class="nav-item">
                            <a class="text-end nav-link text-white fs-4 p-3" href="index.php#sobre_nos">Sobre nós </a>
                            </li>
                            <li class="nav-item">
                            <a class="text-end nav-link text-white fs-4 p-3 bg-0491a3 hover-0dc0d8 rounded" href="login.php">Entrar</a>
                            </li>
                        </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <div class="col-12">
            <form>
                <div class="formulario m-auto col-9 col-md-7 col-lg-5 col-xl-4 p-5 mb-5 d-block" id="div_cadastro_condominio">
                    <h1 class="color-0491a3 fw-400 text-center mb-5">Cadastro do Condomínio</h1>
                    <label for="cnpj_condominio" class="text-start color-0491a3 fw-400 fs-4">CNPJ*</label>
                    <input type="text" id="cnpj_condominio" class="col-12 p-2 mb-3 input-form bg-e8e8e8 fs-4 text-black">
                    <label for="nome_condominio" class="text-start color-0491a3 fw-400 fs-4">Nome*</label>
                    <input type="text" id="nome_condominio" class="col-12 p-2 mb-3 input-form bg-e8e8e8 fs-4 text-black">
                    <label for="email_condominio" class="text-start color-0491a3 fw-400 fs-4">E-mail*</label>
                    <input type="email" id="email_condominio" class="col-12 p-2 mb-3 input-form bg-e8e8e8 fs-4 text-black">
                    <label for="senha_condominio" class="text-start color-0491a3 fw-400 fs-4">Senha*</label>
                    <input type="password" id="senha_condominio" class="col-12 p-2 mb-3 input-form bg-e8e8e8 fs-4 text-black">
                    <div class="text-end col-12 mt-4">
                        <button type="button" class="bg-005661 color-fff p-2 rounded border-0 button_formulario col-12 col-md-5 col-xl-4 fs-3 hover-0491a3" onclick="trocar_formulario()"> Continuar </button>
                    </div>

                </div>

                <div class="formulario m-auto col-9 col-md-7 col-lg-5 col-xl-4 p-5 mb-5 d-none" id="div_cadastro_endereco">
                <div class="d-flex p-3">
                    <button type="button" class="rounded-5 border-0 fs-1 bg-e8e8e8" onclick="voltar_formulario()"><i class="fa-solid fa-circle-arrow-left color-0491a3"></i></button>
                    <h1 class="color-0491a3 fw-400 text-center m-auto">Endereço</h1>
                </div>
                    <label for="cep_condominio" class="text-start color-0491a3 fw-400 fs-4 d-block">CEP*</label>
                    <input type="text" id="cep_condominio" class="col-4 input-form bg-e8e8e8 fs-4 p-2 mb-3 text-black d-block">
                    <div class="d-flex col-12 justify-content-between mb-3">
                        <label class="text-start color-0491a3 fw-400 fs-4 d-block col-5">Cidade*
                            <input type="text" id="cidade_condominio" class="col-12 input-form bg-e8e8e8 fs-4 p-2 text-black d-block">
                        </label>
                        <label class="text-start color-0491a3 fw-400 fs-4 d-block col-5">Estado*
                            <input type="text" id="estado_condominio" class="col-12 input-form bg-e8e8e8 fs-4 p-2 text-black d-block">
                        </label>
                    </div>
                    <label for="nome_condominio" class="text-start color-0491a3 fw-400 fs-4">Bairro*</label>
                    <input type="text" id="bairro_condominio" class="col-12 p-2 mb-3 input-form bg-e8e8e8 fs-4 text-black">
                    <label for="nome_condominio" class="text-start color-0491a3 fw-400 fs-4">Rua*</label>
                    <input type="text" id="rua_condominio" class="col-12 p-2 mb-3 input-form bg-e8e8e8 fs-4 text-black">

                    <div class="d-flex col-12 justify-content-between mb-3">
                        <label class="color-0491a3 fs-4 fw-400 col-3">Número*
                            <input type="text" id="numero" class="col-8 fs-4 p-2 text-black input-form bg-e8e8e8 d-block">
                        </label>
                        <label class="color-0491a3 fs-4 fw-400 col-8">Complemento
                            <input type="text" id="complemento" class="col-12 fs-4 p-2 text-black input-form bg-e8e8e8 d-block">
                        </label>
                    </div>
                    <div class="text-end col-12 mt-5">
                        <button type="button" class="bg-005661 color-fff p-2 rounded border-0 col-4 fs-3 hover-0491a3" onclick="trocar_formulario()"> Continuar </button>
                    </div>
                </div>

                <div class="formulario m-auto col-9 col-md-7 col-lg-5 col-xl-4 p-5 d-none" id="div_cadastro_informacoes">
                    <div class="d-flex p-3">
                        <button type="button" class="rounded-5 border-0 fs-1 bg-e8e8e8" onclick="voltar_formulario()"><i class="fa-solid fa-circle-arrow-left color-0491a3"></i></button>
                        <h1 class="color-0491a3 fw-400 text-center mb-5">Informações sobre o condomínio</h1>
                    </div>
                    <p class="color-0491a3 fs-4 fw-400 col-12 d-block">Faixa de moradores*
                        <select id="faixa_qtd_moradores" class="form-select d-block fs-4 p-2 color-0491a3 col-12 mb-5">
                            <option value="default" class="text-black">Escolha uma opção</option>
                            <option value="0-99" class="text-black">0-100</option>
                            <option value="100-249" class="text-black">100-249</option>
                            <option value="250-499" class="text-black">250-499</option>
                            <option value="500-749" class="text-black">500-749</option>
                            <option value="750-999" class="text-black">750-999</option>
                            <option value="1000+" class="text-black">1000+</option>
                        </select>
                    </p>
                    <div class="d-flex justify-content-between mb-5">
                        <div class="col-7">
                            <h4 class="color-0491a3 fs-4 fw-400 col-12 d-block">Tipo de divisão*</h4>
                            <input type="radio" name="divisao" id="numeros" class="">
                            <label for="numeros" class="text-black fs-4">Números</label><br>
                            <input type="radio" name="divisao" id="cores" class="">
                            <label for="cores" class="text-black fs-4">Cores</label><br>
                            <input type="radio" name="divisao" id="letras" class="">
                            <label for="letras" class="text-black fs-4">Letras</label><br>
                            <input type="radio" name="divisao" id="nenhum" class="">
                            <label for="nenhum" class="text-black fs-4">Nenhum</label><br>
                            <input type="radio" name="divisao" id="outro" class="">  
                            <label for="outro" class="text-black fs-4">Outro:</label>
                            <input type="text" id="outra_divisao" class="input-form bg-e8e8e8 text-black p-0 fs-4">
                            
                        </div>
                        <div class="col-6">
                            <h4 class="color-0491a3 fs-4 fw-400 col-12 d-block">Tipo de moradia*</h4>
                            <input type="radio" name="moradia" id="casas" class="">
                            <label for="casas" class="text-black fs-4">Casas</label><br>
                            <input type="radio" name="moradia" id="apartamentos" class="">
                            <label for="apartamentos" class="text-black fs-4">Apartamentos</label><br>
                            <input type="radio" name="moradia" id="casas_e_apartamentos" class="">
                            <label for="casas_e_apartamentos" class="text-black fs-4">Casas e Apartamentos</label><br>
                        </div>
                        
                    </div>
                    <div class="mb-5">
                        <label for="nome_divisao" class="form-label color-0491a3 fs-4">Digite os nomes das divisões separados por ponto e vírgula (;)*:</label>
                        <textarea class="form-control p-3 fs-4" id="nome_divisao" placeholder="Exemplo: A;B;C;D" rows="3"></textarea>
                    </div>
                    <div class="mb-5">
                        <label for="numero_casa" class="form-label color-0491a3 fs-4">Digite os números das casas / apartamentos separados por ponto e vírgula (;)*:</label>
                        <textarea class="form-control p-3 fs-4" id="numero_casa" placeholder="Exemplo: 101;102;103;104;201;202;203;204" rows="3"></textarea>
                    </div>
                    <div class="mb-5">
                      <label for="" class="form-label color-0491a3 fs-4">Insira o pdf de regimento interno (opcional):</label>
                      <input type="file" class="form-control" id="regimento_interno">
                    </div>
                    <div class="text-end col-12 mt-5">
                        <button type="button" class="bg-005661 color-fff p-2 rounded border-0 button_formulario col-4 fs-3 hover-0491a3" onclick="trocar_formulario()"> Continuar </button>
                    </div>
                </div>

                <div class="formulario m-auto col-9 col-md-7 col-lg-5 col-xl-4 p-5 d-none" id="div_cadastro_informacoes_opcionais">
                    <div class="d-flex p-3">
                        <button type="button" class="rounded-5 border-0 fs-1 bg-e8e8e8" onclick="voltar_formulario()"><i class="fa-solid fa-circle-arrow-left color-0491a3"></i></button>
                        <h1 class="color-0491a3 text-center fs-3 mb-4">Informações dos espaços públicos (opcional)</h1>
                    </div>
                    <div class="form-check mb-5">
                        <input class="form-check-input" type="checkbox" value="saloes_de_festas" id="saloes_de_festas">
                        <label class="form-check-label color-0491a3 fs-4" for="saloes_de_festas">
                            Salões de festas
                        </label><br>
                        <label for="desc_saloes_de_festas" class="form-label color-0491a3 fs-5"> Nomes dos salões de festa separados por ponto e vírgula(;):</label>
                        <textarea class="form-control" placeholder="Exemplo: Salão 1; Salão 2; Salão Especial" id="desc_saloes_de_festas" rows="1"></textarea>
                        
                        <input class="form-check-input" type="checkbox" value="churrasqueiras" id="churrasqueiras">
                        <label class="form-check-label color-0491a3 fs-4" for="churrasqueiras">
                        Churrasqueiras
                        </label><br>
                        <label for="desc_churrasqueiras" class="form-label color-0491a3 fs-5"> Nomes das churrasqueiras separados por ponto e vírgula(;):</label>
                        <textarea class="form-control" id="desc_churrasqueiras" placeholder="Exemplo: Churrasqueira bloco 1; Churrasqueira bloco 2; Churrasqueira premium" rows="1"></textarea>

                        <input class="form-check-input" type="checkbox" value="quadras" id="quadras">
                        <label class="form-check-label color-0491a3 fs-4" for="quadras">
                        Quadras
                        </label><br>
                        <label for="desc_churrasqueiras" class="form-label color-0491a3 fs-5"> Nomes das quadras separados por ponto e vírgula(;):</label>
                        <textarea class="form-control" id="desc_quadras" placeholder="Exemplo: Quadra de tênis; Quadra de vôlei; Quadra de futsal" rows="1"></textarea>

                        <input class="form-check-input" type="checkbox" value="saunas" id="saunas">
                        <label class="form-check-label color-0491a3 fs-4" for="saunas">
                        Saunas
                        </label><br>
                        <label for="desc_saunas" class="form-label color-0491a3 fs-5"> Nomes das saunas separados por ponto e vírgula(;):</label>
                        <textarea class="form-control" id="desc_saunas" placeholder="Exemplo: Sauna grande; Sauna pequena" rows="1"></textarea>

                        <input class="form-check-input" type="checkbox" value="sala_de_jogos" id="sala_de_jogos">
                        <label class="form-check-label color-0491a3 fs-4" for="sala_de_jogos">
                        Salas de jogos
                        </label><br>
                        <label for="desc_sala_de_jogos" class="form-label color-0491a3 fs-5"> Nomes das salas de jogos separados por ponto e vírgula(;):</label>
                        <textarea class="form-control" placeholder="Exemplo: Salão do térreo; Salão de sinuca" id="desc_sala_de_jogos" rows="1"></textarea>

                        <input class="form-check-input" type="checkbox" value="espaco_gourmet" id="espaco_gourmet">
                        <label class="form-check-label color-0491a3 fs-4" for="espaco_gourmet">
                        Espaços gourmet
                        </label><br>
                        <label for="desc_espaco_gourmet" class="form-label color-0491a3 fs-5"> Nomes dos espaços gourmet separados por ponto e vírgula(;):</label>
                        <textarea class="form-control" id="desc_espaco_gourmet" placeholder="Exemplo: Espaço gourmet térreo; Espaço gourmet cobertura; Espaço gourmet piscina" rows="1"></textarea>

                        <input class="form-check-input" type="checkbox" value="espaco_kids" id="espaco_kids">
                        <label class="form-check-label color-0491a3 fs-4" for="espaco_kids">
                        Espaços kids
                        </label><br>
                        <label for="desc_espaco_kids" class="form-label color-0491a3 fs-5"> Nomes dos espaços kids separados por ponto e vírgula(;):</label>
                        <textarea class="form-control" id="desc_espaco_kids" placeholder="Exemplo: Espaço kids 0-3 anos; Espaço kids 3-6 anos; Espaço kids 6-12 anos" rows="1"></textarea>
                    </div>

                    <div class="text-end col-12">
                        <button class="bg-005661 color-fff p-2 rounded border-0 col-4 fs-3 hover-0491a3"> Cadastrar </button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <!-- Rodapé da página --> 
    <footer class="bg-005661 position-absolute w-100">
        <div class="d-md-flex d-block justify-content-around col-12 pt-3" id="contatos">
            <div class="p-2 col-md-7 col-12">

                <h1 class="ps-md-2 text-center fs-1"> Contatos </h1>
                <div class="col-md-10 m-auto align-items-center"> 
                    <div class="bg-eB5661 d-flex flex-md-row flex-column align-items-center ms-2 p-3 fs-5 fs-md-3">
                        <button class="rounded-circle border-0 bg-0491a3" style="width:2.5rem; height:2.5rem;"> <i class="fa-regular fa-envelope"></i> </button>
                        <p class="m-0 p-2 fw-200"> projintegrador.domos@gmail.com </p>
                    </div>

                    <div class="bg-eB5661 d-flex flex-md-row flex-column align-items-center ms-2 p-3 fs-5 fs-md-3">
                        <button class="rounded-circle border-0 bg-0491a3" style="width:2.5rem; height:2.5rem;"> <i class="fa-brands fa-whatsapp color-fdfdfd"></i> </button>
                        <p class="m-0 p-2 fw-200"> (27)996517829 </p>
                    </div>

                    <div class="bg-eB5661 d-flex flex-md-row flex-column align-items-center ms-2 p-3 fs-5 fs-md-3">
                        <button class="rounded-circle border-0 bg-0491a3" style="width:2.5rem; height:2.5rem;"> <i class="fa-brands fa-instagram color-fdfdfd"></i> </button> 
                        <p class="m-0 p-2 fw-200"> @domosoficial </p>
                    </div>
                </div>
            </div>

            <div class="col-md-5 col-12">

                <h1 class="ps-2 text-center fs-1 p-2"> Colaboração </hl>

                <div class="d-flex flex-md-row flex-column align-items-center col-6 m-auto">
                    <img class="img-responsive w-50 col-3 f-2 mx-auto mt-5" src="css/img/ifes.png">
                    <img class="img-responsive col-3 f-2 mx-auto mt-5" src="css/img/inovaserra.png">
                </div> 

            </div>

            <br>
        </div>
            
        </footer>  
</body>
</html>

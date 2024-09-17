<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Horários - IFRO</title>
    <link rel="stylesheet" href="style-cadastro-prof.css"> 
</head>
<body>

    <div class="container"> 

        <h1>Gerenciamento de Horários - IFRO</h1>

        <section class="formulario-cadastro">
            <h2>Cadastro de Professor</h2>

            <form action="/cadastrar-professor" method="post"> 
                <div>
                    <label for="nome">Nome Completo:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>

                <div>
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                </div>

                <div>
                    <label for="matricula">Matrícula SIAP:</label>
                    <input type="text" id="matricula" name="matricula" pattern="[0-9]+" required>
                </div>

                <div>
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="text" id="data_nascimento" name="data_nascimento" pattern="\d{2}/\d{2}/\d{4}" required>
                </div>

                <div>
                    <label>Preferências:</label>
                    <label for="preferencias_sim">Sim</label>
                    <input type="radio" id="preferencias_sim" name="preferencias" value="sim">
                    <label for="preferencias_nao">Não</label>
                    <input type="radio" id="preferencias_nao" name="preferencias" value="nao" checked>
                </div>

                <div id="opcoes_preferencias" class="hidden"> 
                    <div>
                        <label>Dias:</label><br> 
                        <input type="checkbox" name="dias[]" value="segunda"> Segunda
                        <input type="checkbox" name="dias[]" value="terca"> Terça
                        <input type="checkbox" name="dias[]" value="quarta"> Quarta
                        <input type="checkbox" name="dias[]" value="quinta"> Quinta
                        <input type="checkbox" name="dias[]" value="sexta"> Sexta
                    </div>

                    <div>
                        <label>Turnos:</label><br>
                        <input type="checkbox" name="turnos[]" value="manha"> Manhã
                        <input type="checkbox" name="turnos[]" value="tarde"> Tarde
                        <input type="checkbox" name="turnos[]" value="noite"> Noite
                    </div>

                    <div>
                        <label for="horarios">Horários:</label>
                        <input type="text" id="horarios" name="horarios">
                        <div id="horarios_cadastrados"></div> 
                    </div>

                    <div>
                        <label for="turmas">Turmas:</label>
                        <input type="text" id="turmas" name="turmas">
                        <div id="turmas_selecionadas"></div> 
                    </div>
                </div>

                <button type="submit">Cadastrar</button>
            </form>
        </section>

        <section class="my-class">
            <h2>Importar Arquivo XLS</h2>

            <form action="/importar-xls" method="post" enctype="multipart/form-data"> 
                <div>
                    <label for="nome_arquivo">Nome do Arquivo:</label>
                    <input type="text" id="nome_arquivo" name="nome_arquivo">
                </div>

                <div>
                    <label for="arquivo">Arquivo:</label>
                    <input type="file" id="arquivo" name="arquivo" accept=".xls, .xlsx">
                </div>

                <div>
                    <label for="data_filtro">Filtrar por Data de Cadastro:</label>
                    <input type="text" id="data_filtro" name="data_filtro" pattern="\d{2}/\d{2}/\d{4}">
                </div>

                <button type="submit">Importar</button>
            </form>
        </section>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const preferenciasSim = document.getElementById('preferencias_sim');
            const preferenciasNao = document.getElementById('preferencias_nao');
            const opcoesPreferencias = document.getElementById('opcoes_preferencias');

            function togglePreferencias() {
                if (preferenciasSim.checked) {
                    opcoesPreferencias.classList.remove('hidden');
                } else {
                    opcoesPreferencias.classList.add('hidden');
                }
            }

            preferenciasSim.addEventListener('change', togglePreferencias);
            preferenciasNao.addEventListener('change', togglePreferencias);

            togglePreferencias(); // Initial check
        });
    </script>

</body>
</html>
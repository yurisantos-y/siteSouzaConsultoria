document.addEventListener('DOMContentLoaded', function() {
    function updateFrase() {
        // Encontra os elementos com a frase e o autor
        const fraseElement = document.getElementById('frase');
        const autorElement = document.getElementById('autorMostra');

        // Adiciona um console.log para indicar que a atualização da frase está ocorrendo
        console.log('Atualizando a frase...');

        // Atualiza a frase e o autor usando AJAX ou outra técnica de requisição ao servidor
        fetch('pages/atualizar_frase.php')
            .then(response => response.json())
            .then(data => {
                // Verifica se a variável data existe
                if (data) {
                    // Atualiza o conteúdo da frase e do autor
                    fraseElement.textContent = data.frase;
                    autorElement.textContent = "- " + data.autor;
                }
            })
            .catch(error => {
                console.error('Erro ao atualizar a frase:', error);
            });
    }

    // Atualiza a frase e o autor inicialmente
    fetch('pages/atualizar_frase.php')
        .then(response => response.json())
        .then(data => {
            // Chama a função updateFrase() para atualizar a frase e o autor
            updateFrase();
        })
        .catch(error => {
            console.error('Erro ao atualizar a frase:', error);
        });

    // Atualiza a frase e o autor a cada 5 segundos
    setInterval(function() {
        // Adiciona um console.log para indicar o início do intervalo de atualização
        console.log('Iniciando atualização periódica...');

        // Chama a função updateFrase() para atualizar a frase e o autor
        updateFrase();

        // Adiciona um console.log para indicar que a atualização periódica foi agendada
        console.log('Atualização periódica agendada.');
    }, 5000); // 5000 milissegundos = 5 segundos
});
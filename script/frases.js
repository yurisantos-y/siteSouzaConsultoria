function updateFrase() {
    // Encontra os elementos com a frase e o autor
    const fraseElement = document.getElementById('frase');
    const autorElement = document.getElementById('autorMostra');

    // Atualiza a frase e o autor usando AJAX ou outra técnica de requisição ao servidor
    // Aqui está um exemplo usando o Fetch API do JavaScript
    fetch('atualizar_frase.php')
        .then(response => response.json())
        .then(data => {
            // Atualiza o conteúdo da frase e do autor
            fraseElement.textContent = data.frase;
            autorElement.textContent = "- " + data.autor;
        })
        .catch(error => {
            console.error('Erro ao atualizar a frase:', error);
        });
}

// Atualiza a frase e o autor inicialmente
updateFrase();

// Atualiza a frase e o autor a cada 5 segundos
setInterval(updateFrase, 2000); // 2000 milissegundos = 5 segundos

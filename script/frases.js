function updateFrase() {
    // Encontra o elemento com a frase
    const fraseElement = document.getElementById('frase');

    // Atualiza a frase usando AJAX ou outra técnica de requisição ao servidor
    // Aqui está um exemplo usando o Fetch API do JavaScript
    fetch('atualizar_frase.php')
        .then(response => response.text())
        .then(newFrase => {
            // Atualiza o conteúdo da frase
            fraseElement.textContent = newFrase;
        })
        .catch(error => {
            console.error('Erro ao atualizar a frase:', error);
        });
}

// Atualiza a frase inicialmente
updateFrase();

// Atualiza a frase a cada 5 segundos
setInterval(updateFrase, 2000);
// Função para fechar o pop-up
function closePopup() {
    document.getElementById("popup").style.display = "none";
}

// Função para exibir o pop-up com a mensagem
function showPopup(message, success) {
    const popup = document.getElementById("popup");
    const popupMessage = document.getElementById("popupMessage");

    popupMessage.textContent = message;
    if (success) {
        popup.style.backgroundColor = "#4CAF50"; // Green background for success
    } else {
        popup.style.backgroundColor = "#F44336"; // Red background for error
    }

    popup.style.display = "block";

    // Fechar o pop-up após alguns segundos (opcional)
    setTimeout(function() {
        popup.style.display = "none";
    }, 3000); // O pop-up será fechado após 3 segundos (3000 ms)
}

// Função para enviar a frase e tratar a resposta do servidor
function enviarFrase() {
    // Obtém a frase do CKEditor do campo "areaTexto"
    const frase = CKEDITOR.instances.areaTexto.getData();

    // Realiza uma requisição para o servidor via AJAX
    fetch('salvar.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'areaTexto=' + encodeURIComponent(frase)
    })
    .then(response => response.json())
    .then(data => {
        // Exibe o pop-up com a mensagem do servidor
        showPopup(data.message, data.success);
    })
    .catch(error => {
        // Em caso de erro na requisição
        console.error('Erro na requisição AJAX:', error);
        showPopup('Erro ao enviar a frase. Por favor, tente novamente mais tarde.', false);
    });
}
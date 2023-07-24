// Função para fechar o pop-up
function closePopup() {
    document.getElementById("popup").style.display = "none";
}

document.addEventListener("DOMContentLoaded", function() {
    var popupMessage = localStorage.getItem("popup_message");
    var popupStatus = localStorage.getItem("popup_status");

    if (popupMessage !== null && popupMessage !== "") {
        var popupElement = document.getElementById("popup");
        var popupMessageElement = document.getElementById("popupMessage");

        // Exibe o pop-up
        popupMessageElement.innerText = popupMessage;
        if (popupStatus === "success") {
            popupMessageElement.style.color = "green";
        } else {
            popupMessageElement.style.color = "red";
        }
        popupElement.style.display = "block";

        // Limpa as informações do pop-up do localStorage
        localStorage.removeItem("popup_message");
        localStorage.removeItem("popup_status");
    }
});

// Restante do código do popup.js permanece o mesmo


$(document).ready(function() {
    // Intercepta o evento de envio do formulário
    $("#fraseForm").submit(function(event) {
        // Impede que o formulário seja enviado normalmente
        event.preventDefault();

        // Obtem os dados do formulário
        var formData = $(this).serialize();

        // Envia os dados via AJAX
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: formData,
            dataType: "json",
            success: function(response) {
                // Verifica a resposta do servidor
                if (response.success) {
                    // Define a mensagem do pop-up com sucesso ou erro
                    var popupMessage = response.message;
                    var popupElement = document.getElementById("popup");
                    var popupMessageElement = document.getElementById("popupMessage");

                    if (response.popup) {
                        popupMessageElement.style.color = "green";
                    } else {
                        popupMessageElement.style.color = "red";
                    }
                    popupMessageElement.innerText = popupMessage;

                    // Exibe o pop-up
                    popupElement.style.display = "block";

                    // Se a mensagem foi enviada com sucesso, limpa o conteúdo do CKEditor
                    if (response.success && response.popup) {
                        CKEDITOR.instances.areaTexto.setData("");
                    }
                } else {
                    alert("Erro ao enviar a mensagem!");
                }
            },
            error: function() {
                alert("Erro ao enviar a mensagem!");
            }
        });
    });
});

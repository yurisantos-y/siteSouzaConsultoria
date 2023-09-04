<?php
require '../vendor/autoload.php';

// Configurar as credenciais
putenv('GOOGLE_APPLICATION_CREDENTIALS=../planilhaprosp.json');

// Criar um cliente do Google Drive
$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->setScopes(Google_Service_Drive::DRIVE);

// Configurar a verificação de certificado SSL
$client->setHttpClient(new GuzzleHttp\Client([
    'verify' => false, // Defina isso como true para habilitar a verificação de certificado
]));

$service = new Google_Service_Drive($client);

// ID da pasta "php" no seu Google Drive (substitua pelo ID correto)
$pastaPhpId = '1Vn9NFv7VNQUfMpjLmbQxerdVhN2CDp1W';

if (isset($_FILES['planilha']) && $_FILES['planilha']['error'] === UPLOAD_ERR_OK) {
    // Nome do arquivo original que está sendo enviado pelo usuário
    $nomeArquivo = $_FILES['planilha']['name'];

    // Caminho local para o arquivo temporário
    $caminhoLocalArquivo = $_FILES['planilha']['tmp_name'];

    // Upload do arquivo para a pasta "php" no Google Drive
    $fileMetadata = new Google_Service_Drive_DriveFile([
        'name' => $nomeArquivo, // Mantém o nome original do arquivo
        'parents' => [$pastaPhpId], // Defina o ID da pasta como destino
    ]);

    $content = file_get_contents($caminhoLocalArquivo);
    $file = $service->files->create($fileMetadata, [
        'data' => $content,
        'mimeType' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'uploadType' => 'multipart',
    ]);

    // Imprimir o ID do arquivo no Google Drive
    echo 'Arquivo ID: ' . $file->id;
} else {
    // Ocorreu um erro no upload do arquivo
    echo 'Ocorreu um erro no upload do arquivo.';
}
?>

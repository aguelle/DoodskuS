<?php
session_start();

require_once "./vendor/autoload.php";
require_once './includes/_notif.php';
require_once "./includes/_dbCo.php";

header('content-type:application/json');
$data = json_decode(file_get_contents('php://input'), true);


if ($data['action'] === 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    if (strlen($data['text']) <= 0) throwAsyncError('Merci de saisir un texte pour la tâche.');

    $query = $dbCo->prepare("INSERT INTO customer (email) VALUES (:email);");
    $isQueryOk = $query->execute([
        'email' => $data['text']
        
    ]);

    if (!$isQueryOk || $query->rowCount() !== 1) throwAsyncError('Erreur lors de la création de la tâche');

    echo json_encode([
        'result' => true,
        'notification' => 'email enregistré',
        'idTask' => $dbCo->lastInsertId(),
        'email' => $data['text']
    ]);
    exit;
}
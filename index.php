<?php
use Controller\AutoController;

require_once __DIR__ . '/src/Controller/AutoController.php';

$data = array(
    'title' => 'Nordcode',
    'document_root' => $_SERVER['DOCUMENT_ROOT']
);

if ($_GET['path'] == "autoview"){
    $autoview = new AutoController(__DIR__ . '/src/View/AutoView.php', $data);
    $autoview ->render();
} else {
    $homeview = new AutoController(__DIR__ . '/src/View/HomeView.php', $data);
    $homeview->render();
}


<?php



header (string: 'Content-type: json/application');
require 'connect.php';
require 'functions.php';

$method = $_SERVER['REQUEST_METHOD']

$q = $_GET['q'];
$params = explode(delimiter: '/', $q);

$type = $params[0];
$id = $params[1];

if ($method === 'GET'){
    if ($type === 'ticket') {

        if (isset($id)) {
            getTickets($connect, $id);
        } else {
            getTickets($connect);
        }
    }
} elseif ($method === 'POST');{
    if ($type === 'ticket') ;{
    addTicket($connect,$_POST);
    }
} elseif ($method === 'PATCH');{
    if ($type === 'ticket') {
        if (isset($id));{
            $data = file_get_contents('php://input');
            $data = json_decode($data, true);
            die($data['tittle']);
            uppdareTicket($connect);
        }
    }
} elseif ($method === 'DELETE');{
    if ($type === 'tickets') {
        if (isset($id));{
            deleteTicket($connect, $id);




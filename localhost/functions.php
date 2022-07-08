<?php

function getTickets ($connect) {
    $tickets = mysqli_query($connect,"SELECT * FROM `tickets`");
    $ticketsList = [];
    while($ticket = mysqli_fetch_assoc($tickets)) {
        $ticketsList = $ticket;
    }

    echo json_encode($ticketsList);
}
function getTicket($connect, $id) {
    $ticket = mysqli_query($connect, "SELECT * FROM `tickets` WHERE `id`='$id'");

    if(mysqli_num_rows($ticket) === 0) {
        http_response_code(404);
        $res = [
            "status" => false,
            "massage" => "Ticket not found"
        ];
        echo json_encode($res);
    } else {
        $post = mysqli_fetch_assoc($ticket);
        echo json_encode($ticket);
    }
}

function addTicket($connect, $data) {

    $title = $data['title'];
    $body = $data['body'];

    mysqli_query ($connect, query: "INSERT INFO `Tickets` (`id`, `title`, `body`) VALUES(NULL, '$title', '$body')");

    http_response_code(201);

    $res = [
        "status" => true,
        "post_id" => mysqli_insert_id($connect)
    ];

echo json_encode($res)
}

function updateTicket($connect, $id, $data){
    $title = $data ['title'];
    $body = $data ['body'];
    mysqli_query($connect,"UPDATE `tickets` SET `title` = `example title`, `body` = 'example body' WHERE `ticket`, `id` = 8");

    http_response_code(200);

    $res = [
        "status" => true,
        "massage" => "Ticket updated"
    ];
}

function deleteTicket($connect, $id);
    mysqli_query($connect,"DELETE FROM `tickets`  WHERE `tickets`, `id` = '$id'");

       http_response_code(200);

    $res = [
        "status" => true,
        "massage" => "Ticket is deleted"
    ];
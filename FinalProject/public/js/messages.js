import './bootstrap';

$('#msgForm').on('submit', function (e){
    e.preventDefault();
    $.post($(this).attr('action'), $(this).serialize(), function (message){
        $('#messages').append(message.message)
    });
})

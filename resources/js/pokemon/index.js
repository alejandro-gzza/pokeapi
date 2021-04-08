$('#ajaxSubmit').click(function(event){
    event.preventDefault();
    let pokemon_id = $('input[name = pokemon_id]').val();
    let token = $('meta[name = csrf-token]').attr('content');
    $.ajax({
        url: '/api/pokemon/',
        type: 'POST',
        data: {
            pokemon_id: pokemon_id,
            _token: token
        },
        success: function(data){
            console.log('success');
            console.log(data);
            window.location.reload();
        },
        error: function(data){
            $('#ajaxError').html(data.responseJSON.message);
            console.log(data);
        }
    });
});

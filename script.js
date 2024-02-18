$(document).ready(function() {
    $('#testimonial-form').submit(function(event) {
        event.preventDefault();
        
        var name = $('#name').val();
        var comment = $('#comment').val();
        var rating = $('#rating').val();

        $.ajax({
            type: 'POST',
            url: 'add_testimonial.php',
            data: {
                name: name,
                comment: comment,
                rating: rating
            },
            success: function(response) {
                $('#testimonial-list').append('<div><p><strong>' + name + '</strong> (' + rating + ' étoiles): ' + comment + '</p></div>');
                $('#name').val('');
                $('#comment').val('');
                $('#rating').val('');
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});

$(document).ready(function() {
    $('#contact-form input').on('input', function() {
        var isValid = true;
        $('#contact-form input').each(function() {
            if ($(this).val() === '') {
                isValid = false;
                return false; // Sortir de la boucle si un champ est vide
            }
        });
        if (isValid) {
            $('#submit-btn').prop('disabled', false);
        } else {
            $('#submit-btn').prop('disabled', true);
        }
    });
});
$(document).ready(function () {
    $('input[type=radio]').change(function() {
        $('input[type=radio]:checked').not(this).prop('checked', false);
    });

    $('#add-new-materia').on('click', function(){
        console.log('Funciona');
    });
});
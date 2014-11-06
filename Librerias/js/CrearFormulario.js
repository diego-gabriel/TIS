$(document).ready(function() {
	$('#btn-agregar').on('click', function(event) {
		$('#escogidos').clone().appendTo('#todos')
		/* Act on the event */
	});

	$('#btn-guardar').on('click', function(event) {

		var url = "guardarFormulario.php"

            $.ajax({
                url: url,
                type: 'POST',
                data: $('#criteriosEscogidos').serialize(),

                success: function(data){

                $('#panelResultado').html(data)

                }

            });

        return false;
    });
	
});
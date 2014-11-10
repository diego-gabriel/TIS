$(document).ready(function() {

	$('#btn-agregar').on('click', function(event) {
    
        $('#escogidos').clone().appendTo('#todos')
		
	});

    $('#btn-guardar').on('click', function(event) {


            if($("form")[0].checkValidity()) 
            {
                var url = "GuardarFormulario.php"

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: $('#criteriosEscogidos').serialize(),

                    success: function(data){

                    $('#panelResultado').html(data)

                    }

                });

                return false;

            }
    });
});
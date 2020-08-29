$(document).ready(function(){

	var jSon = {};
	jSon.niveles = [];
	jSon.niveles.push({grados:[]})
	//var niveles  = [];
	//var grados = [];

	//revision de Check para el nivel inicial y primaria
	$('.check_level').change(
    function(){
        if ($(this).is(':checked')) {
            jSon.niveles.push({
            	'nivel_id'	:	$(this).val() 
            })

        }else{
        	me = $(this).val();
        	for (var i in jSon.niveles) {
		        if (jSon.niveles[i].nivel_id == $(this).val()) {
		        	//console.log('debo borrar el -->>>' + $(this).val())
		        	jSon.niveles.splice(i, 1)
		        }
		    }

        }

        //jSon.niveles = niveles;
		console.log(JSON.stringify(jSon));
    });

	//revision de Check para revisar el grado 
    $('.check_degree_inicial').change(
    function(){
        if ($(this).is(':checked')) {

        	console.log(jSon.niveles[0]);
            
            
            jSon.niveles[0].grados.push({
            	'grado_id'	:	$(this).val(),
            })

            /*
            jSon.niveles[0].grados.push({
            	'curso_id'	:	$(this).val(),
            })
            */
            
        }
/*
        else{
        	me = $(this).val();
        	for (var i in datos) {
		        if (datos[i].nivel_id == $(this).val()) {
		        	//console.log('debo borrar el -->>>' + $(this).val())
		        	datos.splice(i, 1)
		        }
		    }

        }
        */

        //jSon.niveles = niveles;
        //console.log(JSON.stringify(grados));
		console.log(JSON.stringify(jSon));
		
    });


})




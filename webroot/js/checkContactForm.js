$(document).ready(function(){
		$('#contact_form').bootstrapValidator({
			// utiliser les incons de feedback
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating :'glyphicon glyphicon-refresh'
			},

			fields: {
				name: {
					validators: {
						stringLength: { min : 2 }, 
						notEmpty:{ message: 'Veuillez remplir votre nom (minimum 2 caractères)'}
					}
				},

				email: {
					validators: {
						emailAddress: { message: 'Veuillez remplir votre email valide'},
						notEmpty: { message: 'Veuillez remplir votre email' }
					}
				}, 

				subject: {
					validators: {
						notEmpty: { message: 'Veuillez sélectionner le sujet de votre message'}
					}
				},

				message: {
					validators: {
						stringLength: { min: 20, message: 'Votre message doit avoir au minimum 20 caractères' },
						notEmpty: { message: 'Veuillez remplir votre message' }
					}
				}
			}
		})
		// si tout est validé
		.on('success.form.bv', function('e'){
			$('#success_message').slideDown({
				opacity: "show"}, "slow") // effet d'affichage du contenu

			//effacer les données une fois que le message de success affiche
			$('#contact_form').data('bootstrapValidator').resetForm();

			//eviter le rechargement de la page
			e.preventDefault();
			var $form = $(e.target);
			var bv= $form.data('bootstrapValidator');

			$.post($form.attr('action'),
				$form.serialize(), function(result){
					console.log(result);
				}, 'json');
		})
		// fin contact_form
	})
$.validator.addMethod('notNull',function(value,element){
	return value != null && value != '';
},'Please Select a value');
$('.userform').validate({
	rules: {    
		name:{
			required: true,			
			minlength:2
		},		
		email: {
		  required: true,
		  email: true
		},
		mobile:{
			required: true,			
			minlength:10
		},
		city:{
			required: true,			
			"notNull":true		
		},
		company:{
			required: true,			
			minlength:2
		}	
	},
	messages: {
		name: "Please specify your name",
		email: {
		  required: "We need your email address to contact you",
		  email: "Your email address must be in the format of name@domain.com"
		},
		mobile: {
		  required: "Please enter your Mobile no",			
			minlength:"Min 10 number",			
		},
		company: {
		  required: "Please enter your Company name"
		},
		city:{
		required: "Please select your city",	
		"notNull":'Please select your city'
		}
		
	},
	ignore:[],
	onfocusout: function(element){
		$(element).valid();
	},
	highlight: function(element){
		switch (element.type) {
			
			case 'select-one':
				$(element).parent().find('.ms-choice').addClass('error-mgs');
				break;
				
			default:
				$(element).closest('.input-group').addClass('error-mgs');
			
		}
		
	},
	unhighlight: function(element){
		switch (element.type) {
			
			case 'select-one':
				$(element).parent().find('.ms-choice').removeClass('error-mgs');
				break;
				
			default:
				$(element).closest('.input-group').removeClass('error-mgs');
			
		}
	},
	errorPlacement: function(error,element){
		error.appendTo(element.closest('li'));
	},
	submitHandler: function(form) {
		$.ajax({
		  url: "lead.php",
		  data: $(form).serialize()
		}).done(function(r) {			
			if(r.res) {
				$('#myModal').find('.modal-body').html('<p>Your details saved successfully, and we will get in touch with you shortly</p>');							
				document.getElementById('LeadSave').reset();
				$('.ms-choice').find('span').html('Select City');
			} else {
				$('#myModal').find('.modal-body').html('<p>Oops!! Some error occured.</p>')
				
			}
			$('#myModal').modal('show');			
		});
	}

	
});

$(document).ready(function(){
	$('#id_CandidateLocation').multipleSelect({
		filter:false,
		single:true,
		hideOptCheckboxes:false,
		selectAll:false,
		placeholder:'Select City',
		width:'100%',
		styler:function(value){
			if(value == ''){
				return 'display:none';
			}
		},
		onClick:function(obj) {			
			obj.inp.valid();
			
		}
	});
});

	numericOnly = function(evt){
        var evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if ((charCode > 47 && charCode < 58)    || charCode == 8 || charCode == 9 ){
            return !0;
        }
		evt.preventDefault();
        return !1;
    }
	
	stringOnly = function(evt){
		var evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if ((charCode > 47 && charCode < 58)){
            evt.preventDefault();
			return 0;
        }
		
        return 1;
    }
	
	document.getElementById("mobile").addEventListener("keypress", numericOnly, false);
	document.getElementById("name").addEventListener("keypress", stringOnly, false);
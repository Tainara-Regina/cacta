<!DOCTYPE html>
<html lang="pt">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cacta - Admin divulgar vagas</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	crossorigin="anonymous">
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

	<link rel="stylesheet" href="{{asset('/css/adminContrate/menu-admin.css')}}">
	<link rel="stylesheet" href="{{asset('/css/adminContrate/home-admin.css')}}">
	


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
	<script src="{{asset('/js/mascara.js')}}"></script>


	<script type="text/javascript">

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#blah')
					.attr('src', e.target.result);
				};

				reader.readAsDataURL(input.files[0]);
			}
		}

	</script>


	<style type="text/css">

		html,body{
			height:100%;
		}
		body{
			padding:0;
			margin:0;
			color: #2c3e51;
			background: #f5f5f5;
			font-family: 'Ubuntu', sans-serif;
		}
		.container{
			height:100%;
			display:flex;
			align-items:center;
			justify-content:center;
		}

		@media(max-width:34em){
			.main{
				min-width:150px;
				width:auto;
			}
		}
		select {
			display: none !important;
		}

		.dropdown-select {
			/* background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.25) 0%, rgba(255, 255, 255, 0) 100%); */
			background-repeat: repeat-x;
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#40FFFFFF', endColorstr='#00FFFFFF', GradientType=0);
			background-color: #fff;
			border-radius: 6px;
			border: solid 1px #eee;
			/* box-shadow: 0px 2px 5px 0px rgba(155, 155, 155, 0.5); */
			box-sizing: border-box;
			cursor: pointer;
			display: block;
			float: left;
			font-size: 14px;
			font-weight: normal;
			height: 42px;
			line-height: 40px;
			outline: none;
			padding-left: 18px;
			padding-right: 30px;
			position: relative;
			text-align: left !important;
			transition: all 0.2s ease-in-out;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			white-space: nowrap;
			width: auto;
		}

		.dropdown-select:focus {
			background-color: #fff;
		}

		.dropdown-select:hover {
			background-color: #fff;
		}

		.dropdown-select:active,
		.dropdown-select.open {
			background-color: #fff !important;
			border-color: #bbb;
			box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05) inset;
		}

		.dropdown-select:after {
			height: 0;
			width: 0;
			border-left: 4px solid transparent;
			border-right: 4px solid transparent;
			border-top: 4px solid #777;
			-webkit-transform: origin(50% 20%);
			transform: origin(50% 20%);
			transition: all 0.125s ease-in-out;
			content: '';
			display: block;
			margin-top: -2px;
			pointer-events: none;
			position: absolute;
			right: 10px;
			top: 50%;
		}

		.dropdown-select.open:after {
			-webkit-transform: rotate(-180deg);
			transform: rotate(-180deg);
		}

		.dropdown-select.open .list {
			-webkit-transform: scale(1);
			transform: scale(1);
			opacity: 1;
			pointer-events: auto;
		}

		.dropdown-select.open .option {
			cursor: pointer;
		}

		.dropdown-select.wide {
			width: 100%;
		}

		.dropdown-select.wide .list {
			left: 0 !important;
			right: 0 !important;
		}

		.dropdown-select .list {
			box-sizing: border-box;
			transition: all 0.15s cubic-bezier(0.25, 0, 0.25, 1.75), opacity 0.1s linear;
			-webkit-transform: scale(0.75);
			transform: scale(0.75);
			-webkit-transform-origin: 50% 0;
			transform-origin: 50% 0;
			box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.09);
			background-color: #fff;
			border-radius: 6px;
			margin-top: 4px;
			padding: 3px 0;
			opacity: 0;
			overflow: hidden;
			pointer-events: none;
			position: absolute;
			top: 100%;
			left: 0;
			z-index: 999;
			max-height: 250px;
			overflow: auto;
			border: 1px solid #ddd;
		}

		.dropdown-select .list:hover .option:not(:hover) {
			background-color: transparent !important;
		}
		.dropdown-select .dd-search{
			overflow:hidden;
			display:flex;
			align-items:center;
			justify-content:center;
			margin:0.5rem;
		}

		.dropdown-select .dd-searchbox{
			width:90%;
			padding: 0 0.5rem;
			border:1px solid #999;
			border-color:#999;
			border-radius:4px;
			outline:none;
		}
		.dropdown-select .dd-searchbox:focus{
			border-color:#12CBC4;
		}

		.dropdown-select .list ul {
			padding: 0;
		}

		.dropdown-select .option {
			cursor: default;
			font-weight: 400;
			line-height: 40px;
			outline: none;
			padding-left: 18px;
			padding-right: 29px;
			text-align: left;
			transition: all 0.2s;
			list-style: none;
		}

		.dropdown-select .option:hover,
		.dropdown-select .option:focus {
			background-color: #f6f6f6 !important;
		}

		.dropdown-select .option.selected {
			font-weight: 600;
			color: #12cbc4;
		}

		.dropdown-select .option.selected:focus {
			background: #f6f6f6;
		}

		.dropdown-select a {
			color: #aaa;
			text-decoration: none;
			transition: all 0.2s ease-in-out;
		}

		.dropdown-select a:hover {
			color: #666;
		}

	</style>









	<style type="text/css">
		.btn-file {
			position: relative;
			overflow: hidden;
		}
		.btn-file input[type=file] {
			position: absolute;
			top: 0;
			right: 0;
			min-width: 100%;
			min-height: 100%;
			font-size: 100px;
			text-align: right;
			filter: alpha(opacity=0);
			opacity: 0;
			outline: none;   
			cursor: inherit;
			display: block;
		}
	</style>

</head>


<body>
	<div class="page-wrapper chiller-theme toggled">
		<a id="show-sidebar" class="btn btn-sm btn-dark px-3 py-2" href="#">
			<i style="font-size: 25px;" class="fas fa-caret-right"></i>
		</a>

		@include('adminContratante.includes.menu-contratante')

		<!-- sidebar-wrapper  -->
		<main class="page-content">

			<div class="container-fluid">
				<div class="row">
					<div class="col text-center mb-3">


						@if(session()->has('message'))
						<div class="alert alert-success alert-dismissible py-4">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<h4>{{ session()->get('message') }}</h4>
						</div>
						@endif


						<h2>Preferencias</h2>


					</div>	
				</div>
			</div>


			<div class="container-fluid">
				<div class="row">
					<div class="col-md-9">
						<!-- 	<h3>Criar nova vaga</h3> -->
					
						

						<form action="{{route('site.cadastrar-preferencias')}}" id="formPart1" method="POST" enctype="multipart/form-data">
							@csrf


							<div class="form-group">
								<label for="email"><b>Excluir permanentemente seu cadastro</b></label>
								<a href="{{route('site.excluir-conta')}}">Excluir permanentemente sua conta?</a>
							</div>


						



							<button type="submit" class="btn btn-primary mb-5">Prosseguir</button>
						</form>

					</div>

					<div class="col-md-3">
						<div class="w-100 bg-dark" style="height: 200px">
							<p class="text-center">
								Banner
							</p>
						</div>

						<div class="w-100 bg-dark mt-5" style="height: 200px">
							<p class="text-center">
								Banner
							</p>
						</div>

					</div>


				</div>
			</div> 



		</div>
	</main>

	<!-- page-content" -->
</div>
<!-- page-wrapper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
crossorigin="anonymous"></script>

<script type="text/javascript" src="{{asset('/js/admin/admin-menu.js')}}"></script>


<script type="text/javascript">
	function create_custom_dropdowns() {
		$('select').each(function (i, select) {
			if (!$(this).next().hasClass('dropdown-select')) {
				$(this).after('<div class="dropdown-select wide ' + ($(this).attr('class') || '') + '" tabindex="0"><span class="current"></span><div class="list"><ul></ul></div></div>');
				var dropdown = $(this).next();
				var options = $(select).find('option');
				var selected = $(this).find('option:selected');
				dropdown.find('.current').html(selected.data('display-text') || selected.text());
				options.each(function (j, o) {
					var display = $(o).data('display-text') || '';
					dropdown.find('ul').append('<li class="option ' + ($(o).is(':selected') ? 'selected' : '') + '" data-value="' + $(o).val() + '" data-display-text="' + display + '">' + $(o).text() + '</li>');
				});
			}
		});

		$('.dropdown-select ul').before('<div class="dd-search"><input id="txtSearchValue" autocomplete="off" onkeyup="filter()" class="dd-searchbox" type="text"></div>');
	}

// Event listeners

// Open/close
$(document).on('click', '.dropdown-select', function (event) {
	if($(event.target).hasClass('dd-searchbox')){
		return;
	}
	$('.dropdown-select').not($(this)).removeClass('open');
	$(this).toggleClass('open');
	if ($(this).hasClass('open')) {
		$(this).find('.option').attr('tabindex', 0);
		$(this).find('.selected').focus();
	} else {
		$(this).find('.option').removeAttr('tabindex');
		$(this).focus();
	}
});

// Close when clicking outside
$(document).on('click', function (event) {
	if ($(event.target).closest('.dropdown-select').length === 0) {
		$('.dropdown-select').removeClass('open');
		$('.dropdown-select .option').removeAttr('tabindex');
	}
	event.stopPropagation();
});

function filter(){
	var valThis = $('#txtSearchValue').val();
	$('.dropdown-select ul > li').each(function(){
		var text = $(this).text();
		(text.toLowerCase().indexOf(valThis.toLowerCase()) > -1) ? $(this).show() : $(this).hide();         
	});
};
// Search

// Option click
$(document).on('click', '.dropdown-select .option', function (event) {
	$(this).closest('.list').find('.selected').removeClass('selected');
	$(this).addClass('selected');
	var text = $(this).data('display-text') || $(this).text();
	$(this).closest('.dropdown-select').find('.current').text(text);
	$(this).closest('.dropdown-select').prev('select').val($(this).data('value')).trigger('change');
});

// Keyboard events
$(document).on('keydown', '.dropdown-select', function (event) {
	var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find('.list .option.selected')[0]);
    // Space or Enter
    //if (event.keyCode == 32 || event.keyCode == 13) {
    	if (event.keyCode == 13) {
    		if ($(this).hasClass('open')) {
    			focused_option.trigger('click');
    		} else {
    			$(this).trigger('click');
    		}
    		return false;
        // Down
    } else if (event.keyCode == 40) {
    	if (!$(this).hasClass('open')) {
    		$(this).trigger('click');
    	} else {
    		focused_option.next().focus();
    	}
    	return false;
        // Up
    } else if (event.keyCode == 38) {
    	if (!$(this).hasClass('open')) {
    		$(this).trigger('click');
    	} else {
    		var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find('.list .option.selected')[0]);
    		focused_option.prev().focus();
    	}
    	return false;
        // Esc
    } else if (event.keyCode == 27) {
    	if ($(this).hasClass('open')) {
    		$(this).trigger('click');
    	}
    	return false;
    }
});

$(document).ready(function () {
	create_custom_dropdowns();
});
</script>



<script src="{{asset('/js/formularioContratante-2.js')}}"></script>


<script type="text/javascript">
	$('#id_segmento').one('change', function (e) {
    // Executa somente essa vez, não mais que isso
    confirm('Ao trocar o segmento da sua empresa, todas as vagas relacionadas a categoria anterior serão excluidas. Deseja continuar?');
});

</script>


</body>
</html>
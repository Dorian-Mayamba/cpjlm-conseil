@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="text-center text-green">Nos partenaires</h2>
	</div>

	<div class="partner-banner"></div>

	<div class="container">
		<div class="panel-body">
			<div class="row">
				@foreach($partners as $partner)
				<div class="col-sm-4 my-3 text-center">
					<h2><small>{{ $partner->partner_name }}</small></h2>
					<img class="w-50 h-50 img-thumbnail" src="{{ $partner->logo }}" alt="{{ $partner->partner_name }}" title="{{ $partner->partner_name }}">
					<button style="display:block" class="btn btn-lg btn-info mx-auto my-3 togglable" data-toggle="modal" data-target="#infoModal" data-attr="{{ route('partners.show',$partner->id) }}">En savoir plus</button>
				</div>
				@endforeach
			</div>
			<div id="infoModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="inFoModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-scrollable" role="document">
					<div class="modal-content">
						<div class="modal-header" id="partner_header">
							<button class="close" data-dismiss="modal">&times</button>
						</div>
						<div class="modal-body">
							<p class="description"></p>
							<div class="modal-link text-center">
							</div>
							<button style="float: right;" class="btn btn-danger btn-lg" data-dismiss="modal">Fermer</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var buttons = $('.togglable');
		$.each(buttons,(i,button)=>{
			$(button).click(function(){
				var href=$(this).attr('data-attr');
				$.ajax({
					url:href,
					method: "GET"
				})
				.done(function(data){
					var modalHeader = $('#partner_header');
					modalHeader.css({
						backgroundImage:`url(${data.logo})`,
						backgroundRepeat: "no-repeat",
						backgroundSize:"100% 100%",
						height: "25vh"
					});
					var partner_name = $('.partner_name');
					$(partner_name).text(`${data.partner_name}`);
					var description = $('.description');
					description.text(`${data.description}`);
					var modalLink = $('.modal-link');
					if(!$(modalLink).children().length>0){
						var a = document.createElement('a');
						$(a).addClass('link');
						modalLink.append(a);
						$(a).attr('href',`${data.partner_website}`);
						console.log(a);
						$(a).text("Acceder au Site Web du partenaire");
					}else{
						var link = $('.link');
						link.attr('href',`${data.partner_website}`);
					}

				})
				.fail(function(error){
					console.log(error.responseText);
				})
			})
		})
	})
</script>

@endsection
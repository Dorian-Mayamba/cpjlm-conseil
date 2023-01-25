@extends('layouts.app')

@section('content')
@if($errors->any())
<div class="container text-center">
	<ul class="text-danger">
		@foreach($errors->all() as $message)
		<li style="list-style: none;">{{ $message }}</li>
		@endforeach
	</ul>
</div>
@endif

@if(Session::has('delete-success'))
<div class="alert alert-success">
	<h2><small>{{ Session::get('delete-success') }}</small></h2>
</div>
@endif

@if(Session::has('update-success'))
<div class="alert alert-success">
	<h2><small>{{ Session::get('update-success') }}</small></h2>
</div>
@endif

<div class="jumbotron" id="dashboard"></div>
<div class="container text-center table-responsive">
	<h2 class="text-center mb-4">Ajouter un partenaire</h2>
	<button class="btn btn-info btn-lg" data-toggle="modal" data-target="#addPartnerModal">Nouveau Partenaire</button>
	<div class="modal fade" id="addPartnerModal">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="text-center text-green">Ajouter un partenaire</h1>
					<button class="close" data-dismiss="modal">&times</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{ route('addPartner') }}" enctype="multipart/form-data">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						<div class="form-group">
							<label for="partner_name">Nom du partenaire</label>
							<input type="text" name="partner_name" id="partner_name" placeholder="nom du partenaire">
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<textarea class="form-control" name="description" id="description" rows="5"></textarea>
						</div>
						<div class="form-group">
							<label for="partner_website">Site web du partenaire</label>
							<input type="text" name="partner_website" id="partner_website" placeholder="Site web"></input>
						</div>
						<div class="form-group">
							<label for="logo">Ajouter un fichier</label>
							<input type="file" name="logo" id="logo" value="fichier"></input>
						</div>
						<div class="form-group text-center">
							<button class="btn btn-lg btn-success" type="submit">Ajouter</button>
						</div>
					</form>
					<button class="btn btn-lg btn-danger" data-dismiss="modal" style="float: right;">Fermer</button>
				</div>
			</div>
		</div>
	</div>
	<table class="table inverse-table text-center sortable my-4 table-bordered border-primary">
		<thead>
			<tr>
				<th>nom</th>
				<th>Site Web</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
		</thead>
		<tbody>
			@foreach($partners as $partner)
			<tr>
				<td>{{ $partner->partner_name }}</td>
				<td><a href="{{ $partner->partner_website }}">Site web</a></td>
				<td><button data-toggle="modal" data-target="#update-modal" data-attr="{{ route('partners.show',$partner->id) }}" class="btn btn-lg btn-warning togglable">Modifier</button></td>
				<td><button onclick="event.preventDefault(); document.querySelector('.delete-form').submit();" class="btn btn-lg btn-danger">Supprimer</button></td>
				<form class="delete-form" style="display:none;" method="POST" action="{{ route('delete',$partner->id) }}">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}

				</form>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="modal fade" id="update-modal">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content text-center">
			<div class="modal-header">
				<h1 class="text-warning">Modifier un partenaire</h1>
				<button class="close" data-dismiss="modal">&times</button>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" id="update-form">
					@csrf
					<div class="form-group">
						<input type="text" name="partner_name" id="partner-name">
					</div>
					<div class="form-group">
						<textarea rows="5" class="form-control" type="text" name="description" id="partner-description"></textarea>
					</div>
					<div class="form-group">
						<input type="text" name="partner_website" id="partner-website">
					</div>
					<div class="form-group">
						<input type="file" name="logo" id="file" value="fichier">
					</div>
					<div class="form-group">
						<input class="btn btn-lg btn-success" type="submit" name="submit" value="modifier">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<div class="btn btn-lg btn-danger" data-dismiss="modal">Fermer</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var buttons = $('.togglable');
	$.each(buttons,(i,button)=>{
		$(button).click(function(e){
			var href=$(button).attr('data-attr');
			$.ajax({
				url:href,
				method:"GET"
			})
			.done(function(data){
				$("#partner-name").attr("value", `${data.partner_name}`);
				$('#partner-description').text(`${data.description}`);
				$('#partner-website').val(`${data.partner_website}`);
				$('#update-form').attr('action', href);
			})
			.fail(function(err){
				console.log(err.responseText);
			})
		});
	});
</script>

@endsection
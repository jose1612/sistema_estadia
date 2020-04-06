@extends('layouts.admin')

@section('contenido')


<div class="container">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel-heading">
			<h3>Crear Respaldo</h3>	

			<a id="create-new-backup-button" href="{{ route('createBackup') }}" class="btn btn-primary"
               style="margin-bottom:2em;"><i
                    class="fa fa-plus"></i> Crear respaldo
            </a>	
            
		</div>
	</div>
</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>							
							<th>#</th>
							<th>Nombre del archivo</th>
							<th>Tamaño</th>
							<th>Fecha</th>
							<th>Opción</th>							
						</thead>						
						@foreach($backups as $key => $backup)
							<tr>
								<td>{{ ++$key }}</td>								
								<td>{{ $backup['file_name'] }}</td>
								<td>{{ $backup['file_size'] }}</td>
								<td>{{ $backup['last_modified'] }} </td>
								<td>
									<a href="{{ route('backupDownload',$backup['file_name']) }}" class="btn btn-primary btn-xs"><i class="fa fa-download"></i>Descargar</a>
									<a href="{{ route('backupDelete',$backup['file_name']) }}" class="btn btn-danger btn-xs"><i class="fa fa-removed"></i>Eliminar</a>

								</td>
							</tr>						
						@endforeach	
					</table>
				</div>
			</div>
		</div>
	
@endsection
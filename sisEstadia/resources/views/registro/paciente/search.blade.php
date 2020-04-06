{!! Form::open(array('url'=>'registro/paciente','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

<div class="row"> 
	<div class="col-lg-5 col-md-8 col-sm-8 col-xs-9">
		
		<div class="form-group">

			<div class="input-group">

				<input type="text" class="form-control" name="searchText" placeholder="Buscar. . ." value="{{$searchText}}">

					<span class="input-group-btn">

						<button type="submit" class="btn btn-primary">
							<span class="glyphicon glyphicon-search"></span>
							&nbsp;
						</button>
					</span>

			</div>
		</div>
	</div>
</div>

{{Form::close()}}

@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">

			 <form method="POST" action="{{ url('changePassword') }}">
                         @csrf

         {{ method_field('PATCH') }}
                 <div class="form-group">
				<label for="usr">OLD PASSWORD:</label>
				<input type="text" class="form-control" name="old"  id="OLD">
			</div>
			<div class="form-group">
				<label for="pwd">NEW PASSWORD :</label>
				<input type="password" class="form-control" name="newpass" id="pwd">
			</div> 

			<div class="form-group">
				<label for="pwd">CONFORM NEW PASSWORD :</label>
				<input type="password" class="form-control" name="newpass_conf" id="pwd">
			</div>

			<div class="form-group">
				<label for="pwd">submit</label>
				<input type="submit" class="form-control" >
			</div>

			</form>

		</div>
	</div>
	@endsection


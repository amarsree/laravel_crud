
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

         <form method="POST" action="{{ url('product') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="product" class="col-md-4 col-form-label text-md-right">product name</label>

                <div class="col-md-6">
                    <input id="product_name" type="text" class="form-control{{ $errors->has('product_name') ? ' is-invalid' : '' }}" name="product_name" value="{{ old('product_name') }}" required autofocus>

                    @if ($errors->has('product_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('product_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

             <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                <div class="col-md-6">
                    <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>

                    @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

             <div class="form-group row">
                <label for="amount" class="col-md-4 col-form-label text-md-right">amount</label>

                <div class="col-md-6">
                    <input id="amount" type="text" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" value="{{ old('amount') }}" required autofocus>

                    @if ($errors->has('amount'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('amount') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

             <div class="form-group row">
                <label for="amount" class="col-md-4 col-form-label text-md-right">imeage</label>

                <div class="col-md-6">
                    <input type="file" name="img" id="fileToUpload">
                </div>
            </div>


            

              
        
        <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>



    </form>

    <script type="text/javascript">

    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>

</div>
</div>
</div>
@endsection



@extends('layouts.app')


@section('content')
<div class="container">
   @if(Session::has('message'))
   <p class="alert alert-info">{{ Session::get('message') }}</p>

   @endif
   <div class="row justify-content-center">

    <div class="col-md-8">

        <div>

           <a href="{{url('product/create')}}"> <button>add product</button></a> 
           <table border="1px" width="100%">
               <tr>
                <th>product name</th>
                <th>disctiprion</th>
                <th>amount</th>
                <th>img</th>
            </tr>

            @forelse ($products as $product)

            <tr>
                <td>{{$product->product_name}}</td>
                <td>{{$product->Description}}</td>
                <td>{{$product->amount}}</td>
                <td><img src="images/{{$product->img}}" height="60" width="60"> </td>
                <td> <a href="{{route('product.edit',$product->id)}}">edit</a></td>

                <td><form id="delete-form" method="POST" action="product/{{$product->id}}">
                   {{ csrf_field() }}
                   {{ method_field('DELETE') }}

                   <div class="form-group">
                     <input type="submit" class="btn btn-danger" value="Delete product">
                 </div>
             </form> </td>
         </tr>


            @empty
            <p>No users</p>
            @endforelse


     </table>



 </div>

</div>
</div>
@endsection


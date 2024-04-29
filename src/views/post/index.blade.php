@extends('layout::adminlayout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ecom Product Crud</h2>
            </div>
            <div class="auth">
              
            <?php if (auth()->check()) {  ?>
                <form action="{{ route('logout') }}" method="POST">
                @csrf <!-- CSRF protection -->
                <button type="submit" class="btn btn-warning">Logout</button>
            </form>

                
           <?php  }else{?>

            <a class="btn btn-primary" href="{{ route('login') }}"> Login</a>
                <a class="btn btn-primary" href="{{ route('register') }}"> Register</a>
           <?php }
            ?>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('post/create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="{{ URL::to($product->image) }}" width="100px"></td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <form action="" method="POST">

      
                <a class="btn btn-primary" href="{{ route('post.edit', ['id' => $product->id]) }}">Edit</a>


     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $products->links() !!}
        
@endsection
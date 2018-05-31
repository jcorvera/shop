@extends('layouts.app')

@section('title','Bienvenido a App Shop')

@section('bodyClass','product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Listado de productos disponibles</h2>
            <a href="{{ URL('/admin/products/create') }}" class="btn btn-primary">Nuevo producto</a>
            <div class="team">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="col-md-2 text-center">Name</th>
                                <th class="col-md-5 text-center">Descripción</th>
                                <th class="text-center">Categpría</th>
                                <th class="text-right">Precio</th>
                                <th class="text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $key=>$product)
                            <tr>
                                <td class="text-center">{{ $product->id }}</td>
                                <td> {{ $product->name  }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->category ? $product->category->name:'' }}</td>
                                <td class="text-right">&euro; {{ $product->price }}</td>
                                <td class="td-actions text-right">
                                    <button type="button" rel="tooltip" title="Ver Producto" class="btn btn-info btn-simple btn-xs">
                                        <i class="fa fa-info"></i>
                                    </button>
                                    <a href="{{ URL('/admin/product/'.$product->id.'/edit') }}" rel="tooltip" title="Editar Producto" class="btn btn-success btn-simple btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ URL('/admin/products/'.$product->id.'/images') }}" rel="tooltip" title="Imagenes del producto" class="btn btn-warning btn-simple btn-xs">
                                        <i class="fa fa-image"></i>
                                    </a>
                                    <form action="{{ URL('/admin/product/'.$product->id.'/delete') }}" method="POST" style="display: inline;" onsubmit="return confirm('Desea eliminar permanentemente el producto')">
                                        {{ csrf_field() }}
                                        <button type="submit" rel="tooltip" title="Eliminar Producto" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    </form>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                    
                </div>
            </div>

        </div>


        
    </div>

</div>

@include('include.footer')
@endsection

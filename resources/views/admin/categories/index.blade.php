@extends('layouts.app')

@section('title','Bienvenido a App Shop')

@section('bodyClass','product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Listado de categorías</h2>
            <a href="{{ URL('/admin/categories/create') }}" class="btn btn-primary">Nueva categoría</a>
            <div class="team">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="col-md-2 text-center">Name</th>
                                <th class="col-md-5 text-center">Descripción</th>
                                <th class="col-md-2 text-center">opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key=>$category)
                            <tr>
                                <td class="text-center">{{ $category->id }}</td>
                                <td> {{ $category->name  }}</td>
                                <td>{{ $category->description }}</td>

                                <td class="td-actions text-right">
                                    <a href="#" rel="tooltip" title="Ver categoría" class="btn btn-info btn-simple btn-xs">
                                         <i class="fa fa-info"></i>
                                    </a>

                                    <a href="{{ URL('/admin/categories/'.$category->id.'/edit') }}" rel="tooltip" title="Editar Producto" class="btn btn-success btn-simple btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ URL('/admin/categories/'.$category->id.'/delete') }}" method="POST" style="display: inline;" onsubmit="return confirm('Desea eliminar permanentemente el producto')">
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
                    {{ $categories->links() }}
                    
                </div>
            </div>

        </div>


        
    </div>

</div>

@include('include.footer')
@endsection

@extends('layouts.app')

@section('title','Imagenes de producto seleccionado')

@section('bodyClass','product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
</div>
<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Imagenes del productos {{ $product->name }}</h2>
            <form method="POST" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="foto" required="true">
                <button type="submit" class="btn btn-primary btn-round">Subir nueva imagen</button> 
                <a href="{{ URL('/admin/products') }}" class="btn btn-default btn-round">Volver al listado de productos</a>
            </form>
            
             <hr>
            <div class="row">
                @foreach($images as $image)
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="{{ $image->url }}" width="250px">
                            <form method="POST" action="">
                                 {{ csrf_field() }}
                                 {{ method_field('DELETE') }}
                                 <input type="hidden" name="id" value="{{ $image->id }}">
                                <button type="submit" class="btn btn-danger btn-round">Eliminar imageb</button> 
                                @if($image->featured)
                                <button class="btn btn-info btn-just-icon" title="Imgen destacada de este producto" rel="tooltip">
                                     <i class="material-icons">favorite</i>
                                </button>
                                @else
                                <a href="{{ URL('/admin/products/'.$product->id.'/images/select/'.$image->id) }}" class="btn btn-primary btn-just-icon">
                                    <i class="material-icons">favorite</i>
                                </a>
                                @endif
                            </form>
                             
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>

</div>

@include('include.footer')
@endsection

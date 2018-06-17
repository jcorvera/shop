@extends('layouts.app')

@section('title','Bienvenido a App Shop')

@section('bodyClass','product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title">Editar Categoría seleccionada</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ URL('/admin/categories/'.$category->id.'/update') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre de la categoría</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name',$category->name)}}">
                        </div>
                    </div>
                </div>

                <div class="form-group label-floating">
                    <label class="control-label">Descripción </label>
                    <input type="text" name="description" value="{{ old('description', $category->description) }}" class="form-control">
                </div>

                

                <button class="btn btn-primary">Guardar cambios</button>
                <a href="{{ URL('/admin/categories') }}" class="btn btn-default">Cancelar</a>

            </form>
                
                

        </div>
    </div>

</div>

@include('include.footer')
@endsection

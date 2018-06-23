@extends('layouts.app')

@section('title','App Shop Dashboard')

@section('bodyClass','product-page')

@section('content')
    <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section">
                <h2 class="title text-center">Dashboard</h2>
                @if (session('notification'))
                    <div class="alert alert-success">
                        {{ session('notification') }}
                    </div>
                @endif
                <ul class="nav nav-pills nav-pills-primary" role="tablist">
                    <li class="active">
                        <a href="#dashboard" role="tab" data-toggle="tab">
                            <i class="material-icons">dashboard</i>
                            Carrito de compras
                        </a>
                    </li>
                    <li>
                        <a href="#tasks" role="tab" data-toggle="tab">
                            <i class="material-icons">list</i>
                            Pedidos realizados
                        </a>
                    </li>
                </ul>
                <hr>
                <p>Tu carrito de compras presenta {{ Auth()->User()->cart->details->count() }} productos</p>
                <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Images</th>
                                <th class="text-center">Name</th>
                                <th >Precio</th>
                                <th class="text-center">Cantidad</th>
                                <th>Subtotal</th>
                                <th >Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Auth()->User()->cart->details  as $details)
                            <tr>
                                <td class="text-center"><img src="{{ $details->product->featured_image_url }}" height="50px"></td>
                                <td><a href="{{ URL('/products/'.$details->product->id) }}">{{ $details->product->name  }}</a></td>
                                <td class="text-right">&euro; {{ $details->product->price }}</td>
                                <td>{{ $details->quantity }}</td>
                                <td>${{ ($details->quantity * $details->product->price) }}</td>
                                <td class="td-actions text-right">
                                    <form action="{{ URL('/cart') }}" method="POST" onsubmit="return confirm('Desea eliminar permanentemente el producto')">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="cart_detail_id" value="{{ $details->id }}">

                                        <a href="{{ URL('/products/'.$details->product->id) }}" rel="tooltip"  target="_blank" title="Ver Producto" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <button type="submit" rel="tooltip" title="Eliminar Producto" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                    
                                </td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                    <p>Importe a pagar {{ auth()->user()->cart->total }}</p>
                    <form method="post" action="{{ url('/order') }}">
                        {{ csrf_field() }}
                        <div class="text-center">
                            <button class="btn btn-primary btn-round">
                                <i class="material-icons">done</i> Realizar pedido
                            </button>
                        </div>
                    </form>
                    
                    
                
                   
               
            </div>
        </div>

    </div>

    @include('include.footer')
@endsection



<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Pedido</title>
</head>
<body>
<p>Se ha realizado un nuevo pedido!</p>
<p>Estos son los datos del cliente que realizo el pedido</p>
<ul>
	<li>
		<strong>Nombre :</strong>
		{{ $user->name }}
	</li>
	<li>
		<strong>E-mail :</strong>
		{{ $user->email }}
	</li>
	<li>
		<strong>Fecha del pedido :</strong>
		{{ $cart->order_date }}
	</li>
</ul>
<hr>
<p>Detalle del pedido</p>
<ul>
	@foreach($cart->details as $key=>$detail)
		<li>
			{{ $detail->product->name }} x {{ $detail->quantity }}
			$ {{ $detail->quantity* $detail->product->price}}
		</li>
	@endforeach
</ul>
<p>
	Total a pagar {{ $cart->total }}
</p>
<p>
	<a href="{{ url('/admin/order/'.$cart->id) }}">Haz clic aqui</a>
	para ver mas informacion sobre este pedido
</p>
</body>
</html>
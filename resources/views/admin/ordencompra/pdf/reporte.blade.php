<!DOCTYPE html>
<html>
<head>
	<title>Reporte de Orden de Compra</title>
	<style type="text/css">

		table {     
    		border-collapse: collapse; 
    	}

    	.logo {
    		padding-top: 50px;
    		padding-left: 20%;
    		position:absolute;
    	}

        img {
            position:absolute; 
            z-index:1; 
        }
    </style>
</head>
<body>
<table width="100%" align="center">
	<tr><th colspan="3" style="text-align: center; background-color: #DFDFDF">Rapid Copy Express C.A.     Rif: </th></tr>
	<tr><th>Orden Nro:{{$ordenc->codigo}} </th><th>Fecha:{{$ordenc->fecha}}</th> <th> Estado: {{$ordenc->estado}} </th></tr>
	<tr><th colspan="3">Proveedor: {{$ordenc->proveedores->razon_social}} - Rif: {{$ordenc->proveedores->rif}} </th></tr>
	<tr><td colspan="3"><br><strong>Orden de Compra</strong><br></td></tr>	
	<tr><td colspan="2" style="text-align: center">Material</td><td>Cantidad</td></tr>
	@foreach($ordenc->materialescompra as $key)
		<tr><th colspan="2" style="text-align: left">{{$key->materiales->nombre}}</th><th>{{$key->cantidad}}</th></tr>
	@endforeach
	<tr><td colspan="3" style="text-align: center; background-color: #DFDFDF"><br></td></tr>
</table>
</body>
</html>
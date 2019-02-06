<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Charcuteria "El Avión de Punta de Oro"</title>
		<style>
			table {
			  border-collapse: collapse;
			  width: 100%;
			}

			td, th {
			  border: 1px solid #dddddd;
			  text-align: left;
			  padding: 8px;
			}

			tr:nth-child(even) {
			  background-color: #dddddd;
			}
		</style>
	</head>
	<body>
		<div width=100% style="text-align: left;">
			<h1>Charcuteria "El Avión de Punta de Oro"</h1>
			<p>Av. 5 Julio, Cagua, Edo. Aragua</p>
			<p>J-123456789</p>
			<p>0244-3965355 - 0244-3961337</p>
		</div>

		<div width=100% style="text-align: center;">
			<h3>Listado de @yield('listado-title')</h3>
		</div>

		@yield('table-content')
	</body>
</html>
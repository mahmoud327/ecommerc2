<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Menú Vertical Multinivel con HTML5 y CSS 3</title>

	<link rel="stylesheet" href="https://cdn.rawgit.com/olton/Metro-UI-CSS/master/build/css/metro-icons.min.css">
	<link rel="stylesheet" href="{{asset('caregorystyle/main.css')}}">

    <style>

        *,body
        {
            direction: rtl;
        }
    </style>

</head>
<body>
	<div class="container">
		<nav>
			<ul id="menu_principal">


				<li>
					<label for="drop-2">
						<span class="mif-widgets mif-3x principales"></span>
						Servicios
						<span class="mif-chevron-right mif-2x derecha"></span>
						<span class="mif-expand-more mif-2x derecha"></span>
					</label>
					<input type="checkbox" id="drop-2">

					<ul>
						<li><a href="">Servicio 1</a></li>

						<li>
							<label for="drop-3">
								Servicio 2
								<span class="mif-chevron-right mif-2x derecha"></span>
								<span class="mif-expand-more mif-2x derecha"></span>
							</label>
							<input type="checkbox" id="drop-3">
							<ul>
								<li><a href="">Elemento 1</a></li>
								<li><a href="">Elemento 2</a></li>
								<li><a href="">Elemento 3</a></li>
								<li><a href="">Elemento 4</a></li>
								<li><a href="">Elemento 5</a></li>
							</ul>

						</li>

						<li><a href="">Servicio 3</a></li>
						<li><a href="">Servicio 4</a></li>
						<li><a href="">Servicio 5</a></li>
					</ul>

				</li>



			</ul>
		</nav>
	</div>



	<script src="{{asset('caregorystyle/main.js')}}"></script>
</body>
</html>

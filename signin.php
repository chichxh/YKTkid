<?php 
require 'connect.php';


if(isset($_POST['signinParent'])) {

    $query = mysqli_query($link,"SELECT * FROM parents WHERE emailp = '".$_POST['emailp']."'");
    $data = mysqli_fetch_assoc($query);
    if($data['passwordp'] === $_POST['passwordp'])
    {
        header('Location: parent/index.php'); 
        session_start();
        $_SESSION['idp'] = (int)$data['id'];
        $_SESSION['namep'] = $data['namep'];
        $_SESSION['surnamep'] = $data['surnamep'];
        $_SESSION['patronymicp'] = $data['patronymicp'];
        $_SESSION['userpicp'] = $data['userpicp'];
        $_SESSION['emailp'] = $data['emailp'];
        $_SESSION['passwordp'] = $data['passwordp'];
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }

}

if(isset($_POST['signinKid'])) {

    $query = mysqli_query($link,"SELECT * FROM kids WHERE email = '".$_POST['email']."'");
    $data = mysqli_fetch_assoc($query);

    if($data['password'] === $_POST['password'])
    {
        header('Location: kids/index.php'); 
        session_start();
        $_SESSION['id'] = (int)$data['id'];
        $_SESSION['name'] = $data['name'];
        $_SESSION['surname'] = $data['surname'];
        $_SESSION['patronymic'] = $data['patronymic'];
        $_SESSION['userpic'] = $data['userpic'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['tel'] = $data['tel'];
        $_SESSION['age'] = $data['age'];
        $_SESSION['school'] = $data['school'];
        $_SESSION['clas'] = $data['clas'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['team'] = $data['team'];
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }
}
if(isset($_POST['signinDO'])) {

    $query = mysqli_query($link,"SELECT * FROM do WHERE loginDO = '".$_POST['loginDO']."'");
    $data = mysqli_fetch_assoc($query);

    if($data['passwordDO'] === $_POST['passwordDO'])
    {
        header('Location: do/index.php'); 
        session_start();
        $_SESSION['idDO'] = (int)$data['id'];
        $_SESSION['loginDO'] = $data['loginDO'];
        $_SESSION['passwordDO'] = $data['passwordDO'];
        $_SESSION['fullname'] = $data['fullname'];
        $_SESSION['typeDO'] = $data['typeDO'];
        $_SESSION['placeDO'] = $data['placeDO'];
        $_SESSION['contactDO'] = $data['contactDO'];
        $_SESSION['directorDO'] = $data['directorDO'];
        $_SESSION['siteDO'] = $data['siteDO'];
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }
}
 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.png" type="image/png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Jost&family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		.btn-regist {
			margin-bottom: 30px;
			padding: 10px 40px;
			background: #F8F4F4;
			border-radius: 10.935px;
		}
		.btn-regist:hover {
			background: #FFC53A;
		}
		.btn-regist-fin {
			background-color: #FFC53A;
			border-radius: 10.935px;
			padding: 10px 40px;
			font-weight: bold;
		}
		a, a:hover {
			color: #FFC53A;
		}
	</style>
</head>
<body>
	<?php require 'header.php' ?>

	<div class="container mt-5">
		<div class="row mt-5">
			<div class="col-6">
				<div class="text-center mt-5">
					<h1>Войти</h1>
					<p id="toptext">Кто вы?</p>
					<button id="btnKid" class="btn btn-regist" onclick="openKid()">Ребенок</button> <br>
					<button id="btnPar" class="btn btn-regist" onclick="openParent()">Родитель</button> <br>
					<button id="btnDO" class="btn btn-regist" onclick="openDO()">ДО, ОО</button>
					<p>Еще нет аккаунта?  <a href="signup.php">Зарегистрируйтесь</a></p>
				</div>
				<div id="kid" class="mb-3">
					<button class="btn" onclick="closeEverything()">
						<svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M16.2217 15.6953L27.6738 27.1475" stroke="#000" stroke-width="3" stroke-linecap="round"/>
						<path d="M27.6738 15.6953L16.2217 27.1475" stroke="#000" stroke-width="3" stroke-linecap="round"/>
						<rect x="1.39648" y="0.871094" width="41.1031" height="41.1031" rx="9.5" stroke="#000"/>
						</svg>
					</button>
					<form action="signin.php" method="post">
						<div class="mb-3">
						    <label class="form-label">Эл. адресс</label>
						    <input type="email" class="form-control" id="email" name="email">
						</div>
						<div class="mb-3">
						    <label class="form-label">Пароль</label>
						    <input type="password" class="form-control" name="password">
						</div>
						<button type="submit" class="btn btn-regist-fin" name="signinKid">Войти</button>
					</form>
				</div>

				<div id="parent" class="mb-3">
					<button class="btn" onclick="closeEverything()">
						<svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M16.2217 15.6953L27.6738 27.1475" stroke="#000" stroke-width="3" stroke-linecap="round"/>
						<path d="M27.6738 15.6953L16.2217 27.1475" stroke="#000" stroke-width="3" stroke-linecap="round"/>
						<rect x="1.39648" y="0.871094" width="41.1031" height="41.1031" rx="9.5" stroke="#000"/>
						</svg>
					</button>
					<form action="signin.php" method="post">
						<div class="mb-3">
						    <label class="form-label">Эл. адресс</label>
						    <input type="email" class="form-control" name="emailp">
						</div>
						<div class="mb-3">
						    <label class="form-label">Пароль</label>
						    <input type="password" class="form-control" name="passwordp">
						</div>
						<button type="submit" class="btn btn-regist-fin" name="signinParent">Войти</button>
					</form>
				</div>

				<div id="do" class="mb-3">
					<button class="btn" onclick="closeEverything()">
						<svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M16.2217 15.6953L27.6738 27.1475" stroke="#000" stroke-width="3" stroke-linecap="round"/>
						<path d="M27.6738 15.6953L16.2217 27.1475" stroke="#000" stroke-width="3" stroke-linecap="round"/>
						<rect x="1.39648" y="0.871094" width="41.1031" height="41.1031" rx="9.5" stroke="#000"/>
						</svg>
					</button>
					<form action="signin.php" method="post">
						<div class="mb-3">
						    <label class="form-label">Логин</label>
						    <input type="text" class="form-control" name="loginDO">
						</div>
						<div class="mb-3">
						    <label class="form-label">Пароль</label>
						    <input type="password" class="form-control" name="passwordDO">
						</div>
						<button type="submit" class="btn btn-regist-fin" name="signinDO">Войти</button>
					</form>
				</div>
			</div>
			<div class="col-6">
				<svg width="100%" height="100%" viewBox="0 0 750 632" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M545.058 330.657C618.874 214.34 721.856 1.12905 529.656 65.332" stroke="black" stroke-width="2"/>
				<path d="M539.381 340.662C566.903 293.226 599.998 173.831 512.2 75.7401" stroke="black" stroke-width="2"/>
				<path d="M429.811 230.697C441.998 248.889 448.562 270.266 448.685 292.162C448.808 314.059 442.486 335.507 430.505 353.836C429.685 355.032 428.959 356.15 428.14 357.298L428.072 357.342L427.972 357.41L427.718 357.758C415.957 374.113 399.993 386.984 381.516 395.01C374.871 397.915 367.953 400.146 360.864 401.671C359.725 401.93 358.572 402.168 357.407 402.364C354.858 402.839 352.278 403.22 349.698 403.505C348.377 403.66 347.063 403.778 345.741 403.885C326.789 405.387 307.769 402.003 290.499 394.056C273.229 386.108 258.286 373.863 247.099 358.492C246.189 357.254 245.321 356.004 244.467 354.729C241.007 349.57 237.988 344.128 235.444 338.461C234.941 337.371 234.469 336.278 234.008 335.177C232.571 331.68 231.322 328.109 230.266 324.479C224.221 304.131 224.114 282.479 229.959 262.073C231.904 255.178 234.519 248.489 237.769 242.105C238.249 241.152 238.77 240.187 239.269 239.238C239.984 237.885 240.803 236.495 241.622 235.153C242.582 233.538 243.595 231.953 244.66 230.398C247.719 225.853 251.107 221.538 254.798 217.49L255.033 217.236C259.945 211.878 265.377 207.021 271.25 202.738C272.544 201.791 273.853 200.867 275.196 199.968C278.981 197.443 282.913 195.147 286.972 193.092L287.062 193.032C287.849 192.635 288.636 192.238 289.427 191.87C291.699 190.787 293.99 189.805 296.319 188.879C297.296 188.5 298.263 188.128 299.255 187.772C301.517 186.939 303.793 186.193 306.085 185.535C307.611 185.08 309.156 184.678 310.698 184.294C316.055 182.984 321.503 182.078 326.995 181.585C336.688 180.701 346.454 181.093 356.044 182.751C361.923 183.743 367.711 185.218 373.348 187.161C396.462 195.037 416.334 210.317 429.882 230.634L429.811 230.697Z" fill="#FFC53A"/>
				<path d="M370.234 223.068C370.826 226.396 371.586 230.1 372.396 233.843C374.99 245.762 378.164 258.14 378.611 260.431C378.758 261.204 381.046 266.62 384.66 274.286C393.848 293.812 411.587 327.882 424.174 336.169C421.928 343.391 418.693 350.267 414.562 356.602C413.958 357.484 413.423 358.307 412.819 359.153L412.77 359.186L412.695 359.236L412.509 359.492C403.843 371.543 392.081 381.026 378.467 386.94C373.249 381.301 369.406 372.071 364.968 371.485C355.097 370.165 340.252 370.215 335.757 367.279C331.262 364.343 309.946 362.42 306.015 356.528C302.617 351.45 280.188 344.366 270.841 345.274C269.644 345.29 269.318 345.196 267.439 345.723C263.988 346.69 262.17 341.146 266.977 334.969C268.991 332.403 271.788 330.565 274.943 329.734C288.585 325.88 307.269 334.181 311.967 331.73C313.968 330.689 313.478 324.213 311.39 316.599C308.593 306.212 302.47 292.729 297.522 286.957C291.032 279.364 286.004 273.634 276.836 266.747C266.106 258.685 258.605 248.511 260.633 245.566C264.362 240.134 271.916 242.969 281.832 254.058C282.616 255.084 283.483 256.045 284.423 256.931C293.846 264.948 315.19 283.715 318.425 283.413C322.193 283.051 323.231 281.784 319.332 275.19C313.265 265.092 306.523 255.416 299.151 246.228C286.274 230.09 272.154 213.734 275.795 209.543C281.863 202.558 288.654 211.298 292.95 214.952C294.749 216.481 302.214 226.406 310.509 237.374C322.079 252.703 335.25 270.064 336.751 269.454C339.39 268.368 337.208 263.609 334.528 258.337C333.114 255.547 327.745 243.779 322.757 232.722C318.261 222.829 314.038 213.432 313.093 211.379C310.481 205.691 304.456 196.689 308.935 193.25C313.413 189.812 316.341 190.049 324.237 206.093C326.388 210.467 332.231 222.408 336.76 230.942C338.745 234.675 340.401 237.792 341.221 239.392C343.899 244.678 351.891 263.69 359.232 259.375C362.535 257.427 361.382 242.515 359.584 230.66C359.2 228.303 358.91 226.086 358.64 224.274C357.13 213.349 354.112 201.117 360.036 198.358C365.96 195.599 367.748 209.167 370.234 223.068Z" fill="white"/>
				<path d="M326.417 328.09C326.417 328.09 359.654 326.283 376.784 350.078" stroke="black" stroke-width="2.25726" stroke-miterlimit="10"/>
				<path d="M348.733 284.938C348.733 284.938 368.349 281.682 384.637 274.255" stroke="black" stroke-width="2.25726" stroke-miterlimit="10"/>
				<path d="M311.432 316.572C311.432 316.572 334.432 302.624 357.22 303.894" stroke="black" stroke-width="2.25726" stroke-miterlimit="10"/>
				<path d="M275.144 262.641C275.94 261.304 278.33 257.981 281.523 255.381" stroke="black" stroke-width="2.25726"/>
				<path d="M288.805 229.071C289.846 227.916 292.84 225.124 296.48 223.198" stroke="black" stroke-width="2.25726"/>
				<path d="M306.794 253.263C307.835 252.108 310.829 249.316 314.469 247.39" stroke="black" stroke-width="2.25726"/>
				<path d="M328.504 239.704C329.821 238.876 333.461 237.005 337.488 236.143" stroke="black" stroke-width="2.25726"/>
				<path d="M363.505 240.981C365.022 240.639 369.078 240.085 373.162 240.613" stroke="black" stroke-width="2.25726"/>
				<path d="M360.446 221.614C361.964 221.272 366.02 220.718 370.104 221.246" stroke="black" stroke-width="2.25726"/>
				<path d="M315.848 214.335C317.165 213.507 320.806 211.636 324.833 210.774" stroke="black" stroke-width="2.25726"/>
				<path d="M292.673 277.894C293.469 276.557 295.859 273.234 299.052 270.634" stroke="black" stroke-width="2.25726"/>
				<path d="M285.845 340.399C285.326 337.776 284.924 331.835 287.467 329.065" stroke="black" stroke-width="2.25726"/>
				<path opacity="0.9" d="M605.303 89.727C643.15 112.739 652.715 154.335 636.383 203.708C620.082 252.991 578.103 309.455 514.176 361.316C450.248 413.177 376.691 450.44 309.577 468.828C242.341 487.249 182.356 486.556 144.51 463.544C106.663 440.532 97.0982 398.936 113.43 349.563C129.731 300.28 171.709 243.816 235.637 191.955C299.565 140.093 373.122 102.83 440.236 84.4428C507.472 66.022 567.457 66.715 605.303 89.727Z" stroke="#CC3AFF" stroke-width="5.64314"/>
				<path opacity="0.9" d="M288.921 53.1015C336.905 65.5597 386.99 106.142 429.245 162.337C471.486 218.511 505.638 289.98 521.513 363.378C537.387 436.777 531.925 497.96 510.403 537.58C488.873 577.214 451.427 595.07 403.443 582.611C355.459 570.153 305.374 529.571 263.119 473.376C220.878 417.202 186.726 345.733 170.851 272.335C154.977 198.936 160.439 137.753 181.961 98.133C203.491 58.4992 240.938 40.6433 288.921 53.1015Z" stroke="#85FF3A" stroke-width="5.64314"/>
				<path d="M117.081 110.456C116.1 110.965 115.718 112.172 116.226 113.153L124.516 129.13C125.024 130.111 126.231 130.493 127.212 129.985C128.192 129.476 128.575 128.269 128.066 127.288L120.698 113.086L134.9 105.718C135.881 105.209 136.263 104.002 135.755 103.021C135.246 102.041 134.039 101.658 133.058 102.167L117.081 110.456ZM245.811 150.627L118.606 110.325L117.398 114.138L244.602 154.44L245.811 150.627Z" fill="#85FF3A"/>
				<circle cx="268.488" cy="477.041" r="18.7558" transform="rotate(-85.9812 268.488 477.041)" fill="#FFC53A"/>
				<path d="M247.107 474.605L232.68 473.591" stroke="#FFC53A" stroke-width="3.38589"/>
				<path d="M270.054 454.758L271.068 440.331" stroke="#FFC53A" stroke-width="3.38589"/>
				<path d="M265.924 513.537L266.938 499.11" stroke="#FFC53A" stroke-width="3.38589"/>
				<path d="M239.755 502.008L251.228 493.203" stroke="#FFC53A" stroke-width="3.38589"/>
				<path d="M285.715 459.45L297.188 450.646" stroke="#FFC53A" stroke-width="3.38589"/>
				<path d="M306.232 478.759L291.805 477.745" stroke="#FFC53A" stroke-width="3.38589"/>
				<rect x="517.724" y="94.7495" width="32.9188" height="32.9188" transform="rotate(-139.015 517.724 94.7495)" fill="#CC3AFF"/>
				<path d="M529.185 69.9335L537.876 77.4495L546.566 84.9655L535.723 83.2731" stroke="#CC3AFF" stroke-width="2.82157"/>
				<path d="M503.784 71.8142L495.175 64.2047L486.567 56.5951L497.39 58.4047" stroke="#CC3AFF" stroke-width="2.82157"/>
				<path d="M562.221 352.752C563.511 359.061 563.295 365.586 561.59 371.797C559.885 378.007 556.739 383.728 552.407 388.494C551.657 389.321 550.87 390.124 550.049 390.887C548.569 392.278 546.986 393.555 545.312 394.705C544.89 394.99 544.467 395.275 544.028 395.553L543.998 395.559L543.958 395.567L543.822 395.647C535.232 401.024 524.955 403.03 514.973 401.278L514.853 401.256C514.464 401.194 514.084 401.12 513.7 401.031C512.767 400.835 511.833 400.613 510.917 400.346C510.447 400.217 509.983 400.071 509.52 399.926C507.567 399.294 505.663 398.52 503.824 397.609C498.495 394.973 493.806 391.203 490.087 386.564C486.368 381.926 483.707 376.531 482.292 370.756C482.18 370.209 482.032 369.665 481.92 369.113C481.574 367.425 481.335 365.717 481.205 363.999C481.126 362.997 481.089 361.996 481.085 361.004C481.076 357.228 481.589 353.469 482.608 349.834C484.804 342.089 489.215 335.156 495.3 329.886L496.189 329.124C497.171 328.329 498.191 327.567 499.25 326.87C500.921 325.747 502.673 324.751 504.492 323.888C505.268 323.521 506.065 323.176 506.897 322.875C509.156 321.976 511.491 321.281 513.875 320.798L513.905 320.792C515.531 320.462 517.175 320.23 518.829 320.095L518.875 320.086C520.124 319.988 521.358 319.945 522.6 319.963C522.984 319.968 523.368 319.979 523.75 319.995C524.424 320.019 525.102 320.064 525.768 320.105C526.435 320.147 526.989 320.227 527.592 320.313L527.688 320.325L528.118 320.383C536.433 321.624 544.165 325.395 550.263 331.183C556.361 336.971 560.529 344.496 562.202 352.735L562.221 352.752Z" fill="#CC3AFF"/>
				<path d="M543.865 365.389C543.157 367.532 542.341 369.638 541.421 371.698C541.421 371.698 539.736 377.179 540.717 378.649C541.217 379.412 541.461 383.082 541.346 386.793C540.212 387.86 538.998 388.839 537.715 389.721C537.391 389.939 537.067 390.157 536.73 390.37L536.707 390.375L536.676 390.381L536.573 390.442C529.988 394.564 522.109 396.102 514.457 394.759L514.366 394.742C514.068 394.695 513.776 394.638 513.482 394.57C512.766 394.42 512.051 394.249 511.348 394.044C510.988 393.946 510.633 393.834 510.278 393.722C508.78 393.238 507.321 392.645 505.911 391.947C506.1 379.803 494.459 362.218 503.273 353.1C508.76 348.376 511.938 341.721 517.344 337.915C519.174 336.933 521.667 334.63 524.142 332.688C526.332 330.979 528.508 329.554 530.202 329.577C532.807 330.098 535.239 333.598 533.564 335.438L533.501 335.503C531.662 337.48 525.897 343.369 525.865 343.388C530.761 343.99 531.976 345.312 532.01 350.502C532.011 350.512 532.014 350.52 532.02 350.527C532.025 350.535 532.033 350.54 532.042 350.543C532.05 350.546 532.06 350.546 532.068 350.544C532.077 350.541 532.085 350.537 532.091 350.53C534.51 346.957 539.376 349.532 539.897 352.893C539.892 353.947 539.372 357.381 539.372 357.381C543.191 358.023 545.55 359.892 543.865 365.389Z" fill="white"/>
				<path d="M510.32 355.454C510.32 355.454 515.48 348.855 514.797 344.779C514.113 340.702 511.719 328.249 516.591 327.847C521.462 327.446 525.473 336.389 525.444 342.682C525.415 348.974 523.44 355.956 526.962 359.086C530.484 362.215 530.099 379.011 530.099 379.011C530.099 379.011 528.599 384.963 526.972 386.704" fill="white"/>
				<path d="M510.32 355.454C510.32 355.454 515.48 348.855 514.797 344.779C514.113 340.702 511.719 328.249 516.591 327.847C521.462 327.446 525.473 336.389 525.444 342.682C525.415 348.974 523.44 355.956 526.962 359.086C530.484 362.215 530.099 379.011 530.099 379.011C530.099 379.011 528.599 384.963 526.972 386.704" stroke="black" stroke-width="0.889212" stroke-miterlimit="10"/>
				<path d="M531.955 350.35C531.955 350.35 533.925 359.81 532.382 360.938C530.838 362.066 528.922 361.644 526.978 359.065" stroke="black" stroke-width="0.889212" stroke-miterlimit="10"/>
				<path d="M539.376 357.401C539.376 357.401 538.731 369.345 534.09 367.854C529.449 366.362 531.289 361.446 531.289 361.446" stroke="black" stroke-width="0.889212" stroke-miterlimit="10"/>
				<path d="M536.483 367.297C536.483 367.297 539.639 371.421 543.287 365.611" stroke="black" stroke-width="0.889212" stroke-miterlimit="10"/>
				<path d="M516.43 338.873C517.237 338.92 519.41 338.689 521.65 337.382" stroke="black" stroke-width="0.889212"/>
				<path d="M520.834 325.242C519.997 326.83 521.802 328.688 523.997 330.456C526.635 329.249 528.305 326.749 527.752 325.565C527.148 324.273 525.345 324.603 524.294 325.31C523.774 324.713 521.85 323.315 520.834 325.242Z" fill="black"/>
				<circle cx="566.322" cy="202.24" r="13.322" transform="rotate(-11.5343 566.322 202.24)" fill="#FFC53A"/>
				<circle cx="511.657" cy="517.874" r="53.385" transform="rotate(-11.5343 511.657 517.874)" fill="#FFC53A"/>
				<circle cx="375.541" cy="94.5657" r="18.0668" transform="rotate(-11.5343 375.541 94.5657)" fill="#FFC53A"/>
				<circle cx="610.177" cy="55.7454" r="13.322" transform="rotate(-11.5343 610.177 55.7454)" fill="#91FF4E"/>
				<path d="M342.488 22.9587C366.3 28.8869 382.003 40.8876 389.056 67.3931C404.763 53.7426 446.02 44.4669 464.015 52.0958" stroke="#D14EFF" stroke-width="4"/>
				<path d="M79.4655 290.33C91.3516 268.862 107.006 256.799 134.434 256.842C125.311 238.139 127.023 195.886 139.048 180.477" stroke="#D14EFF" stroke-width="4"/>
				<path d="M325.154 606.347L390.947 505.324" stroke="#FFC53A" stroke-width="4"/>
				<path d="M339.981 614.859L405.774 513.836" stroke="#FFC53A" stroke-width="4"/>
				<path d="M358.217 622.068L424.011 521.045" stroke="#FFC53A" stroke-width="4"/>
				<rect x="347.542" y="92.4846" width="69.71" height="15.0582" transform="rotate(14.7373 347.542 92.4846)" fill="#91FF4E"/>
				<rect x="173.911" y="390.319" width="69.71" height="15.0582" transform="rotate(-52.7132 173.911 390.319)" fill="#FFC53A"/>
				<rect x="493.235" y="494.569" width="69.71" height="15.0582" transform="rotate(-32.1377 493.235 494.569)" fill="#CC3AFF"/>
				</svg>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		let toptext = document.getElementById('toptext')
		let kidDiv = document.getElementById('kid')
		let parentDiv = document.getElementById('parent')
		let doDiv = document.getElementById('do')
		let btnKid = document.getElementById('btnKid')
		let btnPar = document.getElementById('btnPar')
		let btnDO = document.getElementById('btnDO')

		function openKid() {
			kidDiv.style.display = "block"
			parentDiv.style.display = "none"
			doDiv.style.display = "none"
			btnKid.style.display = "none"
			btnPar.style.display = "none"
			btnDO.style.display = "none"
			toptext.textContent = "Я - Ребенок"
		}
		function openParent() {
			kidDiv.style.display = "none"
			parentDiv.style.display = "block"
			doDiv.style.display = "none"
			btnKid.style.display = "none"
			btnPar.style.display = "none"
			btnDO.style.display = "none"
			toptext.textContent = "Я - Родитель"
		}
		function openDO() {
			kidDiv.style.display = "none"
			parentDiv.style.display = "none"
			doDiv.style.display = "block"
			btnKid.style.display = "none"
			btnPar.style.display = "none"
			btnDO.style.display = "none"
			toptext.textContent = "Я - Представитель образовательного учередения"
		}
		function closeEverything() {
			kidDiv.style.display = "none"
			parentDiv.style.display = "none"
			doDiv.style.display = "none"
			btnKid.style.display = "inline-block"
			btnPar.style.display = "inline-block"
			btnDO.style.display = "inline-block"
			toptext.textContent = "Кто вы?"
		}
	</script>
	<?php require 'footer.php' ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
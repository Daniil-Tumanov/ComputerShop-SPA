
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="img/favicon.svg" type="image/x-icon">
        <title>Магазин компьютерных комплектующих</title>
        <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link href='https://fonts.googleapis.com/css?family=Russo One' rel='stylesheet'>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="JS/jquery-3.5.1.min.js"></script>
        <script src="JS/cart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.js"></script>
        <script src="//unpkg.com/vue"></script>
        <script src="https://unpkg.com/vuejs-paginate@0.9.0"></script>
        <script src="JS/slider.js"></script>
        <script src="js/app.js"></script>

    
    </head>
    <body>
    <header class="header">
        <div class="container">
            <div class="container_header">
    <div class="header_logo">
    <a href="/" class="logo-link"><img src="img/Logo.svg" alt="Logo" class="logo"></a>
    </div>
        <ul class="header_list">
            <li class="header_item">
                <a href="products" class="header_link">О нас</a>
            </li>
            <li class="header_item">
                <a href="delivery" class="header_link">Доставка</a>
            </li>
            <li class="header_item">
                <a href="contacts" class="header_link">Контакты</a>
            </li>
            </ul>
       
            <div class="login">
          @if(Auth::check())
      {{ Auth::user()->name}}
      <a href="{{ route('user.logout') }}" class="register_link">Выход</a>
      @else
          <a href="#ModalLogin" class="login_link">Вход</a>
            </p>
            <div id="ModalLogin" class="Modal">
        <div class="Modal_Body">
        <form action="{{ route('user.login') }}" method="POST" class="needs-validation">
                          @csrf
                      <div class="form-row">
                        <div class="col-md-12 mb-3">
                          <label for="Email" style="color: white">E-mail</label>
                          <div class="input-group">
                            <input type="email" class="form-control" name="email" id="Email" placeholder="E-mail" aria-describedby="inputGroupPrepend" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-12 mb-3">
                          <label for="validationCustom03" style="color: white">Пароль</label>
                          <input type="password" minlength="6" class="form-control" name="password" id="validationCustom03" placeholder="Пароль" required>
                        </div>
                      </div>
                      <center>
                      <button class="btn btn-primary" type="submit">Войти</button>
                      <a href="#ModalRegister">Зарегистрироваться</a>
                      </center>
                    </form>
                  </div>
                  <a href="#" class="ModalFull"></a>
                
        
    </div>
            <p>
                <a href="#ModalRegister" class="register_link">Регистрация</a>
            <p>

            <div id="ModalRegister" class="Modal">
        <div class="Modal_Body">
        <form action="{{ route('user.registration') }}" method="POST" class="needs-validation" novalidate
                          oninput="Password2.setCustomValidity(Password2.value != Password.value ? 'Пароли не совпадают':'')">
                          @csrf
                      <div class="form-row">
                        <div class="col-md-12 mb-3">
                          <label for="validationCustom01" style="color: white">Имя</label>
                          <input type="text" pattern="^[А-Яа-яЁё\s]+$" name="name" class="form-control" id="validationCustom01" placeholder="Имя" value="" required>
                        </div>
                        <div class="col-md-12 mb-3">
                          <label for="validationCustom01" style="color: white">Фамилия</label>
                          <input type="text" pattern="^[А-Яа-яЁё\s]+$" name="LastName" class="form-control" id="validationCustom05" placeholder="Фамилия" value="" required>
                        </div>
                          <!-- <div class="col-md-12 mb-3">
                          <label for="validationCustom02" style="color: white">Логин</label>
                          <input type="text" pattern="^[a-zA-Z1-9]+$" class="form-control" name="Login" id="validationCustom02" placeholder="Логин" value="" required>
                        </div> -->
                        <div class="col-md-12 mb-3">
                          <label for="validationEmail" style="color: white">E-mail</label>
                          <div class="input-group">
                            <input type="email" class="form-control" name="email" id="validationEmail" placeholder="E-mail" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                              Введите корректный адрес электронной почты.
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-12 mb-3">
                          <label for="validationCustom03" style="color: white">Пароль</label>
                          <input type="password" minlength="6" class="form-control" name="password" id="validationCustom03" placeholder="Пароль" required>
                          <div class="invalid-feedback">
                            Пароль не может быть меньше 6 символов
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <label for="validationCustom04" style="color: white">Подтвердите пароль</label>
                          <input type="password" minlength="6" class="form-control" name="Password2" id="validationCustom04" placeholder="Подтвердите пароль" required>
                          <div class="invalid-feedback">
                            Пароли не совпадают
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                          <label class="form-check-label" for="invalidCheck">
                            Согласие на обработку персональных данных
                          </label>
                          <div class="invalid-feedback">
                            Вы должны быть согласны с обработкой персональных данных
                          </div>
                        </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Зарегистрироваться</button>
                    </form>

                    <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function() {
                      'use strict';
                      window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                          form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                              event.preventDefault();
                              event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                          }, false);
                        });
                      }, false);
                    })();
                    </script>
                  </div>
                  <a href="#" class="ModalFull"></a>
                </div>
                @endif
    </div>
    
    <div class="login_logo">
                <a href="{{ route('user.personal') }}" class="login_logo-link"><img src="img/login-logo.svg" alt="Login-logo" class="login-logo"></a>
                </div>
            </div>
            
    </div>
</header>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="navigation">

<!-- <div class="category">

    <ul class="topMenu">
        
        <li>Категория
            <ul class="subMenu">
            <li><a href="processor.php">Процессоры</a></li>
            <li><a href="videocard.php">Видеокарты</a></li>
            <li><a href="mboard.php">Материнские платы</a></li>
            <li><a href="ram.php">Оперативная память</a></li>
            <li><a href="psu.php">Блоки питания</a></li>
            <li><a href="case.php">Корпуса</a></li>
            <li><a href="storage.php">Накопители</a></li>
        </ul></li>
    </ul>
</div> -->



<!-- <div class="cart">
<a href="cart.php"><img src="img/cart.svg" width="50">
<p>Корзина</p>
</div></a>  -->

<div id="app">

<div class="search_field">
<input type="text"  class="search" v-model="search" name="search" placeholder="Поиск" />
</div>
<div class="content">

<footer class="fdb-block footer-small fixed-bottom mt-2 ">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 col-md-4">
      <p>Адрес:</p>
       <p class="other_par">Г.Ставрополь ул. Кулакова 2</p>
      </div>
      <div class="col-12 col-md-4">
      <p>Контакты:</p> <p class="other_par"> 8-988-888-88-88 </p>
        <p class="other_par"> computer.shop@gmail.com</p>
      </div>
      <div class="col-12 col-md-4 mt-4 mt-md-0 text-center text-white text-md-right">
      <p>Мы в соцсетях:</p>
        <div class="pic">
            <a href="#"><img src="img/vk-256x256.png" width="40px"></a>
            <a href="#"><img src="img/gallery-1.png" width="40px"></a>
            <a href="#"><img src="img/0a34b4fab2bb70762b9775afafce9d49.png" width="40px"></a>
        </div>
      </div>
    </div>
  </div>
</footer>
</html>


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
        </div>
        <div class="login_logo">
                <a href="{{ route('user.personal') }}" class="login_logo-link"><img src="img/login-logo.svg" alt="Login-logo" class="login-logo"></a>
                </div>
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
                
    </div>
    
    <div class="login_logo">
                <a href="#ModalLogin" class="login_logo-link"><img src="img/login-logo.svg" alt="Login-logo" class="login-logo"></a>
                </div>
            </div>
            
    </div>
    @endif
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
<div class="row mt-2 mb-2">
        <div class="col-md-10">&nbsp;</div>
        <div class="col-md-2 text-right">
    <a class="btn btn-primary" href="#ModalWindow"><img src="img/cart.svg" width="30"> Корзина @{{badge}}</span></a>
</div>
</div>
    <div id="ModalWindow" class="Modal">
        <div class="Modal_Body">
        <table class="table table-striped text-left">
                                <tbody>
                                    <tr v-for="(cart, n) in carts" v-bind:key="cart.id">
                                    <td><img class="container__cart_img" :src="'img/'+ cart.IMG"></td>
                                    <td><div class="container__cart_text">
           <p class="container__cart_name">@{{cart.name}} @{{cart.description}}</td>
           <div class ="container__cart_desc">
     </div>
     </div>

                                        <td  class="container__cart_desc">@{{cart.price}} р.</td>
                                        <!-- <td width="100"><input type="number" class="form-control" v-model="cart.amount"/></td> -->
                                        <td width="60">
                                            <button @click="removeCart(n)" class="btn btn-danger btn-sm">Удалить</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="container__cart_desc">Итого: @{{totalprice}} р. &nbsp;</p>
                            <center><button data-dismiss="modal" class="btn btn-primary">Перейти к оплате заказа</button></center>
        </div>
        <a href="#" class="ModalFull"></a>
    </div>
    <div class="slider">
        <div class="slider__wrapper">
          <div class="slider__items">
            <div class="slider__item slider__item_1">
              <span class="slider__item_inner">
                <span class="slider__item_img">
                  <img class="slider__item_photo" src="img/RTX-2080.png" alt="2080">
                </span>
                <span class="slider__item_testimonial">
                  <span class="slider__item_name">GIGABYTE AORUS</span>
                  <span class="slider__item_post">GeForce RTX 2080 SUPER</span>
                  <span class="slider__item_text">
                    Мощнейшая видеокарта с поддержкой новых технологий ретрейсинга. Уже доступна в магазине.
                  </span>
                  <span class="slider__item_action">
                    <a class="btn" href="#" @click="addCart(22)">Купить за 68 590р.</a>
                  </span>
                </span>
              </span>
            </div>
            <div class="slider__item slider__item_2">
              <span class="slider__item_inner">
                <span class="slider__item_img">
                  <img class="slider__item_photo" src="/img/i9.png" alt="">
                </span>
                <span class="slider__item_testimonial">
                  <span class="slider__item_name">Intel Core</span>
                  <span class="slider__item_post">i9-9900 BOX</span>
                  <span class="slider__item_text">
                   Мощный восьмиядерный процессор подходящий для решения любых задач. Доступен для покупки.
                  </span>
                  <span class="slider__item_action">
                    <a class="btn" href="#" onClick='addToCart("2")'>Купить за 35 690р.</a>
                  </span>
                </span>
              </span>
            </div>
            <div class="slider__item slider__item_3">
              <span class="slider__item_inner">
                <span class="slider__item_img">
                  <img class="slider__item_photo" src="/img/Asus-rog.png" alt="">
                </span>
                <span class="slider__item_testimonial">
                  <span class="slider__item_name">ASUS ROG</span>
                  <span class="slider__item_post">GTX 1650 STRIX</span>
                  <span class="slider__item_text">
                    Бюджетная видеокарта построеная на графическом процессоре Turing. Оснащенная продвинутой системой охлаждения и оптимизированной мощностью для максимальной игровой производительности.
                  </span>
                  <span class="slider__item_action">
                    <a class="btn" href="#" @click="addCart(12)">Купить за 14 590р.</a>
                  </span>
                </span>
              </span>
            </div>
          </div>
          <a class="slider__control slider__control_prev" href="#" role="button"></a>
          <a class="slider__control slider__control_next" href="#" role="button"></a>
        </div>
    </div>
    <!--  -->
    
    <div class="popular">
    <p v-if="search != ''">По запросу @{{search}} найдено:</p>
      <p v-else>Популярные товары</p>
      <hr class="line">
      <div class="filters">
      <p>Категория:</p>
    <select v-model="selected">
    <option v-for="category in categories" v-bind:value="category.value"  @click="sortByCategories">]
      @{{category.name}}
    </option>
          </select>
          <p>Сортировка:</p>
          <select v-model="sortBy">
    <option value="default">Стандарт</option>
    <option value="by-name">По имени</option>
    <option value="by-price">По цене</option>
  </select>
          <p>Цена:</p>
      <div class="range-slider">
      
        <input
            type="range"
            min="0"
            max="100000"
            step="100"
            v-model.number="minPrice"
            @change="setRangeSlider"
        >
        <input
            type="range"
            min="0"
            max="100000"
            step="100"
            v-model.number="maxPrice"
            @change="setRangeSlider"
        >
      </div>
      <div class="range-values">
        <p>Min: @{{minPrice}}</p>
        <p>Max: @{{maxPrice}}</p>
      </div>
     
    </div>
      <a  v-for="product in filterProducts">
            <div class='containerPos'>
              <img :src="'img/'+ product.IMG" class='containerImg'>
            <div class='containerText'>
              <h2 class='containerPrice'>@{{product.Price}}&#8381;</h2>
              <div class ='containerName'>
              <p>@{{product.Name}}<br>
              @{{product.Description}}</p>
              <input type='submit' value='Добавить в корзину' class='addtocart' @click="addCart(product)">
            </div>
            </div>
            </div></a>
      <p> </p>
      
      <!-- <a href = "#">
				<div class="containerPos">
					<img class="containerImg" src="img/ryzen-5.png">
				<div class="containerText">
          <h2 class="containerPrice">14590&#8381;</h2>
          <div class ="containerName">
          <p>AMD Ryzen 5 </p>
          <p>3600</p>
          <p>BOX</p>
          <input type='submit' value='Добавить в корзину' class='addtocart' onClick='addToCart("4")'>
				</div>
				</div>
        </div></a>
        <a href = "#">
          <div class="containerPos">
            <img class="containerImg" src="img/TUF3-GTX1660TI-O6G-GAMING.png">
          <div class="containerText">
          <h2 class="containerPrice">17990&#8381;</h2>
          <div class ="containerName">
          <p>ASUS TUF Gaming</p>
          <p>GeForce GTX 1660 OC</p>
          <p>[TUF-GTX1660-O6G-GAMING]</p>
          <input type='submit' value='Добавить в корзину' class='addtocart' onClick='addToCart("13")'>
          </div>
          </div>
          </div></a>
          <a href = "#">
            <div class="containerPos">
              <img class="containerImg" src="img/ryzen-threadripper.png">
            <div class="containerText">
              <h2 class="containerPrice">22990&#8381;</h2>
              <div class ="containerName">
              <p>AMD Ryzen</p>
              <p>Threadripper 1920X</p>
              <p>BOX</p>
              <input type='submit' value='Добавить в корзину' class='addtocart' onClick='addToCart("8")'>
            </div>
            </div>
            </div></a> -->
            <div class="row mt-2">
                <div class="col-md-12">
                    <nav>
                        <ul class="pagination">
                            <li v-bind:class="{disabled:!pagination.first_link}" class="page-item"><a href="#" @click="viewProduct(pagination.first_link)" >&laquo;</a></li>
                            <li v-bind:class="{disabled:!pagination.prev_link}" class="page-item"><a href="#" @click="viewProduct(pagination.prev_link)">&lt;</a></li>
                            <li v-for="n in pagination.last_page" v-bind:key="n" v-bind:class="{active: pagination.current_page == n}" class="page-item"><a href="#" @click="viewProduct(pagination.path_page + n)">@{{n}}</a></li>
                            <li v-bind:class="{disabled:!pagination.next_link}" class="page-item"><a href="#" @click="viewProduct(pagination.next_link)">&gt;</a></li>
                            <li v-bind:class="{disabled:!pagination.last_link}" class="page-item"><a href="#" @click="viewProduct(pagination.last_link)">&raquo;</a></li>
                            <!-- class="page-link" -->
                        </ul>
                    </nav>
                </div>
                <div class="col-md-12 mb-5">
                    На странице: @{{pagination.from_page}} - @{{pagination.to_page}}<br>
                    Всего: @{{pagination.total_page}}
                </div>
                <div class="col-md-12 mb-5">
                </div>
            </div>
            </div>
        </div>
</div>
    </div>
            </div>
        </div>
       
    </body>
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

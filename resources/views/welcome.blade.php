
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="img/favicon.svg" type="image/x-icon">
        <title>Магазин компьютерных комплектующих</title>
        <link rel="stylesheet" href="css/style.css">
        <link href='https://fonts.googleapis.com/css?family=Russo One' rel='stylesheet'>
        <script src="JS/jquery-3.5.1.min.js"></script>
        <script src="JS/cart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.js"></script>
        <script src="//unpkg.com/vue"></script>
        <script src="https://unpkg.com/vuejs-paginate@0.9.0"></script>
        <script src="/JS/slider.js"></script>
        <script src="js/app.js"></script>

    
    </head>
    <body>
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

<div class="category">

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
</div>

<form action="search.php" method="post" class="search_field">
<input type="search" class="search" name="search" placeholder="Поиск" />
<input type="submit" name="do_search" value="" class="submit" />
</form>
<div class="cart">
<a href="cart.php"><img src="img/cart.svg" width="50">
<p>Корзина</p>
</div></a> 
</div>
<div>
            <div id="app">
<div class="content">
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
                    <a class="btn" href="#" onClick='addToCart("17")'>Купить за 68 590р.</a>
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
                    <a class="btn" href="#" onClick='addToCart("12")'>Купить за 14 590р.</a>
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
      <p>Популярные товары</p>
      <hr class="line">
      <a  v-for="product in products">
            <div class='containerPos'>
              <img :src="'img/'+ product.IMG" class='containerImg'>
            <div class='containerText'>
              <h2 class='containerPrice'>@{{product.Price}}&#8381;</h2>
              <div class ='containerName'>
              <p>@{{product.Name}}</p>
              <p>@{{product.Description}}</p>
              <input type='submit' value='Добавить в корзину' class='addtocart'>
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
                            <li v-bind:class="{disabled:!pagination.first_link}" class="page-item"><a href="#" @click="viewProduct(pagination.first_link)" class="page-link">&laquo;</a></li>
                            <li v-bind:class="{disabled:!pagination.prev_link}" class="page-item"><a href="#" @click="viewProduct(pagination.prev_link)" class="page-link">&lt;</a></li>
                            <li v-for="n in pagination.last_page" v-bind:key="n" v-bind:class="{active: pagination.current_page == n}" class="page-item"><a href="#" @click="viewProduct(pagination.path_page + n)" class="page-link">@{{n}}</a></li>
                            <li v-bind:class="{disabled:!pagination.next_link}" class="page-item"><a href="#" @click="viewProduct(pagination.next_link)" class="page-link">&gt;</a></li>
                            <li v-bind:class="{disabled:!pagination.last_link}" class="page-item"><a href="#" @click="viewProduct(pagination.last_link)" class="page-link">&raquo;</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-12">
                    Page: @{{pagination.from_page}} - @{{pagination.to_page}}
                    Total: @{{pagination.total_page}}
                </div>
            </div>
            </div>
        </div>
</div>
    </div>
            </div>
        </div>
       
    </body>
</html>

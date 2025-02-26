@extends('layout.main')

@section('title')
@section('body')

<section class="carousel">
  <div class="container">
    <div id="carousel" class="carousel slide carousel-fade">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true"
          aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      </div>
      <div class="carousel-inner rounded-3 shadow">
        <div class="carousel-item active">
          <img src="/public/img/banner1.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="/public/img/banner2.png" class="d-block w-100" alt="...">
        </div>
      </div>
      <img src="" alt="">
      <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
</section>
<section class="product">
  <div class="container">
    <div class="row mb-5">
      <h2 class="section-title d-md-block d-none">
        <span>Рекомендумые товары</span>
      </h2>
      <h2 class="section-title2 d-md-none d-block">
        <span>Рекомендумые товары</span>
      </h2>
    </div>
    <div class="row">
      @foreach ($recommended as $prod)
      <div class="col-xl-3 col-md-6 col-sm-6  mb-3">
      <input type="hidden" name="product_id" value="{{$prod->id }}">
      <input type="hidden" name="product_hash" value="{{$prod->hash }}">
      <div class="product-card rounded">
      <div class="product-card-offer">
        @if($prod->sale)
        <div class="offer-sale rounded">Скидки</div>
        @endif
        @if($prod->new)
        <div class="offer-new rounded">Новинка</div>
        @endif
      </div>
      <div class="like-button">
        <i class="fa-regular fa-heart"></i>
        <i class="active-icon fa-solid fa-heart"></i>
      </div>
      <div class="product-img">
        <a href="{{route('product', $prod->hash)}}">
        <img class="product-photo" src="{{$prod->image_path}}" alt="">
        </a>
      </div>
      <div class="product-info">
        <h4>
        <a href="{{route('product', $prod->hash)}}" class="mini-product-title">{{$prod->title}}</a>
        </h4>
        <p class="product-description">{{$prod->description}}</p>
        <div class="product-price d-flex justify-content-between">
        
        <div class="price">
          @if($prod->sale)
            <small>{{$prod->price}}</small>
            <span class="new-price">{{ $prod->price - ($prod->price * $prod->sale / 100)}}</span>
            @else
            <span class="new-price">{{ $prod->price}}</span>
          @endif
        </div>
        <div class="product-links">
        <div class="btn btn-outline-secondary add-to-cart">
        <i class="fa-solid fa-cart-shopping"></i>
        </div>
        </div>
        </div>
      </div>
      </div>
      </div>
    @endforeach
      {{-- @foreach ($recommended as $rec)
          
      <div class="col-xl-3 col-md-6 col-sm-6  mb-3">
        <div class="product-card rounded">
          <div class="product-card-offer">
            @if (!empty($rec->sale))
            <div class="offer-sale rounded">Скидки</div>
            @endif
            @if (!empty($rec->new))
            <div class="offer-new rounded">Новинка</div>
            @endif
          </div>
          <div class="product-img">
            <a href="{{route('product', $prod->hash)}}">
              <img src="{{$rec->image_path}}" alt="">
            </a>
          </div>
          <div class="product-info">
            <h4>
              <a href="{{route('product', $prod->hash)}}">{{$prod->title}}</a>
            </h4>
            <p class="product-description">{{$prod->description}}</p>
              <div class="product-price d-flex justify-content-between">
                <div class="price">
                  <small>70p</small>
                  65p
                </div>
                <div class="product-links">
                  <a href="#" class="btn btn-outline-secondary">
                    <i class="fa-solid fa-cart-shopping"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        @endforeach --}}
        
      </div>
    </div>
</section>
<section class="newproducts container">
  <div class="row mb-5">
    <h2 class="section-title d-md-block d-none">
      <span>Новинки</span>
    </h2>
    <h2 class="section-title2 d-md-none d-block">
      <span>Новинки</span>
    </h2>
  </div>
  <div class="owl-carousel owl-carousel-new owl-theme">
    @foreach ($new as $prod)
      
      <div class="product-card rounded">
      <div class="product-card-offer">
        @if($prod->sale)
        <div class="offer-sale rounded">Скидки</div>
        @endif
        @if($prod->new)
        <div class="offer-new rounded">Новинка</div>
        @endif
      </div>
      <div class="product-img">
        <a href="{{route('product', $prod->hash)}}">
        <img class="product-photo" src="{{$prod->image_path}}" alt="">
        </a>
      </div>
      <div class="product-info">
        <h4>
        <a href="{{route('product', $prod->hash)}}" class="mini-product-title">{{$prod->title}}</a>
        </h4>
        <p class="product-description">{{$prod->description}}</p>
        <div class="product-price d-flex justify-content-between">
        
        <div class="price">
          @if($prod->sale)
            <small>{{$prod->price}}</small>
            <span class="new-price">{{ $prod->price - ($prod->price * $prod->sale / 100)}}</span>
            @else
            <span class="new-price">{{ $prod->price}}</span>
          @endif
        </div>
        <div class="product-links">
        <div class="btn btn-outline-secondary add-to-cart">
        <i class="fa-solid fa-cart-shopping"></i>
        </div>
        </div>
        </div>
      </div>
      </div>

    @endforeach
  </div>
</section>
<section class="about-us" id="about">
  <div class="container">

    <div class="row mb-5 pt-2">
      <h2 class="section-title d-md-block d-none">
        <span>О нас</span>
      </h2>
      <h2 class="section-title2 d-md-none d-block">
        <span>О нас</span>
      </h2>
    </div>
    <div class="row">
      <div class="col-12">
        <p>
          Интернет-зоомагазин PetSrore – товары для домашних животных по низким ценам с доставкой на дом!
        </p>
        <p>
          Мы рады, когда ваши питомцы здоровы и в хорошем настроении, поэтому мы предлагаем только самые лучшие
          сертифицированные корма и аксессуары. В нашем интернет-магазине широкий ассортимент качественных кормов для
          кошек
          и собак, а также других домашних животных и птиц.
        </p>
        <p>
          Мы любим животных и ценим ваше время, поэтому гарантируем высокое качество товаров, быструю доставку и
          безупречный
          сервис.
        </p>
        <iframe id="map"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d484.4912616199228!2d56.01356149376936!3d54.715924539704275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43d93bda980881d7%3A0xd23270561cdcf1ea!2z0KPRhNC40LzRgdC60LjQuSDQutC-0LvQu9C10LTQtiDRgNCw0LTQuNC-0Y3Qu9C10LrRgtGA0L7QvdC40LrQuCwg0YLQtdC70LXQutC-0LzQvNGD0L3QuNC60LDRhtC40Lkg0Lgg0LHQtdC30L7Qv9Cw0YHQvdC-0YHRgtC4!5e0!3m2!1sru!2sru!4v1737725759878!5m2!1sru!2sru"
          width="100%" height="450" style="border:0; display:block;" class="py-4" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts')

<script>
  window.addNotification = () => {
    console.log(123);
    
    // let time = Date.now()
    //   let notifications = `
    //    <div class="notifications-item hide" data-id="${time}">
    //   <i class="fa-solid fa-xmark close-icon"></i>
    //   <i class="fa-regular fa-circle-check accept-icon"></i>
    //   <div class="notifications-text">
    //   <span><strong>${title}</strong> добавлен в корзину!</span>
    //   <a href="${link}">Открыть корзину</a>
    //   </div>
    // </div>
    //   `
    //   $('.notifications').append(notifications)

    //   setTimeout(function () {
    //   $('.notifications-item[data-id="' + time + '"]').removeClass('hide')
    //   }, 10)

    //   setTimeout(function () {
    //   $('.notifications-item[data-id="' + time + '"]').addClass('hide')
    //   setTimeout(function () {
    //     $('.notifications-item[data-id="' + time + '"]').remove()
    //   }, 250)
    //   }, 5000)
  }



$('.like-button').on('click', function(){
  $(this).addClass('active')
})

window.addClassElsMiniProduct()



</script>

@endsection
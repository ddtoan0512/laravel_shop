<header>
  <div class="wrap-main /">
    <a class="logo " title="Về trang chủ Thegioididong.com" href="https://www.thegioididong.com/" aria-label="logo">
      <i class="icontgdd-logo"></i>
    </a>
    <form id="search-site" action="https://www.thegioididong.com/tim-kiem" method="get" autocomplete="off">
      <input class="topinput" id="search-keyword" name="key" type="text" aria-label="Bạn tìm gì..."
        placeholder="Bạn tìm gì..." autocomplete="off" onkeyup="SuggestSearch(event,this, 0);" maxlength="50">
      <button class="btntop" type="submit" aria-label="tìm kiếm"><i class="icontgdd-topsearch"></i></button>
    </form>
    <nav>
      @if( isset($categories))
      @foreach($categories as $category)
      <a href="{{ route('get.list.product', [$category->c_slug, $category->id]) }}" class="mobile"
        title="{{ $category->c_name }}">
        <i class="icontgdd-mobile"></i>{{ $category->c_name }}
      </a>
      @endforeach
      @endif

      <div id="utility-cardsim" class="utility">
        Sim, thẻ cào<br>
        Đóng tiền
        <div class="mix-menu">
          <a href="https://www.thegioididong.com/sim-so-dep" class="cardsim">
            Sim số, thẻ cào
          </a>
          <a href="https://www.thegioididong.com/tien-ich/thanh-toan-tra-gop?">
            Đóng tiền điện, <br> nước, trả góp
          </a>
        </div>
      </div>

    </nav>

  </div>
  <div class="clr"></div>

</header>
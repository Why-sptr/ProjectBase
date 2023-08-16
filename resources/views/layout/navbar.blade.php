<header>
  <div class="navbar">
    <a class="navbar-brand" href="/cekongkir">
      <img src="{{asset('images/logopilar.svg')}}" alt="logopilar" width="250" height="50">
    </a>
    <ul class="links">
      <li><a href="/riwayat">Riwayat</a></li>
      <li><a href="/ordertruklong">Truk-Long</a></li>
      <li><a href="/ordertrukshort">Truk-Short</a></li>
      <li><a href="/orderpindahanlong">Pindahan-Long</a></li>
      <li><a href="/orderpindahanshort">Pindahan-Short</a></li>
    </ul>
    <div class="profile-dropdown">
      <div class="profile-trigger" onclick="toggleDropdown()">
        <img class="profile" src="{{ Auth::check() ? Auth::user()->profile_picture : asset('images/profile.svg') }}" alt="Avatar">
        <span class="caret"></span>
      </div>
      <div id="dropdown-content" class="dropdown-content">
        @if (Auth::check())
        <a href="#">Profile</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
          @csrf
        </form>
        @else
        <a href="login">Login</a>
        @endif
      </div>
    </div>

    <div class="toogle_btn">
      <i class="fa-solid fa-bars"></i>
    </div>
  </div>

  <div class="dropdown_menu">
    <li><a href="/riwayat">Riwayat</a></li>
    <li><a href="/ordertruklong">Truk-Long</a></li>
    <li><a href="/ordertrukshort">Truk-Short</a></li>
    <li><a href="/orderpindahanlong">Pindahan-Long</a></li>
    <li><a href="/orderpindahanshort">Pindahan-Short</a></li>
  </div>

</header>

<script>
  function toggleDropdown() {
    var dropdown = document.getElementById('dropdown-content');
    dropdown.classList.toggle('active');
  }
</script>
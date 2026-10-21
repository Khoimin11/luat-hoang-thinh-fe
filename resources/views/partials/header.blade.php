<header id="site-header" class="site-header" data-turbo-permanent>
    <div class="header-container">
        <a class="site-brand header-brand" href="{{ url('/') }}" aria-label="Hoàng Thịnh Luật — Trang chủ">
            <img class="header-logo-symbol" src="{{ asset('assets/images/logo-symbol.png') }}" width="64" height="64" alt="">
            <img class="header-logo-wordmark" src="{{ asset('assets/images/logo-wordmark.png') }}" width="260" height="38" alt="Hoàng Thịnh Luật — Law toward perfection">
        </a>
        <nav id="main-navigation" class="header-navigation" aria-label="Điều hướng chính">
            <a class="header-link {{ request()->is('/') ? 'is-active' : '' }}" href="{{ url('/') }}" @if(request()->is('/')) aria-current="page" @endif>Trang chủ</a>
            <a class="header-link {{ request()->routeIs('about') ? 'is-active' : '' }}" href="{{ route('about') }}" @if(request()->routeIs('about')) aria-current="page" @endif>Giới thiệu</a>
            <div class="header-practice" data-practice-dropdown>
                <a id="practice-menu-link" class="header-link {{ request()->routeIs('practice-areas', 'practice-areas.*') ? 'is-active' : '' }}" href="{{ route('practice-areas') }}" @if(request()->routeIs('practice-areas', 'practice-areas.*')) aria-current="page" @endif>Lĩnh vực hoạt động</a>
                <button id="practice-menu-trigger" class="header-practice-toggle header-link-dropdown" type="button" aria-label="Mở danh sách lĩnh vực hoạt động" aria-expanded="false" aria-controls="practice-menu" data-practice-trigger><img src="{{ asset('assets/icons/Icon.svg') }}" width="12" height="12" alt=""></button>
                @include('partials.menu-dropdown')
            </div>
            <a class="header-link {{ request()->routeIs('news') ? 'is-active' : '' }}" href="{{ route('news') }}" @if(request()->routeIs('news')) aria-current="page" @endif>Tin tức và Kiến thức pháp luật</a>
            <a class="header-link" href="#footer-contact">Liên hệ</a>
        </nav>
        <div class="header-actions">
            <a class="header-hotline" href="" aria-label="Tư vấn miễn phí: 0913 849 072">
                <span class="hotline-copy"><small>Tư vấn miễn phí</small><strong><img src="{{ asset('assets/icons/phone-number.png') }}" width="142" height="16" alt="0913.849.072"></strong></span>
                <span class="hotline-icon" aria-hidden="true">
                    <img src="{{ asset('assets/icons/phone-red.png') }}" width="48" height="48" alt="">
                </span>
            </a>
            <button class="header-search" type="button" disabled aria-label="Tìm kiếm chưa khả dụng">
                <img src="{{ asset('assets/icons/search-icon.png') }}" width="48" height="48" alt="">
            </button>
            <div class="header-languages" aria-label="Ngôn ngữ">
                <span class="language-current" lang="vi" aria-label="Ngôn ngữ hiện tại: tiếng Việt"><img class="language-flag" src="{{ asset('assets/icons/lang-vn.png') }}" width="20" height="20" alt=""> VN</span>
                <span class="language-unavailable" lang="en" aria-label="Tiếng Anh chưa khả dụng" aria-disabled="true"><img class="language-flag" src="{{ asset('assets/icons/lang-eng.png') }}" width="20" height="20" alt=""> EN</span>
            </div>
            <button class="menu-toggle" type="button" data-menu-toggle aria-controls="main-navigation" aria-expanded="false" aria-label="Mở hoặc đóng menu">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
    </div>
</header>

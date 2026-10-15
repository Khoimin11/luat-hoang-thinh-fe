<header id="site-header" class="site-header" data-turbo-permanent>
    <div class="header-container">
        <a class="site-brand header-brand" href="{{ url('/') }}" aria-label="Hoàng Thịnh Luật — Trang chủ">
            <img class="header-logo-symbol" src="{{ asset('assets/images/8e9a8484357d66f0745965a71f43232ac28d7a89.png') }}" width="64" height="64" alt="">
            <img class="header-logo-wordmark" src="{{ asset('assets/images/a8e7c209-2869-4b36-9c2d-6f158a3b9680 2.png') }}" width="260" height="38" alt="Hoàng Thịnh Luật — Law toward perfection">
        </a>
        <nav id="main-navigation" class="header-navigation" aria-label="Điều hướng chính">
            <a class="header-link {{ request()->is('/') ? 'is-active' : '' }}" href="{{ url('/') }}" @if(request()->is('/')) aria-current="page" @endif>Trang chủ</a>
            <a class="header-link {{ request()->routeIs('about') ? 'is-active' : '' }}" href="{{ route('about') }}" @if(request()->routeIs('about')) aria-current="page" @endif>Giới thiệu</a>
            <div class="header-practice" data-practice-dropdown>
                <a id="practice-menu-link" class="header-link {{ request()->routeIs('practice-areas') ? 'is-active' : '' }}" href="{{ route('practice-areas') }}" @if(request()->routeIs('practice-areas')) aria-current="page" @endif>Lĩnh vực hoạt động</a>
                <button id="practice-menu-trigger" class="header-practice-toggle header-link-dropdown" type="button" aria-label="Mở danh sách lĩnh vực hoạt động" aria-expanded="false" aria-controls="practice-menu" data-practice-trigger><img src="{{ asset('assets/icons/Icon.svg') }}" width="12" height="12" alt=""></button>
                @include('partials.menu-dropdown')
            </div>
            <span class="header-link is-unavailable" aria-disabled="true">Tin tức và Kiến thức pháp luật</span>
            <a class="header-link" href="#footer-contact">Liên hệ</a>
        </nav>
        <div class="header-actions">
            <a class="header-hotline" href="tel:0913849072" aria-label="Tư vấn miễn phí: 0913 849 072">
                <span class="hotline-copy"><small>Tư vấn miễn phí</small><strong>0913.849.072</strong></span>
                <span class="hotline-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="m6.6 2.3 3.2 5.1-2.3 2.3a17 17 0 0 0 6.8 6.8l2.3-2.3 5.1 3.2c.5.3.6.9.4 1.4l-1.3 2.5c-.3.5-.8.8-1.4.7C10 21.1 2.9 14 2 4.6c-.1-.6.2-1.1.7-1.4l2.5-1.3c.5-.2 1.1-.1 1.4.4Z"/><path d="M14 2a8 8 0 0 1 8 8M14 6a4 4 0 0 1 4 4" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                </span>
            </a>
            <button class="header-search" type="button" disabled aria-label="Tìm kiếm chưa khả dụng">
                <img src="{{ asset('assets/icons/Frame-5.svg') }}" width="24" height="24" alt="">
            </button>
            <div class="header-languages" aria-label="Ngôn ngữ">
                <span class="language-current" lang="vi" aria-label="Ngôn ngữ hiện tại: tiếng Việt"><svg class="language-flag" viewBox="0 0 20 20" aria-hidden="true"><circle cx="10" cy="10" r="10" fill="#da251d"/><path d="m10 3 1.65 5.1H17l-4.33 3.14 1.65 5.1L10 13.2l-4.32 3.14 1.65-5.1L3 8.1h5.35Z" fill="#ffdf00"/></svg> VN</span>
                <span class="language-unavailable" lang="en" aria-label="Tiếng Anh chưa khả dụng" aria-disabled="true"><svg class="language-flag" viewBox="0 0 20 20" aria-hidden="true"><defs><clipPath id="header-uk-flag"><circle cx="10" cy="10" r="10"/></clipPath></defs><g clip-path="url(#header-uk-flag)"><path fill="#012169" d="M0 0h20v20H0z"/><path d="m0 0 20 20M20 0 0 20" stroke="#fff" stroke-width="5"/><path d="m0 0 20 20M20 0 0 20" stroke="#c8102e" stroke-width="2"/><path d="M10 0v20M0 10h20" stroke="#fff" stroke-width="7"/><path d="M10 0v20M0 10h20" stroke="#c8102e" stroke-width="4"/></g></svg> EN</span>
            </div>
            <button class="menu-toggle" type="button" data-menu-toggle aria-controls="main-navigation" aria-expanded="false" aria-label="Mở hoặc đóng menu">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
    </div>
</header>

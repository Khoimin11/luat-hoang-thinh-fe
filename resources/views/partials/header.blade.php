<header id="site-header" class="site-header" data-turbo-permanent>
    <div class="header-container">
        <a class="site-brand header-brand" href="{{ url('/') }}" aria-label="Hoàng Thịnh Luật — Trang chủ">
            <img class="header-logo-symbol" src="{{ asset('assets/images/logo-symbol.png') }}" width="64" height="64" alt="">
            <img class="header-logo-wordmark" src="{{ asset('assets/images/logo-wordmark.png') }}" width="260" height="38" alt="Hoàng Thịnh Luật — Law toward perfection">
        </a>
        <div class="header-right">
            <nav id="main-navigation" class="header-navigation" aria-label="Điều hướng chính">
                <a class="header-link {{ request()->is('/') ? 'is-active' : '' }}" href="{{ url('/') }}" @if(request()->is('/')) aria-current="page" @endif>Trang chủ</a>
                <a class="header-link {{ request()->routeIs('about') ? 'is-active' : '' }}" href="{{ route('about') }}" @if(request()->routeIs('about')) aria-current="page" @endif>Giới thiệu</a>
                <div class="header-practice" data-practice-dropdown>
                    <a id="practice-menu-link" class="header-link {{ request()->routeIs('practice-areas', 'practice-areas.*') ? 'is-active' : '' }}" href="{{ route('practice-areas') }}" @if(request()->routeIs('practice-areas', 'practice-areas.*')) aria-current="page" @endif>Lĩnh vực hoạt động</a>
                    <button id="practice-menu-trigger" class="header-practice-toggle header-link-dropdown" type="button" aria-label="Mở danh sách lĩnh vực hoạt động" aria-expanded="false" aria-controls="practice-menu" data-practice-trigger><img src="{{ asset('assets/icons/Icon.svg') }}" width="12" height="12" alt=""></button>
                    @include('partials.menu-dropdown')
                </div>
                <div class="header-knowledge" data-header-dropdown>
                    <a class="header-link {{ request()->routeIs('news', 'news.*') ? 'is-active' : '' }}" href="{{ route('news') }}" @if(request()->routeIs('news', 'news.*')) aria-current="page" @endif>Kiến thức pháp lý</a>
                    <button class="header-knowledge-toggle header-link-dropdown" type="button" aria-label="Mở danh mục kiến thức pháp lý" aria-expanded="false" aria-controls="knowledge-menu" data-header-dropdown-trigger><img src="{{ asset('assets/icons/Icon.svg') }}" width="12" height="12" alt=""></button>
                    <div id="knowledge-menu" class="header-knowledge-panel" data-header-dropdown-panel hidden>
                        @foreach ($newsCategories as $newsCategory)
                            <a class="header-knowledge-item" href="{{ route('news.category', $newsCategory['slug']) }}">{{ $newsCategory['title'] }}</a>
                        @endforeach
                    </div>
                </div>
                <a class="header-link {{ request()->routeIs('contact') ? 'is-active' : '' }}" href="{{ route('contact') }}" @if(request()->routeIs('contact')) aria-current="page" @endif>Liên hệ</a>
            </nav>
            <div class="header-actions">
                <a class="header-hotline" href="" aria-label="Tư vấn miễn phí: 0913 849 072">
                    <span class="hotline-copy"><small>Tư vấn miễn phí</small><strong>0913.849.072</strong></span>
                    <span class="hotline-icon" aria-hidden="true">
                        <img src="{{ asset('assets/icons/phone-red.png') }}" width="48" height="48" alt="">
                    </span>
                </a>
                <button class="header-search" type="button" data-search-toggle aria-label="Mở tìm kiếm" aria-expanded="false" aria-controls="header-search-form">
                    <svg class="search-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><circle cx="10.5" cy="10.5" r="7"/><path d="m16 16 5 5"/></svg>
                </button>
                <div class="header-languages" data-language-switcher data-language="vi" role="group" aria-label="Chọn ngôn ngữ">
                    <button class="language-trigger" type="button" aria-expanded="false" aria-controls="language-options" aria-label="Chọn ngôn ngữ">
                        <img class="language-flag" src="{{ asset('assets/icons/lang-vn.svg') }}" width="20" height="20" alt="">
                        <span>VN</span>
                    </button>
                    <div id="language-options" class="language-options">
                    @foreach ([['vi', 'VN', 'lang-vn.svg', 'Tiếng Việt'], ['en', 'EN', 'lang-eng.svg', 'English']] as [$code, $label, $flag, $name])
                        <button class="language-option" type="button" data-language="{{ $code }}" lang="{{ $code }}" aria-label="{{ $name }}" aria-pressed="{{ $code === 'vi' ? 'true' : 'false' }}">
                            <img class="language-flag" src="{{ asset('assets/icons/'.$flag) }}" width="20" height="20" alt="">
                            <span>{{ $label }}</span>
                        </button>
                    @endforeach
                    </div>
                </div>
                <button class="menu-toggle" type="button" data-menu-toggle aria-controls="main-navigation" aria-expanded="false" aria-label="Mở hoặc đóng menu">
                    <svg class="menu-icon-open" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><rect x="2" y="4" width="16" height="2" rx="1"/><rect x="2" y="9" width="16" height="2" rx="1"/><rect x="2" y="14" width="16" height="2" rx="1"/></svg>
                </button>
            </div>
        </div>
    </div>
    <div class="header-menu-backdrop" data-menu-backdrop aria-hidden="true" hidden></div>
    <form id="header-search-form" class="header-search-form" role="search" data-turbo="false" inert>
        <label class="sr-only" for="header-search-input">Tìm kiếm</label>
        <input id="header-search-input" type="search" name="q" placeholder="Tìm kiếm..." autocomplete="off">
    </form>
</header>

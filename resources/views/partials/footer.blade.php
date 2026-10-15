<footer id="site-footer" class="site-footer" data-turbo-permanent style="--footer-background: url('{{ asset('assets/images/Footer.png') }}')">
    <div class="footer-container">
        <div class="footer-grid">
            <div class="footer-company">
                <a class="site-brand" href="{{ url('/') }}" aria-label="Hoàng Thịnh Luật — Trang chủ">
                    <img class="footer-logo" src="{{ asset('assets/images/footer-logo.png') }}" alt="Hoàng Thịnh Luật" width="389" height="64" loading="lazy">
                </a>
                <p class="footer-company-name">Công ty Luật TNHH MTV<strong>Hoàng Thịnh Luật</strong></p>
                <p class="footer-tagline">Pháp lý tối đa – Quyền lợi đảm bảo</p>
                <div class="footer-socials" aria-label="Mạng xã hội">
                    <button type="button" disabled aria-label="Facebook"><img src="{{ asset('assets/icons/Frame-1.svg') }}" alt="" width="14" height="14"></button>
                    <button type="button" disabled aria-label="LinkedIn"><img src="{{ asset('assets/icons/linkedin.svg') }}" alt="" width="14" height="14"></button>
                    <button type="button" disabled aria-label="Instagram"><img src="{{ asset('assets/icons/Frame-2.svg') }}" alt="" width="14" height="14"></button>
                </div>
            </div>
            <nav class="footer-column" aria-labelledby="quick-links-title">
                <h2 id="quick-links-title" class="footer-heading">Liên kết nhanh</h2>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}">Trang chủ</a></li>
                    <li><a href="{{ route('about') }}">Giới thiệu</a></li>
                    <li><a href="{{ route('practice-areas') }}">Lĩnh vực hoạt động</a></li>
                    <li><span aria-disabled="true">Tin tức</span></li>
                    <li><a href="#footer-contact">Liên hệ</a></li>
                </ul>
            </nav>
            <nav class="footer-column" aria-labelledby="legal-links-title">
                <h2 id="legal-links-title" class="footer-heading">Liên kết pháp lý</h2>
                <ul class="footer-links">
                    <li><a href="#" target="_blank" rel="noopener noreferrer">TAND Tối cao<span class="sr-only"> (mở tab mới)</span></a></li>
                    <li><a href="#" target="_blank" rel="noopener noreferrer">VKSND Tối cao<span class="sr-only"> (mở tab mới)</span></a></li>
                    <li><a href="#" target="_blank" rel="noopener noreferrer">Bộ Tư pháp<span class="sr-only"> (mở tab mới)</span></a></li>
                    <li><a href="#" target="_blank" rel="noopener noreferrer">TAND TP.HCM<span class="sr-only"> (mở tab mới)</span></a></li>
                    <li><a href="#" target="_blank" rel="noopener noreferrer">Đoàn Luật sư TP.HCM<span class="sr-only"> (mở tab mới)</span></a></li>
                    <li><a href="#" target="_blank" rel="noopener noreferrer">Cổng TTĐT Chính phủ<span class="sr-only"> (mở tab mới)</span></a></li>
                    <li><a href="#" target="_blank" rel="noopener noreferrer">Dịch vụ Công QG<span class="sr-only"> (mở tab mới)</span></a></li>
                    <li><a href="#" target="_blank" rel="noopener noreferrer">Đăng ký KD QG<span class="sr-only"> (mở tab mới)</span></a></li>
                </ul>
            </nav>
            <section id="footer-contact" class="footer-column" aria-labelledby="footer-contact-title">
                <h2 id="footer-contact-title" class="footer-heading">Thông tin liên hệ</h2>
                <address class="footer-address">
                    <p><span>Email:</span> <a href="mailto:hoangthinhluat.lawfirm@gmail.com">hoangthinhluat.lawfirm@gmail.com</a></p>
                    <p><span>Trụ sở chính:</span> 40/9/8 Trần Văn Quang, P. Bảy Hiền, TP.HCM</p>
                    <p><span>Văn phòng:</span> 1124 Lạc Long Quân, P. Tân Hòa, TP.HCM</p>
                    <p><span>Số điện thoại:</span> <a href="tel:0913849072">0913.849.072</a></p>
                </address>
                <a class="footer-map" href="https://www.google.com/maps/search/?api=1&amp;query={{ rawurlencode('1124 Lạc Long Quân, TP.HCM') }}" target="_blank" rel="noopener noreferrer" aria-label="Xem vị trí văn phòng trên Google Maps (mở tab mới)">
                    <img src="{{ asset('assets/images/41391b1d4bf75bc96f6bf419ac4b7ffb13eaa85e.png') }}" alt="Bản đồ khu vực văn phòng Hoàng Thịnh Luật" width="1398" height="605" loading="lazy">
                </a>
            </section>
        </div>
        <div class="footer-bottom"><p>Copyright {{ date('Y') }} © Thiết kế website IMS</p></div>
    </div>
</footer>

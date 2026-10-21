@extends('layouts.app')

@section('title', 'Bài viết chi tiết')

@section('content')
  {{-- Section: ArticleBreadcrumb --}}
  <nav class="article-breadcrumb" aria-label="Đường dẫn trang">
    <ol>
      <li><a href="{{ route('home') }}">Trang chủ</a></li>
      <li aria-hidden="true">/</li>
      <li><a href="{{ route('practice-areas') }}">Lĩnh vực hoạt động</a></li>
      <li aria-hidden="true">/</li>
      <li><a href="{{ route('practice-areas.land') }}">Luật sư đất đai, nhà ở, BĐS</a></li>
      <li aria-hidden="true">/</li>
      <li aria-current="page">Pháp Lý Khi Xây Nhà: Những Điều Bắt Buộc Phải Biết Trước Khi Khởi Công</li>
    </ol>
  </nav>

  {{-- Section: Article — tiêu đề, nội dung và sidebar trong cùng khung bài viết. --}}
  <section class="article-section" aria-labelledby="article-title">
    <div class="article-container">
      {{-- Section: ArticleHeader --}}
      <header class="article-heading">
        <h1 id="article-title">Pháp Lý Khi Xây Nhà: Những Điều Bắt Buộc Phải Biết Trước Khi Khởi Công</h1>
        <div class="article-heading-meta">
          <div class="article-heading-date">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#737373" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <rect x="3" y="4" width="18" height="18" rx="2"/>
              <path d="M8 2v4m8-4v4M3 10h18m-13 4h.01M12 14h.01M16 14h.01M8 18h.01M12 18h.01M16 18h.01"/>
            </svg>
            <time datetime="2026-09-18">18/09/2026</time>
          </div>
          {{-- Cụm chia sẻ: dựng giao diện trước. --}}
          <div class="article-heading-share" role="group" aria-label="Chia sẻ bài viết">
            <span>Chia sẻ:</span>
            @foreach ([['link-icon.svg', 'Sao chép liên kết'], ['fb-icon.svg', 'Chia sẻ qua Facebook'], ['insta-icon.svg', 'Chia sẻ qua Instagram']] as [$icon, $label])
              <button type="button" disabled aria-label="{{ $label }}"><img src="{{ asset('assets/icons/'.$icon) }}" alt="" width="16" height="16"></button>
            @endforeach
          </div>
        </div>
      </header>

      {{-- Section: ArticleBody --}}
      <div class="article-body-layout">
        <div class="article-body-content">
          {{-- Section: ArticleTableOfContents --}}
          <nav class="article-toc" aria-labelledby="article-toc-title">
            <div class="article-toc-header">
              <h2 id="article-toc-title">Mục lục bài viết</h2>
              <img src="{{ asset('assets/icons/muc-luc-icon.png') }}" alt="" width="32" height="32">
            </div>
            <ol class="article-toc-list">
              <li>Tại sao pháp lý khi xây nhà lại quan trọng đến vậy?</li>
              <li>
                Các bước pháp lý khi xây nhà cần thực hiện đúng trình tự
                <ol class="article-toc-sublist">
                  <li>2.1. Bước 1: Kiểm tra tình trạng pháp lý của thửa đất</li>
                  <li>2.2. Bước 2: Xin giấy phép xây dựng</li>
                  <li>2.3. Bước 3: Ký kết hợp đồng thi công xây dựng</li>
                  <li>2.4. Bước 4: Thực hiện thủ tục hoàn công</li>
                </ol>
              </li>
              <li value="4">Bảng so sánh các trường hợp miễn và phải xin giấy phép xây dựng</li>
              <li>
                Những rủi ro pháp lý phổ biến khi xây nhà và cách phòng tránh
                <ol class="article-toc-sublist">
                  <li>5.1. Rủi ro 1: Xây dựng vượt chỉ giới, lấn chiếm lộ giới</li>
                  <li>5.2. Rủi ro 2: Hợp đồng thi công sơ sài, thiếu điều khoản bảo vệ chủ nhà</li>
                  <li>5.3. Rủi ro 3: Đất chưa đủ điều kiện pháp lý để xây dựng</li>
                  <li>5.4. Rủi ro 4: Không thực hiện thủ tục hoàn công sau xây dựng</li>
                </ol>
              </li>
              <li>Vai trò của luật sư trong việc đảm bảo pháp lý khi xây nhà</li>
              <li>Liên hệ tư vấn pháp lý xây nhà tại Hoàng Thịnh Luật</li>
            </ol>
          </nav>

          {{-- Section: ArticleContent --}}
          <article class="article-prose" aria-label="Nội dung bài viết">
            <p class="article-prose-intro">Xây dựng một ngôi nhà là ước mơ của hàng triệu gia đình Việt Nam, nhưng đây cũng là hành trình tiềm ẩn vô số rủi ro pháp lý nếu chủ nhà không nắm vững các quy định của pháp luật. Từ việc xin giấy phép xây dựng, ký kết hợp đồng thi công, cho đến hoàn công và đăng ký quyền sở hữu — mỗi bước đều đòi hỏi sự cẩn trọng và hiểu biết pháp lý sâu sắc. Bài viết dưới đây sẽ cung cấp cho bạn cái nhìn toàn diện và chi tiết nhất về pháp lý khi xây nhà, giúp bạn tránh những sai lầm đắt giá và bảo vệ quyền lợi hợp pháp của mình.</p>
            <img class="article-prose-image" src="{{ asset('assets/images/blog-detail-1.png') }}" alt="Công trình nhà ở đang thi công" width="916" height="500" loading="lazy">
            <h2>Tại Sao Pháp Lý Khi Xây Nhà Lại Quan Trọng Đến Vậy?</h2>
            <p>Nhiều chủ nhà có tâm lý chủ quan, cho rằng chỉ cần có đất là có thể xây dựng tùy ý. Thực tế, pháp lý khi xây nhà là một hệ thống quy định chặt chẽ, bao gồm nhiều tầng lớp từ Luật Xây dựng, Luật Nhà ở, Luật Đất đai cho đến các Nghị định, Thông tư hướng dẫn và quy hoạch đô thị địa phương. Việc bỏ qua hoặc không tuân thủ đúng các quy định này có thể dẫn đến những hậu quả nghiêm trọng:</p>
            <ul>
              <li>Bị cưỡng chế tháo dỡ công trình: Công trình xây dựng không phép hoặc sai phép có thể bị cơ quan chức năng ra quyết định phá dỡ, gây thiệt hại tài chính khổng lồ.</li>
              <li>Không thể hoàn công và cấp sổ hồng: Nhà xây không đúng quy định sẽ không được cấp giấy chứng nhận quyền sở hữu, dẫn đến khó khăn trong giao dịch mua bán, thế chấp vay vốn.</li>
              <li>Tranh chấp hợp đồng xây dựng: Hợp đồng thi công không rõ ràng là nguyên nhân phổ biến dẫn đến tranh chấp giữa chủ nhà và nhà thầu, gây tốn kém thời gian và chi phí.</li>
              <li>Vi phạm quy hoạch: Xây dựng không đúng chỉ giới, lấn chiếm hành lang an toàn giao thông, hành lang bảo vệ công trình thủy lợi… có thể bị xử phạt hành chính nặng.</li>
            </ul>
            <p>Hiểu rõ và tuân thủ pháp lý khi xây nhà không chỉ bảo vệ tài sản của bạn mà còn đảm bảo an toàn pháp lý lâu dài cho toàn bộ gia đình.</p>
            <p>Để được tư vấn chuyên sâu về tư vấn pháp lý xây dựng tại TP.HCM, đội ngũ luật sư của Hoàng Thịnh Luật luôn sẵn sàng hỗ trợ bạn từ bước đầu tiên.</p>
            <h2>Các Bước Pháp Lý Khi Xây Nhà Cần Thực Hiện Đúng Trình Tự</h2>
            <p>Để đảm bảo công trình xây dựng hợp pháp từ đầu đến cuối, chủ nhà cần nắm vững và thực hiện đúng các bước pháp lý theo trình tự sau:</p>
            <h3>Bước 1: Kiểm Tra Tình Trạng Pháp Lý Của Thửa Đất</h3>
            <p>Trước khi bất kỳ hoạt động xây dựng nào diễn ra, chủ nhà phải xác minh rõ ràng tình trạng pháp lý của thửa đất. Cụ thể cần kiểm tra: đất có sổ đỏ/sổ hồng hợp lệ không, mục đích sử dụng đất có phải là đất ở không, đất có nằm trong quy hoạch thu hồi, giải tỏa không, và có đang bị kê biên, thế chấp hay tranh chấp không. Đây là nền tảng căn bản nhất của pháp lý khi xây nhà mà không thể bỏ qua.</p>
            <p>Tìm hiểu thêm về thủ tục làm sổ đỏ và các điều kiện pháp lý liên quan đến quyền sử dụng đất trước khi tiến hành xây dựng.</p>
            <h3>Bước 2: Xin Giấy Phép Xây Dựng</h3>
            <p>Theo Luật Xây dựng 2014 (sửa đổi, bổ sung năm 2020), hầu hết các công trình nhà ở riêng lẻ đều phải xin giấy phép xây dựng trước khi khởi công. Hồ sơ xin giấy phép xây dựng thông thường bao gồm:</p>
            <ul>
              <li>Đơn đề nghị cấp giấy phép xây dựng theo mẫu quy định</li>
              <li>Bản sao giấy tờ chứng minh quyền sử dụng đất (sổ đỏ/sổ hồng)</li>
              <li>Bản vẽ thiết kế kiến trúc (mặt bằng, mặt đứng, mặt cắt) đã được thẩm duyệt</li>
              <li>Báo cáo kết quả thẩm tra thiết kế (đối với công trình yêu cầu thẩm tra)</li>
            </ul>
            <p>Thời gian giải quyết hồ sơ thông thường là 15 ngày làm việc đối với nhà ở riêng lẻ tại đô thị. Xây dựng khi chưa có giấy phép là vi phạm nghiêm trọng trong pháp lý khi xây nhà.</p>
            <img class="article-prose-image" src="{{ asset('assets/images/blog-detail-2.png') }}" alt="Hồ sơ và giấy phép xây dựng nhà ở" width="916" height="500" loading="lazy">
            <h3>Bước 3: Ký Kết Hợp Đồng Thi Công Xây Dựng</h3>
            <p>Hợp đồng thi công xây dựng là văn bản pháp lý quan trọng bậc nhất trong quan hệ giữa chủ nhà và nhà thầu. Một hợp đồng thi công chuẩn pháp lý phải có đầy đủ các điều khoản về: phạm vi công việc, tiến độ thi công, đơn giá và phương thức thanh toán, trách nhiệm bảo hành, điều khoản phạt vi phạm và giải quyết tranh chấp. Thiếu bất kỳ điều khoản nào trong số này đều có thể tạo ra kẽ hở pháp lý gây bất lợi cho chủ nhà.</p>
            <p>Nếu bạn đang gặp vướng mắc về tranh chấp hợp đồng xây dựng tại TP.HCM, hãy liên hệ ngay với luật sư chuyên ngành để được hỗ trợ kịp thời.</p>
            <h3>Bước 4: Thực Hiện Thủ Tục Hoàn Công</h3>
            <p>Sau khi công trình hoàn thành, chủ nhà phải thực hiện thủ tục nghiệm thu và hoàn công. Đây là bước xác nhận công trình đã được xây dựng đúng với giấy phép và thiết kế đã được phê duyệt. Hồ sơ hoàn công bao gồm bản vẽ hoàn công, biên bản nghiệm thu, và các giấy tờ liên quan khác. Hoàn công là điều kiện bắt buộc để được cấp giấy chứng nhận quyền sở hữu nhà ở.</p>
            <h2>Bảng So Sánh Các Trường Hợp Miễn Và Phải Xin Giấy Phép Xây Dựng</h2>
            <p>Không phải mọi công trình đều bắt buộc xin giấy phép xây dựng. Dưới đây là bảng phân loại giúp chủ nhà nắm rõ hơn về pháp lý khi xây nhà:</p>
            <div class="article-table-scroll" role="region" aria-label="Bảng so sánh giấy phép xây dựng" tabindex="0">
              <table>
                <thead>
                  <tr>
                    <th scope="col">Loại Công Trình</th>
                    <th scope="col">Cần Giấy Phép?</th>
                    <th scope="col">Ghi Chú</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Nhà ở riêng lẻ tại đô thị</td>
                    <td>Bắt buộc</td>
                    <td>Phải xin GPXD trước khi khởi công</td>
                  </tr>
                  <tr>
                    <td>Nhà ở riêng lẻ tại nông thôn (có quy hoạch)</td>
                    <td>Bắt buộc</td>
                    <td>Theo quy định của UBND cấp tỉnh</td>
                  </tr>
                  <tr>
                    <td>Nhà ở riêng lẻ tại nông thôn (chưa có quy hoạch)</td>
                    <td>Miễn phép</td>
                    <td>Nhưng phải tuân thủ quy chuẩn xây dựng</td>
                  </tr>
                  <tr>
                    <td>Sửa chữa, cải tạo không thay đổi kết cấu chịu lực</td>
                    <td>Miễn phép</td>
                    <td>Không thay đổi công năng, kiến trúc mặt ngoài</td>
                  </tr>
                  <tr>
                    <td>Công trình xây dựng tạm</td>
                    <td>Cần GPXD tạm</td>
                    <td>Phải phá dỡ khi hết thời hạn</td>
                  </tr>
                  <tr>
                    <td>Công trình trong khu vực bảo tồn, di tích</td>
                    <td>Bắt buộc + Thẩm duyệt đặc biệt</td>
                    <td>Cần ý kiến của cơ quan quản lý di sản</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <img class="article-prose-image" src="{{ asset('assets/images/blog-detail-3.png') }}" alt="Luật sư Hoàng Thịnh Luật tư vấn pháp lý xây dựng" width="916" height="500" loading="lazy">
            <h2>Những Rủi Ro Pháp Lý Phổ Biến Khi Xây Nhà Và Cách Phòng Tránh</h2>
            <p>Trong quá trình tư vấn thực tế, các luật sư của Hoàng Thịnh Luật thường xuyên gặp những tình huống rủi ro pháp lý điển hình mà chủ nhà mắc phải. Hiểu rõ những rủi ro này là cách tốt nhất để phòng tránh khi đối mặt với pháp lý khi xây nhà.</p>
            <h3>Rủi Ro 1: Xây Dựng Vượt Chỉ Giới, Lấn Chiếm Lộ Giới</h3>
            <p>Đây là vi phạm cực kỳ phổ biến, đặc biệt tại các đô thị lớn như TP.HCM. Chủ nhà thường không nắm rõ chỉ giới xây dựng, lộ giới đường, khoảng lùi bắt buộc theo quy hoạch. Hậu quả là phần công trình vi phạm bị buộc tháo dỡ, gây lãng phí lớn.</p>
            <h3>Rủi Ro 2: Hợp Đồng Thi Công Sơ Sài, Thiếu Điều Khoản Bảo Vệ Chủ Nhà</h3>
            <p>Nhiều chủ nhà ký hợp đồng miệng hoặc hợp đồng viết tay không đầy đủ với nhà thầu. Khi xảy ra tranh chấp về chất lượng công trình, tiến độ hay thanh toán, chủ nhà rơi vào thế bất lợi vì thiếu căn cứ pháp lý để bảo vệ quyền lợi.</p>
            <p>Tìm hiểu thêm về các rủi ro pháp lý trong dự án xây dựng để chủ động phòng ngừa và bảo vệ quyền lợi của mình.</p>
            <h3>Rủi Ro 3: Đất Chưa Đủ Điều Kiện Pháp Lý Để Xây Dựng</h3>
            <p>Một số trường hợp đất chưa được chuyển đổi mục đích sử dụng sang đất ở, hoặc đang trong diện quy hoạch treo, hoặc có tranh chấp chưa được giải quyết. Xây dựng trên những loại đất này tiềm ẩn nguy cơ mất trắng toàn bộ công trình.</p>
            <h3>Rủi Ro 4: Không Thực Hiện Thủ Tục Hoàn Công Sau Xây Dựng</h3>
            <p>Nhiều chủ nhà sau khi hoàn thành xây dựng lại bỏ qua bước hoàn công, dẫn đến tình trạng nhà không có giấy tờ hợp lệ, không thể thế chấp ngân hàng, không thể sang nhượng, và gặp khó khăn khi muốn hợp thức hóa sau này.</p>
            <p>Đội ngũ luật sư xây dựng tại TP.HCM của Hoàng Thịnh Luật có thể đồng hành cùng bạn trong toàn bộ quá trình xử lý pháp lý xây dựng.</p>
            <img class="article-prose-image" src="{{ asset('assets/images/blog-detail-4.png') }}" alt="Nhà ở đã hoàn thiện" width="916" height="500" loading="lazy">
            <h2>Vai Trò Của Luật Sư Trong Việc Đảm Bảo Pháp Lý Khi Xây Nhà</h2>
            <p>Trong bối cảnh hệ thống pháp luật xây dựng ngày càng phức tạp và thường xuyên được cập nhật, vai trò của luật sư chuyên ngành xây dựng và bất động sản trở nên vô cùng quan trọng. Một luật sư giàu kinh nghiệm có thể hỗ trợ chủ nhà trong toàn bộ hành trình pháp lý khi xây nhà, bao gồm:</p>
            <ul>
              <li>Rà soát và tư vấn tình trạng pháp lý thửa đất trước khi quyết định xây dựng, giúp phát hiện sớm các vấn đề tiềm ẩn.</li>
              <li>Hỗ trợ soạn thảo và thẩm định hợp đồng thi công, đảm bảo các điều khoản bảo vệ tối đa quyền lợi của chủ nhà.</li>
              <li>Tư vấn quy trình xin giấy phép xây dựng, giúp chuẩn bị hồ sơ đúng và đầy đủ, tránh bị trả hồ sơ nhiều lần.</li>
              <li>Đại diện giải quyết tranh chấp khi phát sinh mâu thuẫn với nhà thầu, hàng xóm hoặc cơ quan quản lý nhà nước.</li>
              <li>Hỗ trợ thủ tục hoàn công và đăng ký quyền sở hữu nhà ở sau khi công trình hoàn thành.</li>
            </ul>
            <p>Để được hỗ trợ toàn diện về luật sư nhà ở tại TP.HCM, hãy liên hệ ngay với Hoàng Thịnh Luật để nhận tư vấn chuyên sâu và kịp thời.</p>
            <p>Đặc biệt, khi xảy ra các tình huống phức tạp như tranh chấp ranh giới đất, khiếu nại quyết định hành chính về xây dựng, hay xử lý công trình vi phạm, sự hỗ trợ của luật sư chuyên ngành là yếu tố quyết định để bảo vệ quyền lợi hợp pháp của chủ nhà một cách hiệu quả nhất.</p>
            <p>Pháp lý khi xây nhà là một hành trình đòi hỏi sự chuẩn bị kỹ lưỡng, kiến thức pháp luật vững chắc và sự thận trọng ở từng bước. Từ việc kiểm tra tình trạng pháp lý thửa đất, xin giấy phép xây dựng, ký kết hợp đồng thi công đúng chuẩn, cho đến hoàn công và đăng ký quyền sở hữu — mỗi giai đoạn đều có những quy định pháp lý riêng biệt cần tuân thủ nghiêm ngặt.</p>
            <p>Việc bỏ qua hoặc xem nhẹ bất kỳ bước nào trong quy trình pháp lý khi xây nhà đều có thể dẫn đến những hậu quả tài chính và pháp lý nghiêm trọng, thậm chí mất trắng toàn bộ công trình. Ngược lại, khi được tư vấn và đồng hành bởi một đội ngũ luật sư chuyên nghiệp, chủ nhà có thể yên tâm xây dựng ngôi nhà mơ ước của mình trên nền tảng pháp lý vững chắc và an toàn.</p>
            <h2>Liên Hệ Tư Vấn Pháp Lý Xây Nhà Tại Hoàng Thịnh Luật</h2>
            <p>Nếu bạn đang có kế hoạch xây dựng nhà ở và cần được tư vấn chuyên sâu về pháp lý khi xây nhà, Công ty Luật TNHH MTV Hoàng Thịnh Luật với đội ngũ luật sư giàu kinh nghiệm trong lĩnh vực đất đai, nhà ở và xây dựng sẵn sàng đồng hành cùng bạn trong từng bước của hành trình này.</p>
            <ul>
              <li>Trụ sở chính: Số 40/9/8 Trần Văn Quang, Phường Bảy Hiền, TP. Hồ Chí Minh</li>
              <li>Văn phòng: Tòa nhà số 1124 Lạc Long Quân, Phường Tân Hoà, TP. Hồ Chí Minh</li>
              <li>Hotline/Zalo (24/7): 0913.849.072 (Ls. Phan Minh Hoàng)</li>
              <li>Email: hoangthinhluat.lawfirm@gmail.com</li>
              <li>Website: hoangthinhluat.com</li>
            </ul>
            <p>Liên hệ ngay để nhận tư vấn pháp lý chính xác và kịp thời từ đội ngũ Luật Sư đất đai tại TP.HCM của Hoàng Thịnh Luật — Bảo vệ quyền lợi của bạn là sứ mệnh của chúng tôi.</p>
          </article>
        </div>

        {{-- Section: ArticleSidebar --}}
        @php
          $landPosts = json_decode(
            file_get_contents(resource_path('data/land-posts.json')),
            true,
            512,
            JSON_THROW_ON_ERROR
          );
          $latestPosts = array_map(fn ($index) => $landPosts[$index], [0, 1, 3, 9, 4]);
          $sidebarTitles = [
            'Pháp Lý Khi Xây Nhà: Những Điều Bắt Buộc Phải Biết',
            'Tranh Chấp Hợp Đồng Xây Dựng: Nguyên Nhân và Giải Quyết',
            'Top 15 Luật sư giỏi HCM uy tín năm 2026',
            'Các loại chứng cứ cần thiết trong tranh chấp đất đai theo Luật Đất đai 2024 – Quy định mới 2026',
            'Luật Sư Tranh Chấp Đất Đai Giỏi Với Uy Tín 15 Năm',
          ];
          foreach ($latestPosts as $index => &$post) {
            $post['title'] = $sidebarTitles[$index];
          }
          unset($post);
          $latestPosts[3]['date'] = '2026-08-13';
        @endphp
        <aside class="article-sidebar" aria-label="Bài viết mới nhất và dịch vụ luật">
          @include('partials.sidebar.latest-posts', ['posts' => $latestPosts])
          @include('partials.sidebar.services')
          @include('partials.sidebar.consultation')
        </aside>
      </div>
    </div>
  </section>

  {{-- Section: RelatedArticles --}}
  <section class="home-news article-related" aria-labelledby="article-related-title">
    <div class="home-news-container">
      <div class="home-news-header">
        <h2 id="article-related-title">Bài viết liên quan <img src="{{ asset('assets/icons/2970777 1.svg') }}" alt="" width="32" height="32" loading="lazy"></h2>
        <x-view-more :href="route('news')" />
      </div>
      <div class="article-related-carousel">
        <div class="home-news-grid">
          @foreach ([
            ['Image-3.png', 'Những điểm mới của Luật Đất đai 2024 có hiệu lực từ 01/08/2024', 'Tổng hợp các quy định mới quan trọng doanh nghiệp và người dân cần lưu ý.'],
            ['Image.png', 'Thủ tục thành lập doanh nghiệp mới nhất năm 2024', 'Hướng dẫn chi tiết hồ sơ, quy trình và những lưu ý quan trọng để tránh sai sót.'],
            ['Image-1.png', 'Tư vấn ly hôn đơn phương: Quy trình, hồ sơ và chi phí chi tiết', 'Cập nhật quy định mới nhất giúp bạn giải quyết nhanh chóng, tối ưu hóa quyền lợi.'],
            ['Image-2.png', 'Doanh nghiệp cần lưu ý gì khi thay đổi người đại diện pháp luật?', 'Những quy định quan trọng về thủ tục cần thực hiện đúng theo quy định hiện hành.'],
          ] as [$image, $title, $description])
            <x-blog-card
              :image="asset('assets/images/'.$image)"
              :title="$title"
              :description="$description"
              date="2026-07-26"
            />
          @endforeach
        </div>
        {{-- Nút chuyển slide: chỉ dựng giao diện, chưa gắn chức năng. --}}
        <button class="article-related-arrow article-related-prev" type="button" aria-label="Bài viết trước" disabled>
          <img src="{{ asset('assets/icons/button-previous-slide.png') }}" alt="" width="56" height="56" loading="lazy">
        </button>
        <button class="article-related-arrow article-related-next" type="button" aria-label="Bài viết tiếp theo" disabled>
          <img src="{{ asset('assets/icons/button-next-slide.png') }}" alt="" width="56" height="56" loading="lazy">
        </button>
      </div>
    </div>
  </section>

  {{-- Section: Contact --}}
  @include('partials.contact-section')
@endsection

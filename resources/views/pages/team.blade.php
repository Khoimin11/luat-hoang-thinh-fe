@extends('layouts.app')

@section('title', 'Đội ngũ luật sư')

@section('content')
  {{-- Header và footer dùng chung từ layouts.app. --}}

  {{-- Section: Hero --}}
  <x-heroes.hero-page-2
    title="Đội ngũ luật sư"
    heading-id="team-title"
    :breadcrumbs="[
      ['label' => 'Trang chủ', 'url' => route('home')],
      ['label' => 'Đội ngũ luật sư'],
    ]"
  />

  {{-- Section: IntroductionAndFilters --}}
  <section class="team-intro-section" aria-label="Giới thiệu và phân loại đội ngũ luật sư">
    <div class="team-intro-container">
      <div class="team-intro-copy">
        <p class="team-intro-description">Đội ngũ luật sư tại Hoàng Thịnh Luật là những chuyên gia pháp lý giàu kinh nghiệm, được đào tạo bài bản, luôn tận tâm và đặt lợi ích của khách hàng lên hàng đầu.</p>
        <p class="team-intro-note">Tên, chức danh và kinh nghiệm dưới đây là nội dung minh họa theo ảnh tham chiếu; chân dung sử dụng từ thiết kế hiện có.</p>
      </div>

      {{-- Section: TeamFilters — chỉ giao diện, chưa có chức năng lọc. --}}
      <div class="team-filters" role="group" aria-label="Phân loại đội ngũ">
        @foreach (['Tất cả', 'Luật sư điều hành', 'Luật sư thành viên', 'Chuyên viên pháp lý'] as $filter)
          <button class="team-filter {{ $loop->first ? 'is-active' : '' }}" type="button" aria-pressed="{{ $loop->first ? 'true' : 'false' }}" disabled>{{ $filter }}</button>
        @endforeach
      </div>
    </div>
  </section>

  @php
    $profiles = json_decode(
      file_get_contents(resource_path('data/team-profiles.json')),
      true,
      512,
      JSON_THROW_ON_ERROR
    );
  @endphp

  {{-- Section: LawyerList --}}
  <section class="team-list-section" aria-label="Danh sách luật sư">
    <div class="team-list-grid">
      @foreach ($profiles as $profile)
        <x-cards.profile-card
          :photo="asset('assets/images/'.$profile['photo'])"
          :role="$profile['role']"
          :name="$profile['name']"
          :experience="$profile['experience'] ?? null"
          :specialties="$profile['specialties'] ?? null"
          :social-links="$profile['socialLinks'] ?? []"
          class="team-list-card"
        />
      @endforeach
    </div>
  </section>
@endsection

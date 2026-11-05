@extends('layouts.app')

@section('title', 'Lĩnh vực hoạt động')

@section('content')
  {{-- Section: PageHero --}}
  <x-heroes.hero-page-1
    class="practice-areas-hero"
    title="Lĩnh vực hoạt động"
    :image="asset('assets/images/hero-img-practice-areas.png')"
  />

  {{-- Section: PracticeAreas --}}
  <section class="practice-areas-section" aria-label="Các lĩnh vực tư vấn và dịch vụ pháp lý">
    <p class="practice-areas-intro">Khám phá {{ $practiceAreas->count() }} lĩnh vực tư vấn và dịch vụ pháp lý của Hoàng Thịnh Luật dành cho cá nhân và doanh nghiệp.</p>
    <div class="practice-areas-grid">
      @foreach ($practiceAreas as $area)
        <x-cards.practice-area-card
          :href="route('practice-areas.show', $area['slug'])"
          :image="asset('assets/images/'.$area['image'])"
          :icon="asset('assets/icons/'.$area['icon'])"
          :title="$area['title']"
          :description="$area['description']"
        />
      @endforeach
    </div>
  </section>

  {{-- Section: Contact --}}
  @include('partials.contact-section')
@endsection

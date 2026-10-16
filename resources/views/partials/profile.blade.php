{{-- Section: Profile --}}
{{-- Dữ liệu: $photo (URL ảnh), $role, $name; $class là class bố cục tùy chọn. --}}
<article @class(['profile', $class ?? ''])>
  <div class="profile-photo">
    <img src="{{ $photo }}" alt="{{ $name }}" loading="lazy">
  </div>
  <div class="profile-caption">
    <p>{{ $role }}</p>
    <h3>{{ $name }}</h3>
  </div>
</article>

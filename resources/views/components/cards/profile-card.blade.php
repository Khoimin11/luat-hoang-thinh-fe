@props([
  'photo',
  'role',
  'name',
  'experience' => null,
  'specialties' => null,
  'socialLinks' => [],
])

{{-- Section: ProfileCard --}}
<article {{ $attributes->class(['profile']) }} tabindex="0" aria-label="{{ $name }}">
  <div class="profile-photo">
    <img src="{{ $photo }}" alt="{{ $name }}" loading="lazy">
  </div>
  <div class="profile-caption">
    <div class="profile-summary">
      <p>{{ $role }}</p>
      <h3>{{ $name }}</h3>
    </div>
    <div class="profile-extra">
      <ul class="profile-details">
        @foreach (array_filter([$experience ?? null, $specialties ?? null]) as $detail)
          <li><img src="{{ asset('assets/icons/check-badge.png') }}" alt="" width="14" height="14" loading="lazy"><span>{{ $detail }}</span></li>
        @endforeach
      </ul>
      <div class="profile-socials" aria-label="Mạng xã hội">
        @foreach ([
          ['key' => 'facebook', 'label' => 'Facebook', 'icon' => 'fb-profile-icon.png'],
          ['key' => 'linkedin', 'label' => 'LinkedIn', 'icon' => 'linkedin-profile-icon.png'],
          ['key' => 'instagram', 'label' => 'Instagram', 'icon' => 'insta-profile-icon.png'],
        ] as $social)
          @if (!empty($socialLinks[$social['key']]))
            <a href="{{ $socialLinks[$social['key']] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $social['label'] }} của {{ $name }} (mở tab mới)"><img src="{{ asset('assets/icons/'.$social['icon']) }}" alt="" width="24" height="24" loading="lazy"></a>
          @else
            <span><img src="{{ asset('assets/icons/'.$social['icon']) }}" alt="{{ $social['label'] }}" width="24" height="24" loading="lazy"></span>
          @endif
        @endforeach
      </div>
    </div>
  </div>
</article>

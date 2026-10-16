@props(['currentPage' => 1, 'lastPage' => 1, 'pageUrls' => []])

@php
  $lastPage = max(1, (int) $lastPage);
  $currentPage = max(1, min($lastPage, (int) $currentPage));
  $numbers = $lastPage <= 7
    ? range(1, $lastPage)
    : array_values(array_unique(array_filter([
        1, 2, 3, $currentPage - 1, $currentPage, $currentPage + 1,
        $lastPage - 2, $lastPage - 1, $lastPage,
      ], fn ($page) => $page >= 1 && $page <= $lastPage)));
  sort($numbers);
  $items = [];
  $previous = 0;
  foreach ($numbers as $number) {
    if ($previous && $number - $previous > 1) $items[] = null;
    $items[] = $number;
    $previous = $number;
  }
@endphp

@if ($lastPage > 1)
  <nav {{ $attributes->class(['pagination']) }} aria-label="Phân trang bài viết">
    @if ($currentPage > 1 && !empty($pageUrls[$currentPage - 1]))
      <a class="pagination-item pagination-arrow" href="{{ $pageUrls[$currentPage - 1] }}" rel="prev" aria-label="Trang trước">‹</a>
    @else
      <button class="pagination-item pagination-arrow" type="button" disabled aria-label="Trang trước">‹</button>
    @endif

    @foreach ($items as $page)
      @if ($page === null)
        <span class="pagination-item pagination-ellipsis" aria-hidden="true">...</span>
      @elseif ($page === $currentPage)
        <span class="pagination-item is-current" aria-current="page" aria-label="Trang {{ $page }}">{{ $page }}</span>
      @elseif (!empty($pageUrls[$page]))
        <a class="pagination-item" href="{{ $pageUrls[$page] }}" aria-label="Trang {{ $page }}">{{ $page }}</a>
      @else
        <button class="pagination-item" type="button" disabled aria-label="Trang {{ $page }}">{{ $page }}</button>
      @endif
    @endforeach

    @if ($currentPage < $lastPage && !empty($pageUrls[$currentPage + 1]))
      <a class="pagination-item pagination-arrow" href="{{ $pageUrls[$currentPage + 1] }}" rel="next" aria-label="Trang sau">›</a>
    @else
      <button class="pagination-item pagination-arrow pagination-next" type="button" disabled aria-label="Trang sau">›</button>
    @endif
  </nav>
@endif

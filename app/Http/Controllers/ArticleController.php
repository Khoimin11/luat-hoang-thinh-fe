<?php

namespace App\Http\Controllers;

use DOMDocument;
use DOMElement;
use DOMXPath;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function show(): View
    {
        return view('pages.article-detail', [
            'prepareContent' => $this->prepareContent(...),
        ]);
    }

    private function prepareContent(string $html): array
    {
        $document = new DOMDocument;
        $previous = libxml_use_internal_errors(true);

        try {
            $document->loadHTML('<meta charset="utf-8"><body>'.$html.'</body>', LIBXML_HTML_NODEFDTD);
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($previous);
        }

        $xpath = new DOMXPath($document);
        $usedIds = [];
        $toc = [];

        foreach ($xpath->query('//*[@id and not(self::h2 or self::h3)]') as $element) {
            if ($element instanceof DOMElement) {
                $usedIds[$element->getAttribute('id')] = true;
            }
        }

        foreach ($xpath->query('//body//h2 | //body//h3') as $heading) {
            if (! $heading instanceof DOMElement) {
                continue;
            }

            $title = trim(preg_replace('/\s+/u', ' ', $heading->textContent));
            if ($title === '') {
                continue;
            }

            $base = $heading->getAttribute('id') ?: (Str::slug($title) ?: 'muc');
            $id = $base;
            for ($suffix = 2; isset($usedIds[$id]); $suffix++) {
                $id = $base.'-'.$suffix;
            }

            $usedIds[$id] = true;
            $heading->setAttribute('id', $id);
            $item = ['id' => $id, 'title' => $title, 'children' => []];

            if ($heading->tagName === 'h3' && $toc !== []) {
                $toc[array_key_last($toc)]['children'][] = $item;
            } else {
                $toc[] = $item;
            }
        }

        $content = '';
        foreach ($document->getElementsByTagName('body')->item(0)->childNodes as $node) {
            $content .= $document->saveHTML($node);
        }

        return ['content' => $content, 'toc' => $toc];
    }
}

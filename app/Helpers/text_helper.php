<?php

if (!function_exists('highlight')) {
    function highlight(string $text, string $keyword)
    {
        if (!$keyword) {
            return esc($text);
        }

        $safeText = esc($text);

        // Pecah keyword jadi array (spasi)
        $keywords = array_filter(explode(' ', $keyword));

        foreach ($keywords as $word) {
            if (strlen($word) < 2) continue;

            $safeText = preg_replace(
                '/(' . preg_quote($word, '/') . ')/i',
                '<span class="bg-orange-100 text-[#ea7e13] font-bold px-1 rounded">$1</span>',
                $safeText
            );
        }

        return $safeText;
    }
}

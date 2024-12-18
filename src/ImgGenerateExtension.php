<?php
namespace Naim886\Imgenerate;

use Illuminate\Support\Facades\Storage;

class ImgGenerateExtension
{
    /**
     * Generate an image URL and optionally download it.
     *
     * @param string $text
     * @param int $width
     * @param int $height
     * @param string $bgColor
     * @param string $textColor
     * @param int $fontSize
     * @param int $angle
     * @param bool $download
     * @param string $storagePath
     * @return string
     */

    public function imgenerateImage(
        string $text,
        int $width = 450,
        int $height = 300,
        string $bgColor = '1e3a8a',
        string $textColor = 'ffffff',
        int $fontSize = 36,
        int $angle = 0,
        bool $download = false,
        string $storagePath = 'public/images/'
    ): string
    {
        // Generate image URL
        $url = "https://imgenerate.com/generate?width={$width}&height={$height}"
            . "&bg={$bgColor}&text_color={$textColor}&font_size={$fontSize}"
            . "&angle={$angle}&text=" . urlencode($text);

        if ($download) {
            $imageContents = file_get_contents($url);
            $imageName = \Illuminate\Support\Str::slug($text) . '.webp';
            Storage::put($storagePath . $imageName, $imageContents);
            return $storagePath . $imageName;
        }

        return $url;
    }
}

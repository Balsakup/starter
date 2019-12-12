<?php

namespace DynamicPages\Models\Blockables;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class TextImage extends Blockable implements HasMedia
{
    use HasMediaTrait;
    /**
     * @var string
     */
    protected $table = 'dynamic_page_block_text_image';
    /**
     * @var array
     */
    protected $fillable = ['content'];

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('text_images')
            ->acceptsMimeTypes(['image/jpeg', 'image/png'])
            ->singleFile();
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @param \Spatie\MediaLibrary\Models\Media|null $media
     *
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this
            ->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CROP, 40, 40)
            ->keepOriginalImageFormat();
    }
}
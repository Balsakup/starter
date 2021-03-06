<?php

namespace App\Services\News;

use App\Models\NewsCategory;
use App\Services\Service;
use Okipa\LaravelTable\Table;

class CategoriesService extends Service implements CategoriesServiceInterface
{
    /**
     * Configure the model table list.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function table(): Table
    {
        $table = (new Table)->model(NewsCategory::class)->routes([
            'index'   => ['name' => 'news.categories'],
            'create'  => ['name' => 'news.category.create'],
            'edit'    => ['name' => 'news.category.edit'],
            'destroy' => ['name' => 'news.category.destroy'],
        ])->destroyConfirmationHtmlAttributes(function (NewsCategory $category) {
            return [
                'data-confirm' => __('notifications.message.crud.parent.destroyConfirm', [
                    'parent' => __('entities.news'),
                    'entity' => __('entities.categories'),
                    'name'   => $category->name,
                ]),
            ];
        });
        $table->column('name')->stringLimit(30)->sortable()->searchable();

        return $table;
    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\ArticlesIndexRequest;
use App\Models\NewsArticle;
use App\Services\Seo\SeoService;
use Artesaos\SEOTools\Facades\SEOTools;

class NewsArticlesController extends Controller
{
    /**
     * @param \App\Http\Requests\News\ArticlesIndexRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(ArticlesIndexRequest $request)
    {
        SEOTools::setTitle(__('admin.title.parent.index', [
            'parent' => __('entities.news'),
            'entity' => __('entities.articles'),
        ]));
        $query = (new NewsArticle)->with(['media', 'categories'])
            ->where('active', true)
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc');
        if ($request->category_id) {
            $query->whereHas('categories', function ($category) use ($request) {
                $category->where('id', $request->category_id);
            });
        }
        $articles = $query->paginate(6)->appends($request->only('category_id'));
        $css = mix('/css/news/index.css');

        return view('templates.front.news.index', compact('articles', 'css'));
    }

    /**
     * @param string $url
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function show(string $url)
    {
        /** @var \App\Models\NewsArticle $article */
        $article = (new NewsArticle)->with(['media', 'categories'])
            ->where('url', $url)
            ->where('active', true)
            ->where('published_at', '<=', now())
            ->firstOrFail();
        (new SeoService)->displayMetaTagsFromModel($article);
        $css = mix('/css/news/show.css');

        return view('templates.front.news.show', compact('article', 'css'));
    }
}

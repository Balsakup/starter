@extends('layouts.admin.full')

@section('template')
    <h1>
        <i class="fas fa-file-alt fa-fw"></i>
        @if ($dynamicPageBlock)
            @lang('admin.title.orphan.edit', ['entity' => __('dynamic-pages.entities.dynamicPageBlocks'), 'detail' => __(config('dynamic-pages.blocks.paragraph_image.name')) ])
        @else
            @lang('admin.title.orphan.create', ['entity' => __('dynamic-pages.entities.dynamicPageBlocks') ])
        @endif
    </h1>
    <hr>
   <div class="card">
       <div class="card-header">
           <h2 class="m-0">
               @lang('admin.section.data')
           </h2>
       </div>
       <div class="card-body">
           <form action="{{ $dynamicPageBlock ?
                            route('dynamicPageBlock.paragraph_image.update', [ $dynamicPage, $dynamicPageBlock, 'blockId' => request()->query('blockId') ]) :
                            route('dynamicPageBlock.paragraph_image.store', [ $dynamicPage, 'blockId' => request()->query('blockId') ]) }}"
                 method="POST"
                 enctype="multipart/form-data">
               @csrf

               @if ($dynamicPageBlock)
                   @method('PUT')
               @endif

               @include('components.common.form.notice')

               {{ bsFile()
                    ->name('image')
                   ->label('dynamic-pages.validation.attributes.paragraph_image.image')
                    ->containerHtmlAttributes(['required'])
                    ->legend((new \App\Models\NewsArticle)->constraintsLegend('illustration'))  }}

               {{ bsTextarea()
                   ->name('content')
                   ->model($dynamicPageBlock ? $dynamicPageBlock->blockable : null)
                   ->label('dynamic-pages.validation.attributes.paragraph_image.content')
                   ->containerHtmlAttributes([ 'required' ]) }}

               <div class="d-flex pt-4">
                   {{ bsCancel()->route('dynamicPage.edit', compact('dynamicPage'))->containerClasses(['mr-2']) }}

                   @if ($dynamicPageBlock)
                       {{ bsUpdate() }}
                   @else
                       {{ bsCreate() }}
                   @endif
               </div>
           </form>
       </div>
   </div>
@endsection

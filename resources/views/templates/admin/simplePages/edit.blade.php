@extends('layouts.admin.full')
@section('template')
    <h1>
        <i class="fas fa-fw fa-file-alt"></i>
        @if($simplePage)
            @lang('admin.title.orphan.edit', ['entity' => __('entities.simplePages'), 'detail' => $simplePage->title])
        @else
            @lang('admin.title.orphan.create', ['entity' => __('entities.simplePages')])
        @endif
    </h1>
    <hr>
    <form action="{{ $simplePage ? route('simplePage.update', ['id' => $simplePage->id]) : route('simplePage.store') }}"
          method="POST">
        @csrf
        @if($simplePage)
            @method('PUT')
        @endif()
        @include('components.common.form.notice')
        {{-- Title --}}
        <div class="card">
            <div class="card-header">
                <h2 class="m-0">
                    @lang('admin.section.data')
                </h2>
            </div>
            <div class="card-body">
                <h3>@lang('admin.section.page')</h3>
                {{ bsText()->name('title')->model($simplePage)->containerHtmlAttributes(['required']) }}
                @if(! $simplePage)
                    {{ bsText()->name('slug')
                        ->model($simplePage)
                        ->prepend('<i class="fas fa-fw fa-key"></i>')
                        ->componentClasses(['slugify'])
                        ->componentHtmlAttributes(['data-target' => '#text-title'])
                        ->containerHtmlAttributes(['required'])}}
                @endif
                {{ bsText()->name('url')
                    ->model($simplePage)
                    ->prepend(route('simplePage.show', ['']) . '/')
                    ->componentClasses(['slugify'])
                    ->componentHtmlAttributes(['data-target' => '#text-title'])
                    ->containerHtmlAttributes(['required']) }}
                {{ bsTextarea()->name('description')->model($simplePage)->prepend(false)->componentClasses(['editor']) }}
                <h3 class="pt-4">@lang('admin.section.publication')</h3>
                {{ bsToggle()->name('active')->model($simplePage) }}
                <div class="d-flex pt-4">
                    {{ bsCancel()->route('simplePages')->containerClasses(['mr-3']) }}
                    @if($simplePage){{ bsUpdate() }}@else{{ bsCreate() }}@endif
                </div>
            </div>
        </div>
    </form>
@endsection

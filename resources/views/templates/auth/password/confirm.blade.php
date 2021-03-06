@extends('layouts.admin.auth')
@section('content')
    @include('components.common.language.selector', [
        'containerClasses'    => 'text-right',
        'dropdownClass'     => 'dropdown-menu-right',
        'labelClass'        => ['btn', 'btn-link']
    ])
    @if($icon = $settings->getFirstMedia('icon'))
        <div class="mx-auto mb-4">
            {{ $icon('auth') }}
        </div>
    @endif
    <h1 class="h3 mb-3 font-weight-normal">
        <i class="fas fa-shield-alt fa-fw"></i>
        @lang('auth.title.confirmPassword')
    </h1>
    <form method="POST" class="w-100" action="{{ route('password.reconfirm') }}">
        @csrf
        @include('components.common.form.notice')
        <p>@lang('auth.label.confirmPasswordNotice')</p>
        {{ bsPassword()->name('password')->containerHtmlAttributes(['required']) }}
        {{ bsValidate()->label(__('auth.label.confirmPassword'))
            ->componentClasses(['btn', 'btn-block', 'btn-primary', 'load-on-click']) }}
        <div class="form-group d-block">
            <a href="{{ route('password.request') }}">
                @lang('auth.label.forgottenPassword')
            </a>
        </div>
    </form>
    {{ bsCancel() }}
@endsection

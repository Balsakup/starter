@extends('layouts.admin.full')
@section('template')
    <h1>
        <i class="fas fa-users fa-fw"></i>
        @lang('admin.title.orphan.index', ['entity' => __('entities.users')])
    </h1>
    <hr>
    <div class="card">
        <div class="card-header">
            <h2 class="m-0">
                @lang('admin.section.list')
            </h2>
        </div>
        <div class="card-body">
            {{ $table }}
        </div>
    </div>
@endsection

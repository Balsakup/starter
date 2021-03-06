<footer id="footer" class="bg-light py-3">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <span class="text-muted">
                <i class="fas fa-copyright fa-fw"></i>
                {{ config('app.name') }}
            </span>
            @if($termsOfService)
                <a class="text-body"
                   href="{{ route('simplePage.show', $termsOfService->url) }}"
                   title="{{ $termsOfService->title }}">
                    {{ $termsOfService->title }}
                </a>
            @endif
            @if($rgpd)
                <a class="text-body"
                   href="{{ route('simplePage.show', $rgpd->url) }}"
                   title="{{ $rgpd->title }}">
                    {{ $rgpd->title }}
                </a>
            @endif
            <div>
                @if($settings->facebook)
                    <a class="new-window" href="{{ $settings->facebook }}" title="Facebook">
                        <i class="fab fa-facebook fa-fw"></i>
                    </a>
                @endif
                @if($settings->twitter)
                    <a class="new-window" href="{{ $settings->twitter }}" title="Twitter">
                        <i class="fab fa-twitter fa-fw"></i>
                    </a>
                @endif
                @if($settings->instagram)
                    <a class="new-window" href="{{ $settings->instagram }}" title="Instagram">
                        <i class="fab fa-instagram fa-fw"></i>
                    </a>
                @endif
                @if($settings->youtube)
                    <a class="new-window" href="{{ $settings->youtube }}" title="Youtube">
                        <i class="fab fa-youtube fa-fw"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>
</footer>

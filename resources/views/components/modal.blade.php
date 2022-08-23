@props(['formAction' => false])

<div class="modal {{ $class }}}" tabindex="-1">
    @if ($formAction)
        <form wire:submit.prevent="{{ $formAction }}">
    @endif
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                @if (isset($title))
                    <h5 class="modal-title">{{ $title }}</h5>
                @endif

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ $content }}</p>
            </div>
            <div class="modal-footer">
                {{ $buttons }}
            </div>
            @if ($formAction)
                </form>
            @endif
        </div>
    </div>
</div>

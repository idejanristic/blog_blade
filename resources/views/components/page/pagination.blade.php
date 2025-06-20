@props(['model'])

<ul class="pager">
    @if($model->onFirstPage())
        <li class="prev pull-left disabled:">
            <span class="page-link">&larr; Newer Posts</span>
        </li>
    @else
        <li class="prev pull-left">
            <a href="{{ $model->previousPageUrl() }}">&larr; Newer Posts </a>
        </li>
    @endif

    @if($model->hasMorePages())
        <li class="next pull-right">
            <a href="{{ $model->nextPageUrl() }}"> Older Posts &rarr;</a>
        </li>
    @else
        <li class="next pull-right disabled:">
            <span class="page-link">Older Posts &rarr;</span>
        </li>

    @endif
</ul>
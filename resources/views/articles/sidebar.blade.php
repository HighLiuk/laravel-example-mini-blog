<div class="card">
    <div class="card-header">Search by keyword</div>

    <div class="card-body">
        <form class="d-flex gap-1" action="{{ route('articles.index') }}" method="GET">
            <input type="text" name="query" placeholder="Enter a keyword here..." value="{{ request('query') }}" />
            <input type="submit" class="btn btn-sm btn-primary" value="Search" />
        </form>
    </div>
</div>

<br />

<div class="card">
    <div class="card-header">Categories</div>

    <div class="card-body">
        <ul>
            @foreach ($all_categories as $category)
            <li>
                <a class="text-decoration-none" href="{{ route('articles.index') }}?category_id={{ $category->id }}">{{
                    $category->name }}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>

<br />

<div class="card">
    <div class="card-header">Tags</div>

    <div class="card-body">
        <ul>
            @foreach ($all_tags as $tag)
            <li>
                <a class="text-decoration-none" href="{{ route('articles.index') }}?tag_id={{ $tag->id }}">{{ $tag->name
                    }}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
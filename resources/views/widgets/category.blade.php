<div class="collection with-header z-depth-1">
    <div class="collection-header"><h5>Categories</h5></div>
    @foreach($categories as $category)
        <a href="#!" class="collection-item waves-effect"><span class="badge" data-badge-caption="">{{ $category->posts_count }}</span>{{ $category->name }}</a>
    @endforeach
</div>
<ul>
    <li>
        <span><i class="material-icons">date_range</i>{{ $post->published_at->diffForHumans() }}</span>
    </li>
    <li>
        <i class="material-icons">person_pin</i>{{ $post->author->name }}
    </li>
    <li>
        <i class="material-icons">folder_open</i>{{ $post->category->name }}
    </li>
    <li>
        <i class="material-icons">remove_red_eye</i>{{ $post->view_count }}
    </li>
</ul>
<!DOCTYPE html>
<html>
    <head>
        <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <ul>
            @foreach ($data as $item)
                <li class="post-item">
                    <div class="title">{{ Str::limit($item->title, 8) }}</div>
                    <div class="author">{{ $item->user->name }}</div>
                    <div class="date">{{ $item->created_at }}</div>
                    <button class="edit-btn">수정</button>
                    <button class="visibility-btn" onclick="setVisibility({{ $item->id }}, 'public')">{{ $item->is_public ? '공개' : '' }}</button>
                    <button class="visibility-btn" onclick="setVisibility({{ $item->id }}, 'private')">{{ !$item->is_public ? '비공개' : '' }}</button>
                </li>
            @endforeach
        </ul>
    </body>
</html>

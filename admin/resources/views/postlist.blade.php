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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5asciRoWLzomZR2l5lpt4yUvsnpjzgv7lzDAG0m" crossorigin="anonymous"></script>


        <script>
            function setVisibility(postId, visibility) {
                // AJAX 호출 수행
                $.ajax({
                    url: '/posts/' + postId + '/visibility',
                    method: 'PUT',
                    data: {
                        'visibility': visibility
                    },
                    success: function(response) {
                        // AJAX 호출이 성공적으로 완료되면 페이지를 새로고침합니다.
                        location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error:', errorThrown);
                    }
                });
            }
        </script>
    </body>
</html>

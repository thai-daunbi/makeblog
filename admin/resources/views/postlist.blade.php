<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css'])
    
    
</head>
    <body>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>User Id</th>
                <th>Page Content</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ Str::limit($item->title, 8) }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ Str::limit($item->body, 10) }}</td>
                    <td>
                        <button class="edit-btn" data-id="{{ $item->id }}">수정</button>
                        <button class="visibility-btn"
                                onclick="setVisibility({{ $item->id }}, 'public')">{{ $item->is_public ? '공개' : '' }}</button>
                        <button class="visibility-btn"
                                onclick="setVisibility({{ $item->id }}, 'private')">{{ !$item->is_public ? '비공개' : '' }}</button>
                    </td>
                </tr>
            @endforeach    
            </tbody>
        </table>

        <!-- jQuery를 먼저 추가하고, 다음에 나머지 스크립트를 추가하세요. -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knul5asciRoWLzomZR2l5lpt4yUvsnpjzgv7lzDAG0m" crossorigin="anonymous"></script>


        <script>
            function setVisibility(postId, visibility) {
                // 버튼 선택자
                const publicButton = $(`.visibility-btn[data-id="${postId}"][data-visibility="public"]`);
                const privateButton = $(`.visibility-btn[data-id="${postId}"][data-visibility="private"]`);

                // AJAX 호출 수행
                $.ajax({
                    url: '/posts/' + postId + '/visibility',
                    method: 'PUT',
                    data: {
                        'visibility': visibility
                    },
                    success: function (response) {
                        // 버튼 텍스트 변경
                        if (visibility === 'public') {
                            publicButton.text('공개');
                            privateButton.text('');
                        } else {
                            privateButton.text('비공개');
                            publicButton.text('');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log('에러:', errorThrown);
                    }
                });
            }


            document.addEventListener('DOMContentLoaded', function () {
                const editButtons = document.querySelectorAll('.edit-btn');

                editButtons.forEach((button) => {
                    button.addEventListener('click', (event) => {
                        event.preventDefault();

                        const postId = event.target.getAttribute('data-id');
                        window.location.href = `/posts/${postId}/edit`;
                    });
                });

                const visibilityButtons = document.querySelectorAll('.visibility-btn');
                visibilityButtons.forEach((button) => {
                    button.addEventListener('click', (event) => {
                    event.preventDefault();

                    const postId = event.target.getAttribute('data-id');
                    const visibility = event.target.innerHTML.trim() == "공개" ? "private" : "public";

                    setVisibility(postId, visibility);
                    });
                });
            });
        </script>

    </body>
</html>

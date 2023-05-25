<!-- 생략: 헤더, 사이드바, 기타 AdminLTE 컴포넌트 -->

<form action="{{ route('user.update') }}" method="post">
    @csrf
    @method('PUT')
    
    <!-- 사용자 정보 (이름, 이메일 등) 입력란을 추가합니다 -->

    <button type="submit" class="btn btn-primary">프로필 수정</button>
</form>
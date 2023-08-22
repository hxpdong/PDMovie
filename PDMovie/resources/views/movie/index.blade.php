@include('/component.header')
<!DOCTYPE html>
<html>
<head>
    <title>List of Movies</title>
    <link rel="stylesheet" href="/css/main.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="main-container">
        {{--
        Ngày mới tốt lành,
        @if(Session::has('inforUser') && Session::get('inforUser')['usname'])
            {{ Session::get('inforUser')['usname'] }}!
            <a href="/logout"><button id="btnLogOut">Logout</button></a>
            <a href="/recommend"><button id="btnRecommend">Gợi ý cho bạn</button></a>
        @else
            Guest!
            <a href="/login"><button id="btnLogIn">Login</button></a>
        @endif
        --}}
        <div id="movie-list" class="grid-container">
        </div>
        <div id="pagination">
            <button id="prev-button" onclick="prevPage()">Trang trước</button>
            <span id="page-buttons"></span>
            <button id="next-button" onclick="nextPage()">Trang kế</button>
        </div>
    </div>
    {{--
    <div class="right-container">
        <h5>Sign up</h5>
        <form action="/api/users/new" method="post" id="SignUpForm">
            <input type="text" name="usname" placeholder='username' required>
            <input type="password" name="uspasswd" placeholder='password' required>
            <input type="email" name="email" placeholder='email'>
            <input type="text" name="fullname" placeholder='fullname'>
            <input type="submit" value="sign up">
        </form>
        <br>
        <iframe src="https://www.youtube.com/embed/4Ql03rTp1bE" frameborder="0" allowfullscreen></iframe>
        
    </div>
    --}}

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>

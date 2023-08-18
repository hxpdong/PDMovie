<!DOCTYPE html>
<html>

<head>
    <title>List of Movies</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <div class="main-container">
        Ngày mới tốt lành,
        @if(Session::has('inforUser') && Session::get('inforUser')['usname'])
        {{ Session::get('inforUser')['usname'] }}!
        <a href="/logout"><button id="btnLogOut">Logout</button></a>
        <a href="/movies"><button id="btnHome">Trang chủ</button></a>
        @else
        Guest!
        <a href="/login"><button id="btnLogIn">Login</button></a>
        @endif
        <br>
        CÓ THỂ BẠN CŨNG THÍCH:
        <div id="movie-list" class="grid-container">
        </div>
    </div>
    <script>
        var accId = <?php echo json_encode(Session::get('inforUser')['acc_id']); ?>;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="/js/main-test-recommend.js"></script>
</body>

</html>
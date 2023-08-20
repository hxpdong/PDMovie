@include('/component.header')
<!DOCTYPE html>
<html>

<head>
    <title>List of Movies</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <div id="bd-mvdetail">
        <div class="mvdetail-container">
            <div id="mvdetail-grid">
                <div class="mvdetail-grid-item">
                    <img id="mvdetail-img" src="">
                </div>
                <div class="mvdetail-grid-item">
                    <div id="mvdetail-title"></div>
                    <div id="mvdetail-directors"></div>
                    <div id="mvdetail-actors"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="/js/detail-movie.js"></script>
</body>

</html>
@include('/component.header')
<!DOCTYPE html>
<html>

<head>
    <title>List of Movies</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <div class="main-container">
        <div class="text-white">
            You might also like:
        </div>
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
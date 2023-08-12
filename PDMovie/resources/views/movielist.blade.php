<!DOCTYPE html>
<html>
<head>
    <title>List of Movies</title>
    <style>
        #main-container {
            width: 75%;
            margin:10px;
        }
        #right-container {
            position: fixed;
            top: 0;
            right: 0;
            width: 20%;
            height: 100%;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        #right-banner img {
            max-width: 100%;
            max-height: 100%;
        }
        /* CSS để định dạng nút trang đang được chọn */
        button.active {
            background-color: #007bff; /* Màu nền của nút trang đang chọn */
            color: white; /* Màu chữ của nút trang đang chọn */
            font-weight: bold; /* Đậm chữ của nút trang đang chọn */
        }
        #movie-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            grid-gap: 20px;
            list-style: none;
            padding: 0;
        }
        .grid-item {
            border: 1px solid #ddd;
            padding: 10px;
        }
            /* CSS để điều chỉnh kích thước hình ảnh */
        .movie-item img {
            object-fit:cover;
        }
        .text-ellipsis {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .tooltip {
            position: absolute;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 5px;
            z-index: 1; /* Đảm bảo tooltip nằm trên các phần khác */
            visibility: hidden; /* Ẩn tooltip ban đầu */
            opacity: 0; /* Ẩn tooltip ban đầu */
            transition: opacity 0.3s, visibility 0.3s; /* Hiệu ứng khi hiện/ẩn tooltip */
        }
        .grid-item:hover .tooltip {
            visibility: visible; /* Hiển thị tooltip khi hover lên .grid-item */
            opacity: 1; /* Hiển thị tooltip khi hover lên .grid-item */
        }
    </style>
</head>
<body>
<div id="main-container">
    <div id="movie-list" class="grid-container">
    </div>
</div>
<div id="right-container">
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
    <h5>get URL to store</h5>
    <input type="text" id="imageurl" name="imageurl" placeholder='URL here' >
    <button type=submit onclick="changeUrl()">Change</button>
    <div id="url_storage_here"></div>
</div>
<div id="pagination">
    <button id="prev-button" onclick="prevPage()">Previous</button>
    <div id="page-buttons"></div>
    <button id="next-button" onclick="nextPage()">Next</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    var currentPage = 1;
    var defaultImageUrl = '/img/banner.png';
    
    document.addEventListener("DOMContentLoaded", function () {
        var initialPage = getPageFromURL();
        getMovies(initialPage);
        // Lấy tất cả các .grid-item
        var form = document.getElementById("SignUpForm");
        form.addEventListener("submit", function (event) {
            event.preventDefault(); // Ngăn form submit theo cách thông thường

                // Gửi request POST bằng AJAX hoặc Fetch API
            fetch(form.action, {
                method: "POST",
                body: new FormData(form),
            })
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                if (data.success === true) {
                        // Thực hiện hành động nếu success là true (VD: điều hướng hoặc hiển thị thông báo)
                    $newuser = data.newuser;
                    alert("Post successful!\n" + $newuser.usname);
                    //getMovies(getPageFromURL());
                } else {
                        // Xử lý trường hợp không thành công (VD: hiển thị thông báo lỗi)
                    alert("Post failed. Please try again.");
                }
            })
            .catch(function (error) {
                    // Xử lý lỗi kết nối hoặc lỗi từ server
                alert("An error occurred. Please try again later.");
            });
        });
    });

    function addTooltip(){
        var gridItems = document.querySelectorAll('.grid-item');
        
        // Lặp qua từng .grid-item để thêm sự kiện hover
        gridItems.forEach(function (gridItem) {
            var tooltip = document.createElement('div');
            tooltip.className = 'tooltip';
            
            // Lấy thông tin bộ phim từ các phần tử con của .grid-item
            var title = gridItem.querySelector('h3').textContent;
            
            // Hiển thị thông tin trong tooltip
            tooltip.innerHTML = '<h3>' + title + '</h3>' ;
            
            // Thêm tooltip vào .grid-item
            gridItem.appendChild(tooltip);
        });
    }

    // Xóa tất cả các phần tử con trong danh sách phim
    function removeAllMovieItems() {
        var movieList = document.getElementById("movie-list");
        while (movieList.firstChild) {
            movieList.removeChild(movieList.firstChild);
        }
    }

    function getMovies(page) {
        
        axios.get('/api/movies?page=' + page)
            .then(function (response) {
                removeAllMovieItems();
                var movieList = document.getElementById("movie-list");
                var movies = response.data.movies;

                // Lặp qua danh sách phim và tạo các thẻ <li> để hiển thị thông tin về mỗi bộ phim
                movies.forEach(function (movie) {
                    var movieItem = document.createElement("div");
                    movieItem.className = "grid-item";

                    // Tạo thẻ <img> để hiển thị hình ảnh phim
                    var image = document.createElement("img");
                    image.alt = movie.title_vi;
                    image.style.width = '100%';
                    image.style.objectFit = "cover";
                    if(movie.posterURL != null ){
                        image.src = movie.posterURL;
                    }
                    else image.src = defaultImageUrl;
                    movieItem.insertAdjacentElement('afterbegin', image);
                    
                    
                    // Tạo thẻ <h3> để hiển thị tiêu đề phim
                    var title = document.createElement("h3");
                    title.textContent = movie.title_vi + " (" + movie.title_en + ")";
                    title.className = "text-ellipsis";
                    movieItem.appendChild(title);

                    // Tạo thẻ <p> để hiển thị đạo diễn
                    var director = document.createElement("p");
                    director.textContent = "Director: " + movie.director;
                    director.className = "text-ellipsis";
                    movieItem.appendChild(director);

                    // Tạo thẻ <p> để hiển thị danh sách diễn viên
                    var actors = document.createElement("p");
                    actors.textContent = "Actors: " + movie.actors;
                    actors.className = "text-ellipsis";
                    movieItem.appendChild(actors);

                    // Thêm thông tin về bộ phim vào danh sách
                    movieList.appendChild(movieItem);

                });
                addTooltip();
                // Cập nhật trạng thái của nút Previous và Next
                var prevButton = document.getElementById("prev-button");
                var nextButton = document.getElementById("next-button");
                prevButton.disabled = response.data.current_page === 1;
                nextButton.disabled = response.data.current_page === response.data.last_page;
                var pageButtons = document.getElementById("page-buttons");
                pageButtons.innerHTML = generatePageButtons(response.data.current_page, response.data.last_page);
                // Lưu trạng thái trang hiện tại
                currentPage = response.data.current_page;
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    function prevPage() {
        if (currentPage > 1) {
            getMovies(currentPage - 1);
            updatePageURL(currentPage - 1);
        }
    }

    function nextPage() {
        getMovies(currentPage + 1);
        updatePageURL(currentPage + 1);
    }

    function generatePageButtons(currentPage, lastPage) {
        var pageButtons = '';
        for (var i = 1; i <= lastPage; i++) {
            if (i === currentPage) {
                // Nếu đây là trang hiện tại, thì không thêm sự kiện onclick
                pageButtons += '<button class="active">' + i + '</button>';
            } else {
                // Nếu không, thêm sự kiện onclick
                pageButtons += '<button onclick="gotoPage(' + i + ')">' + i + '</button>';
            }
        }
        return pageButtons;
    }

    function gotoPage(page) {
        getMovies(page);
        updatePageURL(page);
    }

    function updatePageURL(page) {
        var newURL = window.location.origin + window.location.pathname + '?page=' + page;
        window.history.pushState({page: page}, "Page " + page, newURL);
    }
    function getPageFromURL() {
        var urlParams = new URLSearchParams(window.location.search);
        return parseInt(urlParams.get('page')) || 1;
    }

    function getDriveFileId(url) {
        const match = url.match(/\/file\/d\/([a-zA-Z0-9_-]+)\//);
        if (match && match[1]) {
            return match[1];
        } else {
            console.error("Invalid Google Drive URL");
            return null;
        }
    }

    /*
    const driveUrl = "https://drive.google.com/file/d/1Su46sVT_-n_87Hjz1KQls6KlAULNUrm3/view?usp=drive_link";
    const fileId = getDriveFileId(driveUrl);
    const fileURL = "https://drive.google.com/uc?id=" + fileId;
    console.log("File ID:", fileId, "\n", "File URL: ", fileURL);
    */

    function changeUrl(){
        const urlimg = document.getElementById("imageurl").value;
        const newurl = getDriveFileId(urlimg);
        const fileURL = "https://drive.google.com/uc?id=" + newurl;
        document.getElementById("url_storage_here").innerHTML = fileURL;
    }
</script>
</body>
</html>

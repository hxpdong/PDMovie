const defaultImageUrl = '/img/banner.png';
document.addEventListener("DOMContentLoaded", function () {
    var movieId = getMovieIdFromURL();
    loadMovieDetail(movieId);
});

function loadMovieDetail(movieId) {
    axios.get('/api/movies/' + movieId)
        .then(function (response) {
            var moviedt = response.data.movie_detail;
            console.log("đã load");
            updateMovieDetail(moviedt);
        })
        .catch(function (error) {
            console.log(error);
        });
}

function updateMovieDetail(movieDetail) {
    var titleElement = document.getElementById("mvdetail-title");
    var directorElement = document.getElementById("mvdetail-directors");
    var actorsElement = document.getElementById("mvdetail-actors");
    var posterElement = document.getElementById("mvdetail-img");

    movieDetail.forEach(function (movie) {
        titleElement.innerHTML = movie.title_vi;
        directorElement.innerHTML = "Đạo diễn: " + movie.director;
        actorsElement.innerHTML = "Diễn viên: " + movie.actors;
        if (movie.posterURL != null)
            posterElement.src = movie.posterURL;
        else posterElement.src = defaultImageUrl;
    });
    console.log("đã update");
}

function getMovieIdFromURL() {
    // Lấy đường dẫn hiện tại trong trình duyệt
    var currentURL = window.location.href;
    // Tách đường dẫn thành các phần
    var segments = currentURL.split('/');
    // Lấy phần cuối cùng của đường dẫn, đó chính là số bạn cần
    var lastSegment = segments[segments.length - 1];
    // Chuyển đổi phần cuối thành số hoặc trả về 0 nếu không phải số
    return parseInt(lastSegment) || 0;
}

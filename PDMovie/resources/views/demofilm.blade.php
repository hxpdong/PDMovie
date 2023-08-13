<!DOCTYPE html>
<html>

<head>
    <title>Video từ Google Drive</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/css/demofilm.css">
</head>

<body>
    <h1>Video từ Vimeo</h1>
    <div class="responsive-container">
        <iframe class="responsive-iframe" src="https://player.vimeo.com/video/854102726" frameborder="0"
            allowfullscreen></iframe>
    </div>
    <br><br>
    <div class="star-rating">
        <input type="radio" name="rating" id="star5" value="5" />
        <label for="star5" title="Rất tốt"></label>
        <input type="radio" name="rating" id="star4half" value="4.5" />
        <label class="half" for="star4half" title="Tốt"></label>
        <input type="radio" name="rating" id="star4" value="4" />
        <label for="star4" title="Tốt"></label>
        <input type="radio" name="rating" id="star3half" value="3.5" />
        <label class="half" for="star3half" title="Bình thường"></label>
        <input type="radio" name="rating" id="star3" value="3" />
        <label for="star3" title="Bình thường"></label>
        <input type="radio" name="rating" id="star2half" value="2.5" />
        <label class="half" for="star2half" title="Tệ"></label>
        <input type="radio" name="rating" id="star2" value="2" />
        <label for="star2" title="Tệ"></label>
        <input type="radio" name="rating" id="star1half" value="1.5" />
        <label class="half" for="star1half" title="Rất tệ"></label>
        <input type="radio" name="rating" id="star1" value="1" />
        <label for="star1" title="Rất tệ"></label>
        <input type="radio" name="rating" id="starhalf" value="0.5" />
        <label class="half" for="starhalf" title="Rất tệ"></label>
    </div>
    <div id="starpoint"></div>
    <h5>get URL to store</h5>
    <input type="text" id="imageurl" name="imageurl" placeholder='URL here'>
    <button type=submit onclick="changeVimeoUrl()">Change</button>
    <div id="url_storage_here"></div>
    <script src="/js/demofilm.js"></script>
</body>

</html>
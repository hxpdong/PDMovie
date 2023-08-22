@include('/component.header')
<!DOCTYPE html>
<html>

<head>
    <title>List of Movies</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/css/demofilm.css">
</head>

<body>
    {{--
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
    --}}
    <div class="flex flex-col justify-center">
        <div id="mvdetail-grid">
            <!--FILMDETAIL-->
            <div class="py-3 sm:mx-auto mvdetail-grid-item">
                <div class="bg-white shadow-lg border-gray-100 border rounded-3xl p-8 flex space-x-8">
                    <div class="overflow-visible w-1/2">
                        <img class="rounded-3xl shadow-lg" id="mvdetail-img" src="">
                        <button
                            class="m-2 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                            Xem phim
                        </button>
                    </div>
                    <div class="flex flex-col w-1/2 space-y-4">
                        <div>
                            <span class="text-sm text-gray-400">Số lượt đánh giá: </span><span
                                class="text-sm text-gray-400" id="mvdetail-numrating"></span>
                        </div>
                        <div class="flex justify-between items-start">
                            <div class="text-3xl font-bold" id="mvdetail-title"></div>
                            <div class="bg-yellow-400 font-bold rounded-xl p-2"><span id="mvdetail-rating"></span>/5.0
                            </div>
                        </div>
                        <div>
                            <div class="text-1xl font-bold" id="mvdetail-title-en"></div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-400">Đạo diễn:</div>
                            <div class="text-lg text-gray-800" id="mvdetail-directors"></div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-400">Diễn viên:</div>
                            <div class="text-lg text-gray-800" id="mvdetail-actors"></div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-400">Nội dung:</div>
                            <div class=" text-gray-800 text-justify" id="mvdetail-content">
                                </divp>
                            </div>

                            <div class="flex text-2xl font-bold text-a"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--COMMENTS-->
            <div class="py-3 sm:mx-auto mvdetail-grid-item">
                <section class="bg-white shadow-lg border-gray-100 border rounded-3xl p-8 flex space-x-8">
                    <div class="max-w-2xl mx-auto px-4">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Đánh giá (20)</h2>
                        </div>
                        <form class="mb-6">
                            <div class="star-rating">
                                <input type="radio" name="rating" id="star5" value="5" />
                                <label for="star5" title="Rất tốt"></label>
                                <input type="radio" name="rating" id="star4" value="4" />
                                <label for="star4" title="Tốt"></label>
                                <input type="radio" name="rating" id="star3" value="3" />
                                <label for="star3" title="Bình thường"></label>
                                <input type="radio" name="rating" id="star2" value="2" />
                                <label for="star2" title="Tệ"></label>
                                <input type="radio" name="rating" id="star1" value="1" />
                                <label for="star1" title="Rất tệ"></label>
                            </div>
                            <div id="starpoint"></div>
                            <div
                                class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                <label for="comment" class="sr-only">Your comment</label>
                                <textarea id="comment" rows="6"
                                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                    placeholder="Write a comment..." required></textarea>
                            </div>
                            <button type="submit"
                                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-[#66CCFF] rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                Gửi đánh giá
                            </button>
                        </form>
                        <article
                            class="p-6 mb-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <img class="mr-2 w-6 h-6 rounded-full" src="/img/fav.png" alt="Bonnie Green">
                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                        Bonnie Green</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate
                                            datetime="2022-03-12" title="March 12th, 2022">Mar. 12, 2022</time></p>
                                </div>
                                <button id="dropdownComment3Button" data-dropdown-toggle="dropdownComment3"
                                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                    type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                        </path>
                                    </svg>
                                    <span class="sr-only">Comment settings</span>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownComment3"
                                    class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownMenuIconHorizontalButton">
                                        <li>
                                            <a href="#"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                        </li>
                                    </ul>
                                </div>
                            </footer>
                            <p class="text-gray-500 dark:text-gray-400">The article covers the essentials, challenges,
                                myths and stages the UX designer should consider while creating the design strategy.</p>
                        </article>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="/js/detail-movie.js"></script>
    <script src="/js/demofilm.js"></script>
</body>

</html>
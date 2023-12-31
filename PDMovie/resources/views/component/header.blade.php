<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- component -->
<header id="headerLoginInfo">
    <nav class="bg-gray-500 border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="/" class="flex items-center">
                <img src="/img/fav-removebg.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">PDMovie</span>
            </a>
            <input class="w-32 pl-10 pr-4 rounded-md form-input sm:w-64 focus:border-indigo-600" type="text"
                placeholder="Nhập từ khóa...">
            <div class="flex items-center lg:order-2">
                @if(Session::has('inforUser') && Session::get('inforUser')['usname'])
                <a href=""><span id="loginuser">{{ Session::get('inforUser')['usname'] }}</span></a>
                <a href="/logout"
                    class="text-gray-800 bg-white mx-1 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Đăng
                    xuất</a>
                @else
                Guest!
                <button data-modal-toggle="authentication-modal"
                    class="text-gray-800 bg-white mx-1 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Đăng
                    nhập</button>
                <a href="#"
                    class="text-white bg-[#66CCFF] hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Đăng
                    ký</a>
                @endif


                <button data-collapse-toggle="mobile-menu-2" type="button"
                    class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 bg-white rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="/"
                            class="block py-2 pr-4 pl-3 text-white rounded bg-gray-700 lg:bg-transparent lg:text-black lg:p-0 dark:text-white"
                            aria-current="page">Trang chủ</a>
                    </li>
                    <li>
                        <a href="/"
                            class="block py-2 pr-4 pl-3 text-white rounded bg-gray-700 lg:bg-transparent lg:text-black lg:p-0 dark:text-white"
                            aria-current="page">Thể loại</a>
                    </li>
                    @if(Session::has('loginId'))
                    <li>
                        <a href="/recommend"
                            class="block py-2 pr-4 pl-3 text-white rounded bg-gray-700 lg:bg-transparent lg:text-black lg:p-0 dark:text-white"
                            aria-current="page">Đề xuất cho bạn</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Login modal -->
<div id="authentication-modal" aria-hidden="true"
    class="modal fade hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center"
    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="relative w-full max-w-md px-4 h-full md:h-auto">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
            <div class="flex justify-end p-2">
                <button type="button" onclick="closeModalLogin()"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="authentication-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <form id="modalLoginForm" class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8">
                @csrf
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">Đăng nhập</h3>
                <div>
                    <label for="email" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Tên đăng
                        nhập</label>
                    <input type="text" name="mdusname" id="mdusname"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="tên đăng nhập" required="">
                </div>
                <div>
                    <label for="password" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Mật
                        khẩu</label>
                    <input type="password" name="mduspassword" id="mduspassword" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required="">
                </div>
                <div class="flex justify-between">
                    <a href="#" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Quên mật khẩu?</a>
                </div>
                <button type="submit"
                    class="w-full text-white bg-[#66CCFF] hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Đăng nhập</button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    Chưa có tài khoản? <a href="#" class="text-blue-700 hover:underline dark:text-blue-500">Đăng ký</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#modalLoginForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '{{ route('modalLogin') }}',
            data: $(this).serialize(),
            beforeSend: function() {
                Swal.fire({
                    title: 'Đang xử lý...',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    },
                    onClose: () => {
                        Swal.hideLoading();
                    }
                });
            },
            success: function(response) {
                Swal.close();
                if (response.success) {
                    location.reload();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Không thể đăng nhập',
                        text: response.message
                    });
                }
            }
        })
    })
});

function closeModalLogin() {
    $('#authentication-modal').modal('hide');
    $('#mdusname').val('');
    $('#mduspassword').val('');
};
</script>
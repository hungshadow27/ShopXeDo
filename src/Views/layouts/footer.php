    <footer class="w-full border-t border-gray-500">
        <div class="max-w-6xl w-full mx-auto flex items-start justify-between py-7">
            <div class="text-start">
                <h1 class="text-xl font-bold">VỀ<a href="#" class="text-xl font-bold text-rose-500 ml-2">DOXETIENLANG.COM</a></h1>
                <span class="inline-block py-5">Hệ thống mua bán đồ chơi xe uy tín, nhanh gọn, an toàn tuyệt đối.</span>
                <ul>
                    <li class="border-b border-gray-500 w-full py-3">
                        <a href="#" class="transition duration-300 ease-in-out hover:text-rose-500">GIỚI THIỆU</a>
                    </li>
                    <li class="border-b border-gray-500 w-full py-3">
                        <a href="#" class="transition duration-300 ease-in-out hover:text-rose-500">ĐIỀU KHOẢN</a>
                    </li>
                    <li class="border-b border-gray-500 w-full py-3">
                        <a href="#" class="transition duration-300 ease-in-out hover:text-rose-500">UY TÍN CỦA SHOP</a>
                    </li>
                </ul>
            </div>
            <div>
                <h1 class="text-xl font-bold">CHI TIẾT LIÊN HỆ</h1>
                <div class="py-5">
                    <a class="social-item inline-block mr-2 transition duration-300 ease-in-out hover:-translate-y-2 hover:scale-110 hover:text-blue-500" href="#"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                    <a class="social-item inline-block mr-2 transition duration-300 ease-in-out hover:-translate-y-2 hover:scale-110 hover:text-red-500" href="#"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
                </div>
                <ul>
                    <li class="py-3">
                        <a href="#" class="transition duration-300 ease-in-out hover:text-rose-500">Hotline: 0909-009-0009</a>
                    </li>
                    <li class="py-3">
                        <a href="#" class="transition duration-300 ease-in-out hover:text-rose-500">Email: XXX@gmail.com</a>
                    </li>
                    <li class="py-6">
                        <a href="#" class="transition duration-300 ease-in-out hover:text-rose-500">Địa chỉ: 36 Ngân Cầu, Quyết Tiến, Tiên Lãng</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="max-w-6xl mx-auto">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d818.5228181228463!2d106.54870916325842!3d20.73377655619935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a75ed06fd66d1%3A0xc708613a93b88b2b!2zVHLGsOG7nW5nIFRIQ1MgeMOjIFF1eeG6v3QgVGnhur9u!5e1!3m2!1svi!2s!4v1744126986343!5m2!1svi!2s" height="450" class="w-full" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </footer>
    <!-- Toast -->
    <div id="toast-success" class="hidden fixed top-[20%] right-3 items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ms-3 text-sm font-normal" id="toast-success-string">Item moved successfully.</div>
    </div>
    <div id="toast-danger" class="hidden items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
            </svg>
            <span class="sr-only">Error icon</span>
        </div>
        <div class="ms-3 text-sm font-normal" id="toast-fail-string">Item has been deleted.</div>
    </div>
    <script>
        const cartItemsNumber = document.getElementById('cartItemsNumber');
        const showToastSuccess = (string) => {
            const toastSuccess = document.getElementById('toast-success');
            toastSuccess.classList.remove('hidden');
            const toastStr = document.getElementById('toast-success-string');
            toastStr.innerHTML = string;
            toastSuccess.classList.add('flex')
            setTimeout(() => {
                toastSuccess.classList.add('hidden');
                toastSuccess.classList.remove('flex');

            }, 1000);
        }
        const showToastFail = (string) => {
            const toastFail = document.getElementById('toast-danger');
            const toastStr = document.getElementById('toast-fail-string');
            toastStr.innerHTML = string;
            toastFail.classList.remove('hidden');
            toastFail.classList.add('flex')
            setTimeout(() => {
                toastFail.classList.add('hidden');
                toastFail.classList.remove('flex');

            }, 1000);
        }
        const updateCartItemsNumber = (num) => {
            cartItemsNumber.innerText = num;
        }
        const addCart = (e, id) => {
            e.preventDefault();
            var id = id;
            //var quantity = $(".product .quantity")[index].value;
            console.log(id);
            $.ajax({
                url: '<?= ROOT ?>/cart/add',
                type: 'POST',
                data: {
                    id: id,
                    //quantity: quantity
                },
                success: function(response) {
                    // Handle the success response, if needed
                    console.log('Success:', response);
                    updateCartItemsNumber(response);
                    showToastSuccess('Thêm sản phẩm vào giỏ hàng thành công!');
                },
                error: function(error) {
                    // Handle the error, if any
                    console.error('Error:', error);
                    showToastFail('Có lỗi xảy ra!');
                }
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    </body>

    </html>
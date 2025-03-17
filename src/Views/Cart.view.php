<?php require_once "./src/Views/layouts/header.php"; ?>
<main class="max-w-6xl w-full mx-auto min-h-96 mt-8">
    <div class="flex border p-2 border-gray-500 rounded-sm">
        <div class="w-1/3">
            <input type="checkbox" class="mr-2" id="checkbox-all" />Sản phẩm
        </div>
        <div class="w-1/6">Đơn giá</div>
        <div class="w-1/6">Số lượng</div>
        <div class="w-1/6">Số tiền</div>
        <div class="w-1/6">Thao tác</div>
    </div>

    <?php if (!empty($products)) : ?>
        <?php foreach ($products as $product) : ?>
            <div class="flex mt-3 shadow border border-gray-500 rounded-sm p-2 items-center product" data-id="<?= $product->id ?>">
                <div class="w-1/3">
                    <div class="flex items-center">
                        <input type="checkbox" class="mr-2 checkbox" />
                        <img class="w-1/4" src="<?= ROOT ?>/Public/images/<?= unserialize($product->image)[0] ?>" alt="" />
                        <a href="<?= ROOT ?>/product?id=<?= $product->id ?>"
                            class="text-xl font-medium no-underline px-3 hover:text-blue-600">
                            <?= $product->name ?>
                        </a>
                    </div>
                </div>
                <div class="w-1/6"><?= number_format($product->price) ?> ₫</div>
                <div class="w-1/6">
                    <input class="w-1/2 p-1 quantity border rounded text-black"
                        type="number"
                        name="points"
                        step="1"
                        value="<?= $product->quantity ?>"
                        min="1" />
                </div>
                <div class="w-1/6 text-rose-500 price"><?= $product->price ?> ₫</div>
                <div class="w-1/6">
                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="btnDelete block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Xoá
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="text-center p-5">
            <span class="text-blue-500 text-xl">Bạn chưa có sản phẩm nào trong giỏ hàng!</span>
        </div>
    <?php endif; ?>
</main>

<div class="sticky container mx-auto bottom-0 my-3">
    <div class="max-w-6xl w-full mx-auto flex item-center justify-between bg-white p-3 rounded-sm">
        <div class="text-rose-500 text-2xl font-bold">
            Tổng thanh toán (<span id="productChecked">0</span> sản phẩm):
            <span id="total-price">0 ₫</span>
        </div>
        <a onclick="checkout(event)"
            class="bg-rose-500 text-white px-4 py-2 rounded hover:bg-rose-400 cursor-pointer">
            Mua hàng
        </a>
    </div>
</div>

<!-- Modal Accept Delete -->
<div id="popup-modal" tabindex="-1" class="acceptDelete hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Đóng</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Bạn có chắc muốn xoá sản phẩm này?</h3>
                <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Có
                </button>
                <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Huỷ</button>
            </div>
        </div>
    </div>
</div>
<script>
    let checkboxAll = document.getElementById("checkbox-all");
    let checkboxes = document.getElementsByClassName("checkbox");
    let totalPrice = document.getElementById("total-price");
    let price = document.getElementsByClassName("price");
    let btnDelete = document.getElementsByClassName("btnDelete");
    let itemDelete = '';
    let acceptDelete = document.getElementsByClassName("acceptDelete");

    // Delete cart product
    for (let i = 0; i < btnDelete.length; i++) {
        btnDelete[i].addEventListener("click", () => {
            itemDelete = i;
            console.log(itemDelete);
        });
    }
    acceptDelete[0].addEventListener("click", (e) => {
        console.log(btnDelete[itemDelete].parentElement.parentElement);
        deleteCartItem(e);
        btnDelete[itemDelete].parentElement.parentElement.remove();
        btnDelete = document.getElementsByClassName("btnDelete");
        for (let i = 0; i < btnDelete.length; i++) {
            btnDelete[i].addEventListener("click", () => {
                itemDelete = i;
                console.log(itemDelete);
            });
        }
        //updateProducts();
    });

    let productForCheckout;
    // Function to update the total based on the checked checkboxes
    function updateTotal() {
        productForCheckout = [];
        let total = 0;
        let Checked = 0;
        for (let i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                const quantity = parseInt(
                    checkboxes[i].parentElement.parentElement.parentElement.getElementsByClassName("quantity")[0].value
                );
                const price = parseFloat(
                    checkboxes[i].parentElement.parentElement.parentElement.getElementsByClassName("price")[0].innerHTML
                );
                const id = checkboxes[i].parentElement.parentElement.parentElement.getAttribute("data-id");
                console.log(price);
                productForCheckout.push({
                    id: id,
                    quantity: quantity
                });

                total += quantity * price;
                Checked++;
            }
        }
        console.log(productForCheckout);
        totalPrice.innerText = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND'
        }).format(total);
        document.getElementById('productChecked').innerText = Checked;
    }

    const updateProducts = () => {
        checkboxAll = document.getElementById("checkbox-all");
        checkboxes = document.getElementsByClassName("checkbox");
        totalPrice = document.getElementById("total-price");
        price = document.getElementsByClassName("price");
        btnDelete = document.getElementsByClassName("btnDelete");
        itemDelete = '';
        acceptDelete = document.getElementById("acceptDelete");

        // Event listeners for quantity input fields
        const quantityInputs = document.querySelectorAll('.quantity');
        for (let i = 0; i < quantityInputs.length; i++) {
            quantityInputs[i].addEventListener("change", (e) => {
                console.log(i);
                updateTotal();
                updateQuantityCartItem(e, i);
            });
        }
        // Event listeners for individual checkboxes
        for (let i = 0; i < checkboxes.length; i++) {
            checkboxes[i].addEventListener("click", () => {
                updateTotal();
            });
        }
        // Event listener for the "Select All" checkbox
        checkboxAll.addEventListener("click", () => {
            for (let i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = checkboxAll.checked;
            }
            updateTotal();
        });
    };
    updateProducts();

    //Ajax here
    const deleteCartItem = (e) => {
        e.preventDefault();
        var id = $(".product")[itemDelete].dataset.id;
        //var quantity = $(".product .quantity")[itemDelete].value;
        //console.log(quantity);
        $.ajax({
            url: '<?= ROOT ?>/cart/delete',
            type: 'POST',
            data: {
                id: id,
                //quantity: quantity
            },
            success: function(response) {
                // Handle the success response, if needed
                console.log('Success:', response);
                updateCartItemsNumber(response);
                showToastSuccess("Bạn đã xoá sản phẩm thành công!")
            },
            error: function(error) {
                // Handle the error, if any
                console.error('Error:', error);
                showToastFail("Có lỗi xảy ra!")
            }
        });
    }

    const updateQuantityCartItem = (e, index) => {
        e.preventDefault();
        var id = $(".product")[index].dataset.id;
        var quantity = $(".product .quantity")[index].value;
        console.log(quantity);
        $.ajax({
            url: '<?= ROOT ?>/cart/updateQuantity',
            type: 'POST',
            data: {
                id: id,
                quantity: quantity
            },
            success: function(response) {
                // Handle the success response, if needed
                console.log('Success:', response);
                showToastSuccess("Bạn đã cập nhật số lượng sản phẩm thành công!")
            },
            error: function(error) {
                // Handle the error, if any
                console.error('Error:', error);
                showToastFail("Có lỗi xảy ra!")
            }
        });
    }
    const checkout = (e) => {
        e.preventDefault();
        $.ajax({
            url: '<?= ROOT ?>/checkout',
            type: 'POST',
            data: {
                productForCheckout,
            },
            success: function(response) {
                // Handle the success response, if needed
                console.log('Success:', response);
                if (response == '0') {
                    showToastFail("Chưa có sản phẩm nào được chọn!")
                } else {
                    window.location.replace("<?= ROOT ?>/checkout/order");
                }
            },
            error: function(error) {
                // Handle the error, if any
                console.error('Error:', error);
                showToastFail("Có lỗi xảy ra!")
            }
        });
    }
</script>
<?php require_once "./src/Views/layouts/footer.php"; ?>
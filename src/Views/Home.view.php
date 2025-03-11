<?php require_once "./src/Views/layouts/header.php"; ?>
<main>
    <div class="evet-noti w-full h-32">

    </div>
    <div class="max-w-6xl w-full mx-auto mb-36">
        <h1 class="font-bold text-2xl text-center mb-4">MENU GIAO DỊCH</h1>
        <span class="block w-36 h-1 bg-rose-500 mx-auto mb-20"></span>
        <ul class="flex items-start justify-around gap-3 w-full text-center">
            <li class="w-1/4 flex items-center justify-center transition duration-300 ease-in-out hover:scale-110">
                <a href="<?= ROOT ?>/category" class="w-4/5 mx-auto">
                    <img src="Public/images/menu1.jpg" alt="" class="w-full rounded-3xl mb-3" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                    <span class="font-medium">SẢN PHẨM</span>
                </a>
            </li>
            <li class="w-1/4 flex items-center justify-center transition duration-300 ease-in-out hover:scale-110">
                <a href="#" class="w-4/5 mx-auto">
                    <img src="Public/images/menu2.avif" alt="" class="w-full rounded-3xl mb-3" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                    <span class="font-medium">TÀI KHOẢN</span>
                </a>
            </li>
            <li class="w-1/4 flex items-center justify-center transition duration-300 ease-in-out hover:scale-110">
                <a href="#" class="w-4/5 mx-auto">
                    <img src="Public/images/menu3.jpg" alt="" class="w-full rounded-3xl mb-3" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                    <span class="font-medium">DỊCH VỤ</span>
                </a>
            </li>
            <li class="w-1/4 flex items-center justify-center transition duration-300 ease-in-out hover:scale-110">
                <a href="#" class="w-4/5 mx-auto">
                    <img src="Public/images/menu4.avif" alt="" class="w-full rounded-3xl mb-3" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                    <span class="font-medium">KHUYẾN MÃI</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="max-w-6xl w-full mx-auto mb-28">
        <h1 class="font-bold text-2xl text-center mb-4">DANH MỤC SẢN PHẨM</h1>
        <span class="block w-36 h-1 bg-rose-500 mx-auto mb-20"></span>
        <ul class="flex items-stretch gap-[5%] gap-y-12 justify-start text-center flex-wrap">
            <?php foreach ($featuredCategories as $fcategory): ?>
                <li class="w-[30%] border-2 p-1 border-gray-500 rounded-sm relative group transition duration-300 ease-in-out hover:scale-110" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                    <a href="<?= ROOT ?>/product?category_id=<?= $fcategory->id ?>" class="w-4/5 mx-auto">
                        <img src="Public/images/<?= $fcategory->image ?>" alt="" class="w-full">
                        <div class="font-bold py-3 uppercase"><?= $fcategory->name ?></div>
                    </a>
                    <div class="text-left px-2 text-sm pb-5">
                        <?= $fcategory->description ?>
                    </div>
                    <a href="<?= ROOT ?>/product?category_id=<?= $fcategory->id ?>" class="w-full h-0 flex items-center justify-center bg-rose-500 text-transparent font-medium text-lg absolute bottom-0 left-1/2 -translate-x-1/2 transition-all duration-300 ease-in-out group-hover:h-14 group-hover:text-white">XEM THÊM</a>
                </li>
            <?php endforeach; ?>
            <li class="w-[30%] border-2 p-1 border-gray-500 rounded-sm relative group transition duration-300 ease-in-out hover:scale-110" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                <a href="<?= ROOT ?>/category" class="w-4/5 mx-auto">
                    <img src="Public/images/cacsanphamkhac.jpg" alt="" class="w-full">
                    <div class="font-bold py-3">CÁC SẢN PHẨM KHÁC</div>
                </a>
                <div class="text-left px-2 text-sm pb-5">
                    Xe độ đẹp Shop còn nhiều sản phẩm khác hoặc bạn có thể đặt hàng theo yêu cầu Liên hệ 0343.53.37.36 hoặc 0393.34.37.36 để được tư vấn cụ thể.
                </div>
                <a href="<?= ROOT ?>/category" class="w-full h-0 flex items-center justify-center bg-rose-500 text-transparent font-medium text-lg absolute bottom-0 left-1/2 -translate-x-1/2 transition-all duration-300 ease-in-out group-hover:h-14 group-hover:text-white">XEM THÊM</a>
            </li>
        </ul>
    </div>
    <div class="max-w-6xl w-full mx-auto mb-28">
        <h1 class="font-bold text-2xl text-center mb-4">DỊCH VỤ</h1>
        <span class="block w-36 h-1 bg-rose-500 mx-auto mb-20"></span>
        <ul class="flex items-start gap-[5%] gap-y-12 justify-start text-center flex-wrap">
            <li class="w-[30%] border-2 p-1 border-gray-500 rounded-sm relative group transition duration-300 ease-in-out hover:scale-110" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                <a href="#" class="w-4/5 mx-auto">
                    <img src="Public/images/p1.jpg" alt="" class="w-full">
                    <div class="font-bold py-3">COMBO LÊN ĐĨA TRƯỚC CHO NHIỀU DÒNG XE</div>
                </a>
                <div class="text-left px-2 text-sm pb-5">
                    Xe của bạn bánh trước đang phanh đùm muốn nâng cấp phanh đĩa để có
                    lực phanh tốt hơn xe trở nên đẹp hơn thì hãy lựa chọn những combo
                    lên đĩa của chúng tôi rất nhiều mẫu lựa chọn. Combo đầy đủ dễ lắp
                    đặt hỗ trợ khách hàng lên xe
                </div>
                <a href="#" class="w-full h-0 flex items-center justify-center bg-rose-500 text-transparent font-medium text-lg absolute bottom-0 left-1/2 -translate-x-1/2 transition-all duration-300 ease-in-out group-hover:h-14 group-hover:text-white">XEM THÊM</a>
            </li>
            <li class="w-[30%] border-2 p-1 border-gray-500 rounded-sm relative group transition duration-300 ease-in-out hover:scale-110" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                <a href="#" class="w-4/5 mx-auto">
                    <img src="Public/images/p1.jpg" alt="" class="w-full">
                    <div class="font-bold py-3">COMBO LÊN ĐĨA TRƯỚC CHO NHIỀU DÒNG XE</div>
                </a>
                <div class="text-left px-2 text-sm pb-5">
                    Xe của bạn bánh trước đang phanh đùm muốn nâng cấp phanh đĩa để có
                    lực phanh tốt hơn xe trở nên đẹp hơn thì hãy lựa chọn những combo
                    lên đĩa của chúng tôi rất nhiều mẫu lựa chọn. Combo đầy đủ dễ lắp
                    đặt hỗ trợ khách hàng lên xe
                </div>
                <a href="#" class="w-full h-0 flex items-center justify-center bg-rose-500 text-transparent font-medium text-lg absolute bottom-0 left-1/2 -translate-x-1/2 transition-all duration-300 ease-in-out group-hover:h-14 group-hover:text-white">XEM THÊM</a>
            </li>
            <li class="w-[30%] border-2 p-1 border-gray-500 rounded-sm relative group transition duration-300 ease-in-out hover:scale-110" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                <a href="#" class="w-4/5 mx-auto">
                    <img src="Public/images/p1.jpg" alt="" class="w-full">
                    <div class="font-bold py-3">COMBO LÊN ĐĨA TRƯỚC CHO NHIỀU DÒNG XE</div>
                </a>
                <div class="text-left px-2 text-sm pb-5">
                    Xe của bạn bánh trước đang phanh đùm muốn nâng cấp phanh đĩa để có
                    lực phanh tốt hơn xe trở nên đẹp hơn thì hãy lựa chọn những combo
                    lên đĩa của chúng tôi rất nhiều mẫu lựa chọn. Combo đầy đủ dễ lắp
                    đặt hỗ trợ khách hàng lên xe
                </div>
                <a href="#" class="w-full h-0 flex items-center justify-center bg-rose-500 text-transparent font-medium text-lg absolute bottom-0 left-1/2 -translate-x-1/2 transition-all duration-300 ease-in-out group-hover:h-14 group-hover:text-white">XEM THÊM</a>
            </li>
            <li class="w-[30%] border-2 p-1 border-gray-500 rounded-sm relative group transition duration-300 ease-in-out hover:scale-110" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                <a href="#" class="w-4/5 mx-auto">
                    <img src="Public/images/p1.jpg" alt="" class="w-full">
                    <div class="font-bold py-3">COMBO LÊN ĐĨA TRƯỚC CHO NHIỀU DÒNG XE</div>
                </a>
                <div class="text-left px-2 text-sm pb-5">
                    Xe của bạn bánh trước đang phanh đùm muốn nâng cấp phanh đĩa để có
                    lực phanh tốt hơn xe trở nên đẹp hơn thì hãy lựa chọn những combo
                    lên đĩa của chúng tôi rất nhiều mẫu lựa chọn. Combo đầy đủ dễ lắp
                    đặt hỗ trợ khách hàng lên xe
                </div>
                <a href="#" class="w-full h-0 flex items-center justify-center bg-rose-500 text-transparent font-medium text-lg absolute bottom-0 left-1/2 -translate-x-1/2 transition-all duration-300 ease-in-out group-hover:h-14 group-hover:text-white">XEM THÊM</a>
            </li>
            <li class="w-[30%] border-2 p-1 border-gray-500 rounded-sm relative group transition duration-300 ease-in-out hover:scale-110" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                <a href="#" class="w-4/5 mx-auto">
                    <img src="Public/images/p1.jpg" alt="" class="w-full">
                    <div class="font-bold py-3">COMBO LÊN ĐĨA TRƯỚC CHO NHIỀU DÒNG XE</div>
                </a>
                <div class="text-left px-2 text-sm pb-5">
                    Xe của bạn bánh trước đang phanh đùm muốn nâng cấp phanh đĩa để có
                    lực phanh tốt hơn xe trở nên đẹp hơn thì hãy lựa chọn những combo
                    lên đĩa của chúng tôi rất nhiều mẫu lựa chọn. Combo đầy đủ dễ lắp
                    đặt hỗ trợ khách hàng lên xe
                </div>
                <a href="#" class="w-full h-0 flex items-center justify-center bg-rose-500 text-transparent font-medium text-lg absolute bottom-0 left-1/2 -translate-x-1/2 transition-all duration-300 ease-in-out group-hover:h-14 group-hover:text-white">XEM THÊM</a>
            </li>
        </ul>
    </div>
    <div class="max-w-6xl w-full mx-auto mb-28">
        <h1 class="font-bold text-2xl text-center mb-4">TIN TỨC</h1>
        <span class="block w-36 h-1 bg-rose-500 mx-auto mb-20"></span>
        <ul class="flex items-start gap-[5%] gap-y-12 justify-start text-center flex-wrap">
            <li class="w-[30%] border-2 p-1 border-gray-500 rounded-sm relative group transition duration-300 ease-in-out hover:scale-110" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                <a href="#" class="w-4/5 mx-auto">
                    <img src="Public/images/p1.jpg" alt="" class="w-full">
                    <div class="font-bold py-3">COMBO LÊN ĐĨA TRƯỚC CHO NHIỀU DÒNG XE</div>
                </a>
                <div class="text-left px-2 text-sm pb-5">
                    Xe của bạn bánh trước đang phanh đùm muốn nâng cấp phanh đĩa để có
                    lực phanh tốt hơn xe trở nên đẹp hơn thì hãy lựa chọn những combo
                    lên đĩa của chúng tôi rất nhiều mẫu lựa chọn. Combo đầy đủ dễ lắp
                    đặt hỗ trợ khách hàng lên xe
                </div>
                <a href="#" class="w-full h-0 flex items-center justify-center bg-rose-500 text-transparent font-medium text-lg absolute bottom-0 left-1/2 -translate-x-1/2 transition-all duration-300 ease-in-out group-hover:h-14 group-hover:text-white">XEM THÊM</a>
            </li>
            <li class="w-[30%] border-2 p-1 border-gray-500 rounded-sm relative group transition duration-300 ease-in-out hover:scale-110" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                <a href="#" class="w-4/5 mx-auto">
                    <img src="Public/images/p1.jpg" alt="" class="w-full">
                    <div class="font-bold py-3">COMBO LÊN ĐĨA TRƯỚC CHO NHIỀU DÒNG XE</div>
                </a>
                <div class="text-left px-2 text-sm pb-5">
                    Xe của bạn bánh trước đang phanh đùm muốn nâng cấp phanh đĩa để có
                    lực phanh tốt hơn xe trở nên đẹp hơn thì hãy lựa chọn những combo
                    lên đĩa của chúng tôi rất nhiều mẫu lựa chọn. Combo đầy đủ dễ lắp
                    đặt hỗ trợ khách hàng lên xe
                </div>
                <a href="#" class="w-full h-0 flex items-center justify-center bg-rose-500 text-transparent font-medium text-lg absolute bottom-0 left-1/2 -translate-x-1/2 transition-all duration-300 ease-in-out group-hover:h-14 group-hover:text-white">XEM THÊM</a>
            </li>
            <li class="w-[30%] border-2 p-1 border-gray-500 rounded-sm relative group transition duration-300 ease-in-out hover:scale-110" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                <a href="#" class="w-4/5 mx-auto">
                    <img src="Public/images/p1.jpg" alt="" class="w-full">
                    <div class="font-bold py-3">COMBO LÊN ĐĨA TRƯỚC CHO NHIỀU DÒNG XE</div>
                </a>
                <div class="text-left px-2 text-sm pb-5">
                    Xe của bạn bánh trước đang phanh đùm muốn nâng cấp phanh đĩa để có
                    lực phanh tốt hơn xe trở nên đẹp hơn thì hãy lựa chọn những combo
                    lên đĩa của chúng tôi rất nhiều mẫu lựa chọn. Combo đầy đủ dễ lắp
                    đặt hỗ trợ khách hàng lên xe
                </div>
                <a href="#" class="w-full h-0 flex items-center justify-center bg-rose-500 text-transparent font-medium text-lg absolute bottom-0 left-1/2 -translate-x-1/2 transition-all duration-300 ease-in-out group-hover:h-14 group-hover:text-white">XEM THÊM</a>
            </li>
            <li class="w-[30%] border-2 p-1 border-gray-500 rounded-sm relative group transition duration-300 ease-in-out hover:scale-110" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                <a href="#" class="w-4/5 mx-auto">
                    <img src="Public/images/p1.jpg" alt="" class="w-full">
                    <div class="font-bold py-3">COMBO LÊN ĐĨA TRƯỚC CHO NHIỀU DÒNG XE</div>
                </a>
                <div class="text-left px-2 text-sm pb-5">
                    Xe của bạn bánh trước đang phanh đùm muốn nâng cấp phanh đĩa để có
                    lực phanh tốt hơn xe trở nên đẹp hơn thì hãy lựa chọn những combo
                    lên đĩa của chúng tôi rất nhiều mẫu lựa chọn. Combo đầy đủ dễ lắp
                    đặt hỗ trợ khách hàng lên xe
                </div>
                <a href="#" class="w-full h-0 flex items-center justify-center bg-rose-500 text-transparent font-medium text-lg absolute bottom-0 left-1/2 -translate-x-1/2 transition-all duration-300 ease-in-out group-hover:h-14 group-hover:text-white">XEM THÊM</a>
            </li>
            <li class="w-[30%] border-2 p-1 border-gray-500 rounded-sm relative group transition duration-300 ease-in-out hover:scale-110" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                <a href="#" class="w-4/5 mx-auto">
                    <img src="Public/images/p1.jpg" alt="" class="w-full">
                    <div class="font-bold py-3">COMBO LÊN ĐĨA TRƯỚC CHO NHIỀU DÒNG XE</div>
                </a>
                <div class="text-left px-2 text-sm pb-5">
                    Xe của bạn bánh trước đang phanh đùm muốn nâng cấp phanh đĩa để có
                    lực phanh tốt hơn xe trở nên đẹp hơn thì hãy lựa chọn những combo
                    lên đĩa của chúng tôi rất nhiều mẫu lựa chọn. Combo đầy đủ dễ lắp
                    đặt hỗ trợ khách hàng lên xe
                </div>
                <a href="#" class="w-full h-0 flex items-center justify-center bg-rose-500 text-transparent font-medium text-lg absolute bottom-0 left-1/2 -translate-x-1/2 transition-all duration-300 ease-in-out group-hover:h-14 group-hover:text-white">XEM THÊM</a>
            </li>
        </ul>
    </div>

</main>
<?php require_once "./src/Views/layouts/footer.php"; ?>
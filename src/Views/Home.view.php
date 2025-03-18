<?php require_once "./src/Views/layouts/header.php";
require_once "./src/Models/ImageModel.php";
$imageModel = new ImageModel(); ?>
<main>
    <div class="evet-noti w-full h-32">

    </div>
    <div class="max-w-6xl w-full mx-auto mb-36">
        <h1 class="font-bold text-2xl text-center mb-4">MENU GIAO DỊCH</h1>
        <span class="block w-36 h-1 bg-rose-500 mx-auto mb-20"></span>
        <ul class="flex items-start justify-around gap-3 w-full text-center">
            <li class="w-1/4 flex items-center justify-center transition duration-300 ease-in-out hover:scale-110">
                <a href="<?= ROOT ?>/category" class="w-4/5 mx-auto">
                    <img src="Public/images/<?php echo $imageModel->getImageByName('menu-1')->file_name; ?>" alt="" class="w-full rounded-3xl mb-3" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                    <span class="font-medium">SẢN PHẨM</span>
                </a>
            </li>
            <li class="w-1/4 flex items-center justify-center transition duration-300 ease-in-out hover:scale-110">
                <a href="<?= ROOT ?>/user/orders" class="w-4/5 mx-auto">
                    <img src="Public/images/<?php echo $imageModel->getImageByName('menu-2')->file_name; ?>" alt="" class="w-full rounded-3xl mb-3" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                    <span class="font-medium">TÀI KHOẢN</span>
                </a>
            </li>
            <li class="w-1/4 flex items-center justify-center transition duration-300 ease-in-out hover:scale-110">
                <a href="<?= ROOT ?>/comingsoon" class="w-4/5 mx-auto">
                    <img src="Public/images/<?php echo $imageModel->getImageByName('menu-3')->file_name; ?>" alt="" class="w-full rounded-3xl mb-3" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                    <span class="font-medium">DỊCH VỤ</span>
                </a>
            </li>
            <li class="w-1/4 flex items-center justify-center transition duration-300 ease-in-out hover:scale-110">
                <a href="<?= ROOT ?>/comingsoon" class="w-4/5 mx-auto">
                    <img src="Public/images/<?php echo $imageModel->getImageByName('menu-4')->file_name; ?>" alt="" class="w-full rounded-3xl mb-3" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
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
                        <img src="Public/images/<?php echo $imageModel->getImageByName($fcategory->image)->file_name; ?>" alt="" class="w-full">
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
                    <img src="Public/images/<?php echo $imageModel->getImageByName('cac-san-pham-khac-category')->file_name; ?>" alt="" class="w-full">
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
        <ul class="flex items-stretch gap-[5%] gap-y-12 justify-start text-center flex-wrap">
            <li class="w-[30%] border-2 p-1 border-gray-500 rounded-sm relative group transition duration-300 ease-in-out hover:scale-110" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                <a href="#" class="w-4/5 mx-auto">
                    <img src="Public/images/<?php echo $imageModel->getImageByName('service-1')->file_name; ?>" alt="" class="w-full">
                    <div class="font-bold py-3">RỬA XE</div>
                </a>
                <div class="text-left px-2 text-sm pb-5">
                    Rửa xe máy chuyên nghiệp, đúng cách qua quy trình 7 bước.
                </div>
                <a href="#" class="w-full h-0 flex items-center justify-center bg-rose-500 text-transparent font-medium text-lg absolute bottom-0 left-1/2 -translate-x-1/2 transition-all duration-300 ease-in-out group-hover:h-14 group-hover:text-white">XEM THÊM</a>
            </li>
            <li class="w-[30%] border-2 p-1 border-gray-500 rounded-sm relative group transition duration-300 ease-in-out hover:scale-110" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                <a href="#" class="w-4/5 mx-auto">
                    <img src="Public/images/<?php echo $imageModel->getImageByName('service-2')->file_name; ?>" alt="" class="w-full">
                    <div class="font-bold py-3">BẢO DƯỠNG XE MÁY</div>
                </a>
                <div class="text-left px-2 text-sm pb-5">
                    Combo 10 bước bảo dưỡng xe máy...
                </div>
                <a href="#" class="w-full h-0 flex items-center justify-center bg-rose-500 text-transparent font-medium text-lg absolute bottom-0 left-1/2 -translate-x-1/2 transition-all duration-300 ease-in-out group-hover:h-14 group-hover:text-white">XEM THÊM</a>
            </li>
            <li class="w-[30%] border-2 p-1 border-gray-500 rounded-sm relative group transition duration-300 ease-in-out hover:scale-110" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                <a href="#" class="w-4/5 mx-auto">
                    <img src="Public/images/<?php echo $imageModel->getImageByName('service-3')->file_name; ?>" alt="" class="w-full">
                    <div class="font-bold py-3">ĐỘ XE</div>
                </a>
                <div class="text-left px-2 text-sm pb-5">
                    Độ xe là 1 lựa chọn không thể thiếu khi bạn là một racing boy.
                </div>
                <a href="#" class="w-full h-0 flex items-center justify-center bg-rose-500 text-transparent font-medium text-lg absolute bottom-0 left-1/2 -translate-x-1/2 transition-all duration-300 ease-in-out group-hover:h-14 group-hover:text-white">XEM THÊM</a>
            </li>
        </ul>
    </div>
    <div class="max-w-6xl w-full mx-auto mb-28">
        <h1 class="font-bold text-2xl text-center mb-4">TIN TỨC</h1>
        <span class="block w-36 h-1 bg-rose-500 mx-auto mb-20"></span>
        <ul class="flex items-start gap-[5%] gap-y-12 justify-start text-center flex-wrap">
            <?php foreach ($recentlyPosts as $rPost): ?>
                <li class="w-[30%] border-2 p-1 border-gray-500 rounded-sm relative group transition duration-300 ease-in-out hover:scale-110" style="box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -webkit-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75); -moz-box-shadow: 0px 0px 15px 0px rgba(255,255,255,0.75);">
                    <a href="<?= ROOT ?>/post?id=<?php echo $rPost->id; ?>" class="w-4/5 mx-auto">
                        <img src="Public/images/<?php echo $imageModel->getImageByName($rPost->thumbnail)->file_name; ?>" alt="" class="w-full">
                        <div class="font-bold py-3"><?php echo $rPost->title; ?></div>
                    </a>
                    <a href="<?= ROOT ?>/post?id=<?php echo $rPost->id; ?>" class="w-full h-0 flex items-center justify-center bg-rose-500 text-transparent font-medium text-lg absolute bottom-0 left-1/2 -translate-x-1/2 transition-all duration-300 ease-in-out group-hover:h-14 group-hover:text-white">XEM THÊM</a>
                </li>
            <?php endforeach; ?>

        </ul>
    </div>

</main>
<?php require_once "./src/Views/layouts/footer.php"; ?>
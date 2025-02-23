<?= $this->layout('Client/Components/Layout') ?>

<?= $this->start('main_content') ?>
<div class="container-def">
    <div class="overlay" style="display:none"></div>
    <div class="search-section">
        <div class="container-fluid container-xl">
            <div class="row main-content ml-md-0">
                <div class="sidebar col-md-3 px-0">
                    <h1 class="border-bottom filter-header d-flex d-md-none p-3 mb-0 align-items-center">
                        <span class="mr-2 filter-close-btn">
                            X
                        </span>
                        Lọc
                        <span class="ml-auto text-uppercase">Bỏ lọc</span>
                    </h1>
                    <div class="sidebar__inner ">
                        <div class="filter-body">
                            <div>
                                <h2 class="border-bottom filter-title">Phân loại</h2>
                                <div class="mb-30 filter-options">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="Indoor" checked>
                                        <span></span>
                                        <label class="custom-control-label" for="Indoor">Touhou Fumo</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="Outdoor">
                                        <span></span>
                                        <label class="custom-control-label" for="Outdoor">Plush</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="bear">
                                        <span></span>
                                        <label class="custom-control-label" for="bear">Gấu bông thường</label>
                                    </div>
                                </div>
                                <!--seating option end-->
                                <h2 class="font-xbold body-font border-bottom filter-title">Chủ đề</h2>
                                <div class="mb-3 filter-options" id="cusine-options">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-   input" id="Touhou" checked>
                                        <span></span>
                                        <label class="custom-control-label" for="Touhou">Touhou Project</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="HSR">
                                        <span></span>
                                        <label class="custom-control-label" for="HSR">Honkai Star Rail</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="Genshin">
                                        <span></span>
                                        <label class="custom-control-label" for="Genshin">Genshin Impact</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="Frieren">
                                        <span></span>
                                        <label class="custom-control-label" for="Frieren">Frieren</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="BlueArchive">
                                        <span></span>
                                        <label class="custom-control-label" for="BlueArchive">Blue Archive</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="Arknights">
                                        <span></span>
                                        <label class="custom-control-label" for="Arknights">Arknights</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="Hololive">
                                        <span></span>
                                        <label class="custom-control-label" for="Hololive">Hololive</label>
                                    </div>
                                </div>

                                <!-- cusine filters end -->
                                <h2 class="font-xbold body-font border-bottom filter-title">Price Range</h2>
                                <div class="mb-3 theme-clr xs2-font d-flex justify-content-between">
                                    <span id="slider-range-value1">500.000 VNĐ</span>
                                    <span id="slider-range-value2">10.000.000 VNĐ</span>
                                </div>
                                <div class="mb-30 filter-options">
                                    <div>
                                        <div id="slider-range">
                                            <form>
                                                <div class="form-group">
                                                    <input type="range" class="form-control-range" id="">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="font-xbold body-font border-bottom filter-title">Nguồn hàng</h2>
                                <div class="mb-3 filter-options" id="cusine-options">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-   input" id="Touhou" checked>
                                        <span></span>
                                        <label class="custom-control-label" for="Touhou">Sắp ra mắt</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="HSR">
                                        <span></span>
                                        <label class="custom-control-label" for="HSR">Còn hàng</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="Genshin">
                                        <span></span>
                                        <label class="custom-control-label" for="Genshin">Hết hàng</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content col-md-9">
                    <div class="d-flex justify-content-between border-bottom align-items-center">
                        <h2 class="title">Sản phẩm</h2>
                        <div class="filters-actions">
                            <div>
                                <button class="btn filter-btn d-md-none"><svg xmlns="http://www.w3.org/2000/svg" class="mr-2" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path d="M3 18h6v-2H3v2zM3 6v2h18V6H3zm0 7h12v-2H3v2z" />
                                    </svg>
                                    Lọc</button>
                            </div>
                            <div class="d-flex align-items-center">

                                <div class="dropdown position-relative sort-drop">
                                    <button type="button" class="btn btn-transparent dropdown-toggle body-clr p-0 py-1 sm-font fw-400 sort-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="me-2 d-md-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                                <g>
                                                    <path d="M0,0h24 M24,24H0" fill="none" />
                                                    <path d="M7,6h10l-5.01,6.3L7,6z M4.25,5.61C6.27,8.2,10,13,10,13v6c0,0.55,0.45,1,1,1h2c0.55,0,1-0.45,1-1v-6 c0,0,3.72-4.8,5.74-7.39C20.25,4.95,19.78,4,18.95,4H5.04C4.21,4,3.74,4.95,4.25,5.61z" />
                                                    <path d="M0,0h24v24H0V0z" fill="none" />
                                                </g>
                                            </svg>
                                        </span>
                                        <span class="d-md-inline-block ms-md-2 font-semibold">Mới nhất</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end p-0">
                                        <li><button class="dropdown-item active" type="button">Mới nhất</button></li>
                                        <li><button class="dropdown-item" type="button">Giá thấp đến cao</button></li>
                                        <li><button class="dropdown-item" type="button">Giá cao đến thấp</button></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row row-grid row-product">
                        <?php foreach ($data as $product): ?>
                            <div class="col-md-6 col-lg-4 col-xl-4 product-item">
                                <div class="img-container">
                                    <a href="/chi-tiet/<?= $product['product_id'] ?>"><img src="<?= uploads ?>/<?= $product['thumbnail'] ?>" class="product-img" /></a>
                                </div>
                                <div class="additional-info">
                                    <a href="/chi-tiet/<?=$product['product_id']?>" class="text-decoration-none link-nav">
                                        <h4 class="product-name"><?= $product['name'] ?></h4>
                                    </a>
                                    <div class="info-group">
                                        <span class="price"><?= number_format($product['price']) ?> vnđ</span>
                                        <span class="warehouse-status" style="<?= $product['total_quantity'] <= 0 ? 'background: red' : '' ?>"><?= $product['total_quantity'] > 0 ? 'Còn hàng' : 'Hết hàng' ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->stop() ?>
    <?= $this->push('scripts') ?>
    <script src="<?= client_js ?>/Product.js"></script>
    <?= $this->end();

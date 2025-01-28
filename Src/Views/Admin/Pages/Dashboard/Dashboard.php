<div class="row">
    <div class="col-xl-6 grid-margin stretch-card flex-column">
        <h5 class="mb-2 text-titlecase mb-4">Thống kê trạng thái</h5>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <p class="mb-0 text-muted">Người dùng</p>
                            <p class="mb-2 text-muted"><?= isset($countUser[0]['user']) ? $countUser[0]['user'] : 0 ?></p>

                            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px"
                                fill="#666666">
                                <path
                                    d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z" />
                            </svg>

                        </div>
                        <div class="text-center">

                            <h2 class="mb-"></h2>

                        </div>


                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <p class="mb-2 text-muted">Phân loại sản phẩm</p>
                                <h6 class="mb-0"></h6>
                            </div>
                            <div>
                                <p class="mb-2 text-muted"><?= isset($countCategory[0]['category']) ? $countCategory[0]['category'] : 0 ?></p>
                                <h6 class="mb-0"></h6>
                            </div>
                            <div>
                                <p class="mb-2 text-muted"></p>
                                <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960"
                                    width="30px" fill="#666666">
                                    <path
                                        d="M200-80q-33 0-56.5-23.5T120-160v-451q-18-11-29-28.5T80-680v-120q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v120q0 23-11 40.5T840-611v451q0 33-23.5 56.5T760-80H200Zm0-520v440h560v-440H200Zm-40-80h640v-120H160v120Zm200 280h240v-80H360v80Zm120 20Z" />
                                </svg>
                            </div>

                        </div>
                        <div class="text-center">
                            <h2 class="mb"></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <p class="mb-2 text-muted">Đơn hàng</p>
                                <h6 class="mb-0"></h6>
                            </div>
                            <div>
                                <p class="mb-2 text-muted"><?= isset($countOrder[0]['order']) ? $countOrder[0]['order'] : 0 ?></p>

                                <h6 class="mb-0"></h6>
                            </div>
                            <div>
                                <p class="mb-2 text-muted"></p>
                                <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960"
                                    width="30px" fill="#666666">
                                    <path
                                        d="m691-150 139-138-42-42-97 95-39-39-42 43 81 81ZM240-600h480v-80H240v80ZM720-40q-83 0-141.5-58.5T520-240q0-83 58.5-141.5T720-440q83 0 141.5 58.5T920-240q0 83-58.5 141.5T720-40ZM120-80v-680q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v267q-19-9-39-15t-41-9v-243H200v562h243q5 31 15.5 59T486-86l-6 6-60-60-60 60-60-60-60 60-60-60-60 60Zm120-200h203q3-21 9-41t15-39H240v80Zm0-160h284q38-37 88.5-58.5T720-520H240v80Zm-40 242v-562 562Z" />
                                </svg>
                            </div>

                        </div>
                        <div class="text-center">
                            <h2 class="mb"></h2>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <p class="mb-2 text-muted">Số bình luận</p>
                                <h6 class="mb-0"></h6>
                            </div>
                            <div>
                                <p class="mb-2 text-muted"><?= isset($countComment[0]['comment']) ? $countComment[0]['comment'] : 0 ?></p>
                                <h6 class="mb-0"></h6>
                            </div>
                            <div>
                                <p class="mb-2 text-muted"></p>
                                <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960"
                                    width="30px" fill="#666666">
                                    <path
                                        d="M240-400h480v-80H240v80Zm0-120h480v-80H240v80Zm0-120h480v-80H240v80ZM880-80 720-240H160q-33 0-56.5-23.5T80-320v-480q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v720ZM160-320h594l46 45v-525H160v480Zm0 0v-480 480Z" />
                                </svg>
                            </div>

                        </div>
                        <div class="text-center">
                            <h2 class="mb"></h2>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <p class="mb-2 text-muted">Thương hiệu</p>
                                <h6 class="mb-0"></h6>
                            </div>
                            <div>
                                <p class="mb-2 text-muted"></p>
                                <h6 class="mb-0"></h6>
                            </div>
                            <div class="text-center" style="width: fit-content;">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 w-50" width="60px">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 12h8M12 8v8" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-center">
                            <h2 class="mb"></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <p class="mb-2 text-muted">Đánh giá</p>
                                <h6 class="mb-0"></h6>
                            </div>
                            <div>
                                <p class="mb-2 text-muted"></p>
                                <h6 class="mb-0"></h6>
                            </div>
                            <div class="text-center" style="width: fit-content;">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 w-50" width="60px">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 2l2.39 7.72L22 9.24l-5.5 4.74L18.4 21 12 16.93 5.6 21 7.5 14.98 2 9.24l7.61-.52L12 2z" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-center">
                            <h2 class="mb"></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <p class="mb-2 text-muted">Phân loại cha</p>
                                <h6 class="mb-0"></h6>
                            </div>
                            <div>
                                <p class="mb-2 text-muted"></p>
                                <h6 class="mb-0"></h6>
                            </div>
                            <div class="text-center" style="width: fit-content;">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 w-50" width="60px">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 3h18v18H3z" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-center">
                            <h2 class="mb"></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <p class="mb-2 text-muted">Sản phẩm</p>
                                <h6 class="mb-0"></h6>
                            </div>
                            <div>
                                <p class="mb-2 text-muted"></p>
                                <h6 class="mb-0"></h6>
                            </div>
                            <div class="text-center" style="width: fit-content;">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 w-50" width="60px">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20 6L9 17l-5-5" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-center">
                            <h2 class="mb"></h2>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
    <div class="col-xl-6 grid-margin stretch-card flex-column">
        <h5 class="mb-2 text-titlecase mb-4">Thống kê thu nhập</h5>
        <div class="row h-100">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start flex-wrap">
                            <div>
                                <p class="mb-3">Sản phẩm</p>
                                <h3></h3>
                            </div>

                        </div>
                        <div class="btn-group">
                            <button id="dayRevenue" class="btn btn-primary">Doanh thu 1 tuần qua</button>
                            <button id="monthRevenue" class="btn btn-secondary">Doanh thu 6 tháng qua</button>
                            <button id="yearRevenue" class="btn btn-secondary">Doanh thu 5 năm qua</button>
                        </div>
                        <div id="income-chart-legend " class="d-flex flex-wrap mt-1 mt-md-0 w-75">
                            <canvas id="revenue_chart"></canvas>
                        </div>
                        <div class="d-flex flex-wrap mt-4">
                            <input type="date" id="datePicker" class="form-control w-25 mr-2">
                            <button id="filterByDate" class="btn btn-primary">Lọc theo ngày</button>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-2 text-md-center text-lg-left">Top 5 sản phẩm bán chạy nhất </h5>
                <div class="btn-group" role="group" aria-label="Time Filter">
                    <button id="dayFilter" class="btn btn-secondary active">Theo ngày</button>
                    <button id="monthFilter" class="btn btn-secondary">Theo tháng</button>
                    <button id="yearFilter" class="btn btn-secondary">Theo năm</button>
                </div>

                <canvas id="comment_by_product"></canvas>

            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

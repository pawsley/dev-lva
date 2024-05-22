        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                    <div class="col-6">
                        <h4>Katalog</h4>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?=base_url()?>">                                       
                                <svg class="stroke-icon">
                                <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-gallery"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Katalog</li>
                        <li class="breadcrumb-item active">Katalog LVA</li>
                        </ol>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid product-wrapper">
                <div class="product-grid">
                    <div class="feature-products">
                        <div class="row">
                            <div class="col-md-6 products-total">
                                <div class="square-product-setting d-inline-block"><a class="icon-grid grid-layout-view" href="#" data-original-title="" title=""><i data-feather="grid"></i></a></div>
                                <div class="square-product-setting d-inline-block"><a class="icon-grid m-0 list-layout-view" href="#" data-original-title="" title=""><i data-feather="list"></i></a></div>
                                <div class="grid-options d-inline-block">
                                    <ul>
                                        <li><a class="product-2-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-1 bg-primary"></span><span class="line-grid line-grid-2 bg-primary"></span></a></li>
                                        <li><a class="product-3-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-3 bg-primary"></span><span class="line-grid line-grid-4 bg-primary"></span><span class="line-grid line-grid-5 bg-primary"></span></a></li>
                                        <li><a class="product-4-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-6 bg-primary"></span><span class="line-grid line-grid-7 bg-primary"></span><span class="line-grid line-grid-8 bg-primary"></span><span class="line-grid line-grid-9 bg-primary"></span></a></li>
                                        <li><a class="product-6-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-10 bg-primary"></span><span class="line-grid line-grid-11 bg-primary"></span><span class="line-grid line-grid-12 bg-primary"></span><span class="line-grid line-grid-13 bg-primary"></span><span class="line-grid line-grid-14 bg-primary"></span><span class="line-grid line-grid-15 bg-primary"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 text-sm-end">
                                <span class="m-r-5">
                                <div class="select2-drpdwn-product select-options d-inline-block">
                                <select class="form-control btn-square" name="select">
                                    <option value="opt1">Featured</option>
                                    <option value="opt2">Lowest Prices</option>
                                    <option value="opt3">Highest Prices</option>
                                </select>
                                </div>
                            </div>
                        </div>
                        <!-- Pencarian -->
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <form>
                                    <div class="form-group m-0">
                                        <input class="form-control" type="search" placeholder="Search.." data-original-title="" title=""><i class="fa fa-search"></i>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="product-wrapper-grid">
                        <div class="row">
                            <!-- Produk 1 -->
                            <div class="col-xl-3 col-sm-6 xl-4">
                                <div class="card">
                                <div class="product-box">
                                    <div class="product-img"><img class="img-fluid" src="<?=base_url()?>assets/images/katalog/jannete.jpg" alt="">
                                        <div class="product-hover">
                                            <ul>
                                                <li>
                                                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#ModalKatalog"><i class="icon-eye"></i></button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="ModalKatalog" tabindex="-1" role="dialog" aria-labelledby="ModalKatalog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document" style="max-height: 100vh; overflow-y: auto;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="product-box row">
                                                        <div class="product-img col-lg-6"><img class="img-fluid" src="<?=base_url()?>assets/images/katalog/jannete.jpg" alt=""></div>
                                                        <div class="product-details col-lg-6 text-start">
                                                            <h4>JANNETE DRESS</h4>
                                                            <div class="product-price">Rp3.750.000</div>
                                                            <div class="product-view">
                                                                <h6 class="f-w-600">Detail Produk</h6>
                                                                <p class="mb-0">
                                                                    Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.
                                                                </p>
                                                            </div>
                                                            <div class="product-size">
                                                                <h6 class="f-w-600">Ukuran Produk</h6>
                                                                <ul>
                                                                    <li> 
                                                                        <button class="btn btn-outline-light" type="button">M</button>
                                                                    </li>
                                                                    <li> 
                                                                        <button class="btn btn-outline-light" type="button">L</button>
                                                                    </li>
                                                                    <li> 
                                                                        <button class="btn btn-outline-light" type="button">Xl</button>
                                                                    </li>
                                                                    <ul class="mt-4">
                                                                        <li class="f-w-600">Stock <span>73</span> </li>
                                                                        <li class="f-w-600">Kategori <span>Merah Maroon</span> </li>
                                                                    </ul>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-details">
                                        <h4>JANNETE DRESS</h4>
                                        <p>Women Full Sleeve Printed Sweatshirt</p>
                                        <div class="product-price">Rp3.750.000</div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- Produk 2 -->
                            <div class="col-xl-3 col-sm-6 xl-4">
                                <div class="card">
                                <div class="product-box">
                                    <div class="product-img"><img class="img-fluid" src="<?=base_url()?>assets/images/katalog/beyza.jpg" alt="">
                                        <div class="product-hover">
                                            <ul>
                                                <li>
                                                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#ModalKatalog2"><i class="icon-eye"></i></button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="ModalKatalog2" tabindex="-1" role="dialog" aria-labelledby="ModalKatalog2" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document" style="border-radius:5%; max-height: 90vh; overflow-y: auto;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="product-box row">
                                                        <div class="product-img col-lg-6"><img class="img-fluid" src="<?=base_url()?>assets/images/katalog/beyza.jpg" alt=""></div>
                                                        <div class="product-details col-lg-6 text-start">
                                                            <h4>BEYZAA DRESS</h4>
                                                            <div class="product-price">Rp3.750.000</div>
                                                            <div class="product-view">
                                                                <h6 class="f-w-600">Detail Produk</h6>
                                                                <p class="mb-0">
                                                                    Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.
                                                                </p>
                                                            </div>
                                                            <div class="product-size">
                                                                <h6 class="f-w-600">Ukuran Produk</h6>
                                                                <ul>
                                                                    <li> 
                                                                        <button class="btn btn-outline-light" type="button">M</button>
                                                                    </li>
                                                                    <li> 
                                                                        <button class="btn btn-outline-light" type="button">L</button>
                                                                    </li>
                                                                    <li> 
                                                                        <button class="btn btn-outline-light" type="button">Xl</button>
                                                                    </li>
                                                                    <ul class="mt-4">
                                                                        <li class="f-w-600">Stock <span>73</span> </li>
                                                                        <li class="f-w-600">Kategori <span>Merah Maroon</span> </li>
                                                                    </ul>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-details">
                                        <h4>BEYZAA DRESS</h4>
                                        <p>Women Full Sleeve Printed Sweatshirt</p>
                                        <div class="product-price">Rp3.750.000</div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- Produk 3 -->
                            <div class="col-xl-3 col-sm-6 xl-4">
                                <div class="card">
                                <div class="product-box">
                                    <div class="product-img"><img class="img-fluid" src="<?=base_url()?>assets/images/katalog/bonneta.jpg" alt="">
                                        <div class="product-hover">
                                            <ul>
                                                <li>
                                                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#ModalKatalog3"><i class="icon-eye"></i></button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="ModalKatalog3" tabindex="-1" role="dialog" aria-labelledby="ModalKatalog3" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document" style="border-radius:5%; max-height: 90vh; overflow-y: auto;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="product-box row">
                                                        <div class="product-img col-lg-6"><img class="img-fluid" src="<?=base_url()?>assets/images/katalog/bonneta.jpg" alt=""></div>
                                                        <div class="product-details col-lg-6 text-start">
                                                            <h4>BONNETA DRESS</h4>
                                                            <div class="product-price">Rp3.750.000</div>
                                                            <div class="product-view">
                                                                <h6 class="f-w-600">Detail Produk</h6>
                                                                <p class="mb-0">
                                                                    Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.
                                                                </p>
                                                            </div>
                                                            <div class="product-size">
                                                                <h6 class="f-w-600">Ukuran Produk</h6>
                                                                <ul>
                                                                    <li> 
                                                                        <button class="btn btn-outline-light" type="button">M</button>
                                                                    </li>
                                                                    <li> 
                                                                        <button class="btn btn-outline-light" type="button">L</button>
                                                                    </li>
                                                                    <li> 
                                                                        <button class="btn btn-outline-light" type="button">Xl</button>
                                                                    </li>
                                                                    <ul class="mt-4">
                                                                        <li class="f-w-600">Stock <span>73</span> </li>
                                                                        <li class="f-w-600">Kategori <span>Merah Maroon</span> </li>
                                                                    </ul>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-details">
                                        <h4>BONNETA DRESS</h4>
                                        <p>Women Full Sleeve Printed Sweatshirt</p>
                                        <div class="product-price">Rp3.750.000</div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- Produk 4 -->
                            <div class="col-xl-3 col-sm-6 xl-4">
                                <div class="card">
                                <div class="product-box">
                                    <div class="product-img"><img class="img-fluid" src="<?=base_url()?>assets/images/katalog/adreea.jpg" alt="">
                                        <div class="product-hover">
                                            <ul>
                                                <li>
                                                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#ModalKatalog4"><i class="icon-eye"></i></button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="ModalKatalog4" tabindex="-1" role="dialog" aria-labelledby="ModalKatalog4" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document" style="border-radius:5%; max-height: 90vh; overflow-y: auto;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="product-box row">
                                                        <div class="product-img col-lg-6"><img class="img-fluid" src="<?=base_url()?>assets/images/katalog/adreea.jpg" alt=""></div>
                                                        <div class="product-details col-lg-6 text-start">
                                                            <h4>ADRREA DRESS</h4>
                                                            <div class="product-price">Rp3.750.000</div>
                                                            <div class="product-view">
                                                                <h6 class="f-w-600">Detail Produk</h6>
                                                                <p class="mb-0">
                                                                    Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.
                                                                </p>
                                                            </div>
                                                            <div class="product-size">
                                                                <h6 class="f-w-600">Ukuran Produk</h6>
                                                                <ul>
                                                                    <li> 
                                                                        <button class="btn btn-outline-light" type="button">M</button>
                                                                    </li>
                                                                    <li> 
                                                                        <button class="btn btn-outline-light" type="button">L</button>
                                                                    </li>
                                                                    <li> 
                                                                        <button class="btn btn-outline-light" type="button">Xl</button>
                                                                    </li>
                                                                    <ul class="mt-4">
                                                                        <li class="f-w-600">Stock <span>73</span> </li>
                                                                        <li class="f-w-600">Kategori <span>Merah Maroon</span> </li>
                                                                    </ul>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-details">
                                        <h4>ADRREA DRESS</h4>
                                        <p>Women Full Sleeve Printed Sweatshirt</p>
                                        <div class="product-price">Rp3.750.000</div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
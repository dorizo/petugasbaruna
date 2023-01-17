
        <!-- Wallet Card -->
        <div class="section wallet-card-section pt-1">
            <div class="wallet-card">
                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">Total Pengumpulan</span>
                        <h1 class="total">0</h1>
                    </div>
                    <div class="right">
                        <a href="#" class="button" data-bs-toggle="modal" data-bs-target="#depositActionSheet">
                            <ion-icon name="add-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <!-- * Balance -->
                <!-- Wallet Footer -->
                <div class="wallet-footer">
                    <div class="item">
                        <a href="<?=base_url("home");?>">
                            <div class="icon-wrapper bg-danger">
                                <ion-icon name="swap-vertical"></ion-icon>
                            </div>
                            <strong>Fish Waste</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="<?=base_url("home/residu");?>">
                            <div class="icon-wrapper">
                                <ion-icon name="swap-vertical"></ion-icon>
                            </div>
                            <strong>Residu</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="<?=base_url("home/Recyclables");?>">
                            <div class="icon-wrapper bg-success">
                                <ion-icon name="swap-vertical"></ion-icon>
                            </div>
                            <strong>Sampah Recyclables</strong>
                        </a>
                    </div>
                    <!-- <div class="item">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exchangeActionSheet">
                            <div class="icon-wrapper bg-warning">
                                <ion-icon name="swap-vertical"></ion-icon>
                            </div>
                            <strong>Exchange</strong>
                        </a>
                    </div> -->

                </div>
                <!-- * Wallet Footer -->
            </div>
        </div>
        <!-- Wallet Card -->

        <!-- Deposit Action Sheet -->
           <?php
           foreach ($pembelian as $key => $value) {
           ?>
        <div class="section mt-2">
                    <div class="card">
                        <div class="card-header">
                            <!-- Card Header -->
                        </div>
                        
                        <div class="card-body">
                        <b>Code Pengumpulan  (<?=$value["bsCode"]?>)</b>    
                        <hr />
                            <p>Total Pengumpulan = <?=sparator($value["berat"])?></p>
                        </div>
                        <div class="card-footer">
                        <?=$value["createAt"]?>
                        </div>
                    </div>
                </div>

           <?php
           }
           ?>
        <!-- * Deposit Action Sheet -->

        <!-- * News -->


        <!-- app footer -->
        <div class="appFooter">
            <div class="footer-title">
                Copyright © Finapp 2021. All Rights Reserved.
            </div>
            Bootstrap 5 based mobile template.
        </div>
        <!-- * app footer -->

        
        <!-- Deposit Action Sheet -->
        <div class="modal fade action-sheet" id="depositActionSheet" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">TAMBAH DATA PENGUMPULAN</h5>
                    </div>
                    <div class="modal-body">

                        <div class="action-sheet-content">
                    <?php if($this->session->userdata("bsCode")){ ?>
                        <div class="form-group basic">
                                    <a href="<?=base_url("pengumpulan/tambah")?>" class="btn btn-primary btn-block btn-lg">KEMBALI KE PENGAMBILAN</a>
                    </div>
                        <?php }else{?>
                            <form method="post" action="<?=base_url("pengumpulan/input")?>">
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account1">LOKASI PENGUMPULAN</label>
                                        <select class="form-control custom-select" name="anggotaCode">
                                            <?php
                                            foreach ($anggota as $key => $value) {
                                            ?>
                                            <option value="<?=$value["anggotaCode"]?>"><?=$value["nama"]?></option>
                                            <?php
                                                }
                                                ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- <div class="form-group basic">
                                    <label class="label">Enter Amount</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addona1">$</span>
                                        <input type="text" class="form-control" placeholder="Enter an amount"
                                            value="100">
                                    </div>
                                </div> -->


                                <div class="form-group basic">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg"
                                        data-bs-dismiss="modal">GENERATE CODE</button>
                                </div>
                            </form>
                        <?php }  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Deposit Action Sheet -->

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
                        <a href="#" class="button">
                            <ion-icon name="add-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <!-- * Balance -->
                <!-- Wallet Footer -->
                <div class="wallet-footer">
                    <div class="item">
                        <a href="#">
                            <div class="icon-wrapper bg-danger">
                                <ion-icon name="swap-vertical"></ion-icon>
                            </div>
                            <strong>Fish Waste</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <div class="icon-wrapper">
                                <ion-icon name="swap-vertical"></ion-icon>
                            </div>
                            <strong>Residu</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
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
                            <p>Total Pengumpulan = <?=$value["totalHarga"]?></p>
                        </div>
                        <div class="card-footer">
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
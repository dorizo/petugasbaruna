
        <!-- Wallet Card -->
        <div class="section wallet-card-section pt-1">
            <div class="wallet-card">
                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">CODE PENGUMPULAN</span>
                        <h1 class="total"><?php echo $this->session->userdata("bsCode")?></h1>
                        <a target="BLANK_" href="<?=base_url("pengumpulan/done/".$this->session->userdata("bsCode"))?>" class="btn btn-primary"><ion-icon name="checkmark-done-circle-outline"></ion-icon> DONE</a>
                       
                    </div>
                    <div class="right">
                        <a href="#" class="button" data-bs-toggle="modal" data-bs-target="#depositActionSheet">
                            <ion-icon name="add-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <!-- * Balance -->
                <!-- Wallet Footer -->
                <!-- * Wallet Footer -->
            </div>
        </div>
        <?php
        foreach ($datapengumpulan as $key => $value) {
            # code...
            ?>
             <div class="section mt-2">
                    <div class="card">
                        <div class="card-header">
                            <!-- Card Header -->
                        </div>
                        
                        <div class="card-body">
                        <b>Jenis  (<?=$value["jenis"]?>)</b>    
                        <hr />
                            <p>Total Pengumpulan = <?=sparator($value["berat"])?></p>
                        </div>
                        <div class="card-footer">
                        <a target="BLANK_" href="<?=base_url("pengumpulan/hapus/".$value["dbsCode"])?>" class="btn btn-primary"><ion-icon name="trash-outline"></ion-icon></a>
                        </div>
                    </div>
                </div>

            <?php
        }
        ?>
        <!-- Wallet Card -->

        <!-- * Deposit Action Sheet -->

        <!-- * News -->

        
        <!-- Deposit Action Sheet -->
        <div class="modal fade action-sheet" id="depositActionSheet" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">TAMBAH SAMPAH</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form method="post">
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account1">From</label>
                                        <select class="form-control custom-select" name="jsCode">
                                            <?php
                                            foreach ($kategori as $key => $value) {
                                            ?>
                                            <option value="<?=$value["jsCode"]?>"><?=$value["jenis"]?></option>
                                            <?php
                                                }
                                                ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <label class="label">Total Berat (Kg)</label>
                                    <div class="input-group mb-2">
                                        <input type="text" name="berat" class="form-control"  onkeyup="this.value=rupiah(this.value)" placeholder="Enter Berat Sampah">
                                    </div>
                                </div>


                                <div class="form-group basic">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg"
                                        data-bs-dismiss="modal">Tambah Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Deposit Action Sheet -->
<script>
</script>

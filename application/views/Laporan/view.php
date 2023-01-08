<?php
foreach ($complaint as $key => $value) {
 
?>


<div class="section mt-2">
            <div class="card">
                <div class="card-header">
                    <!-- Card Header -->
                </div>
                
                <img src="https://baruna.id//assets/document/complaint/<?=$value["photo"]?>" class="card-img-top" alt="image">
                <div class="card-body">
                    
                    <p class="card-text"><?=$value["message"]?></p>
                </div>
                <div class="card-footer">
                    <a target="BLANK_" href="https://www.google.com/maps/place/<?=$value["latitude"]?>,<?=$value["longitude"]?>" class="btn btn-primary"><ion-icon name="navigate-circle-outline"></ion-icon></a>
                </div>
            </div>
        </div>

<?php
}
?>
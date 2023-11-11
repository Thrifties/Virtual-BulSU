<div class="modal fade" id="<?php echo $campusId ?>" tabindex="-1" aria-labelledby="campusModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="campusModal"><?php echo $campus ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-2">
            <?php 
            $query2 = "SELECT * FROM announcements WHERE campus_assignment = '$campus' ORDER BY created_at DESC";
            $result2 = mysqli_query($con, $query);
            if (mysqli_num_rows($result2) > 0) {
                while ($row2 = mysqli_fetch_assoc($result2)) { 
                echo '
                    <div class="col newsCard">
                    <a href="VirtualBulsu_AnnouncementPage.php?id='.$row2['announcement_id'].'" class="text-decoration-none">
                        <div class="card h-100">
                        <img src="uploads/'.$row2['file_input'].'" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">'.$row2['headline'].'</h5>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">Date Posted: '.date('F d, Y', strtotime($row2['created_at'])).'</small>
                        </div>
                        </div>
                    </a>
                    </div>
                ';
                }
            }

            ?>
        </div>
        </div>
    </div>
    </div>
</div>
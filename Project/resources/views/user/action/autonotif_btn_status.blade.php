<center>
    <?php
    if ($status == "Berhasil") { ?>

        <a href="javascript:void()" class="btn btn-primary">
            <i class="flaticon2-check-mark"></i> {{$status}}
        </a>
    <?php
    } else { ?>
        <a href="javascript:void()" class="btn btn-danger">
            <i class="flaticon2-delete"></i> {{$status}}
        </a>
    <?php
    }

    ?>
</center>

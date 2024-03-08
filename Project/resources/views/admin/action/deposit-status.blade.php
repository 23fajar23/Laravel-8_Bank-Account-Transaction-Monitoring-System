<center>
    <?php
    if ($status == "berhasil") { ?>
        <a href="javascript:void()" class="important_radius_half btn btn-success">
            <i class="flaticon2-check-mark"></i> Success
        </a>
    <?php
    } else if ($status == "wait") { ?>
        <a href="javascript:void()" style="color: white;" class="important_radius_half btn btn-warning">
            <i class="flaticon2-reload-1"></i> Process
        </a>
    <?php
    } else if ($status == "expired") { ?>
        <a href="javascript:void()" class="important_radius_half btn btn-danger">
            <i class="flaticon2-delete"></i> Expired
        </a>

    <?php
    }

    ?>
</center>

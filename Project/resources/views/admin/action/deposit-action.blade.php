<?php

if ($status == "expired" || $status == "wait") { ?>
    <a href="javascript:void()" onclick="open_modal('{{$id}}','{{$no}}')" style="color: white;" class="important_radius_half btn btn-info">
        <i class="flaticon2-pen"></i> Verifikasi
    </a>
<?php
} else {
    echo "-";
}


?>

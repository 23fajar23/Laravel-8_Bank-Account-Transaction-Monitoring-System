<center>
    <div class="kt-portlet__head-toolbar ">
        <div class="dropdown dropdown-inline">
            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="flaticon-more-1"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-md dropdown-menu-fit">
                <ul class="kt-nav">
                    <li class="kt-nav__item">
                        <a href="javascript:void(0);" onclick="FormRekening('{{ $id }}')" class=" kt-nav__link"> <i class="kt-nav__link-icon flaticon2-analytics-2"></i> <span class="kt-nav__link-text">Data Rekening</span></a>
                    </li>
                    <li class="kt-nav__item">
                        <a href="javascript:void(0);" onclick="sendForm('{{ $id }}')" class=" kt-nav__link">
                            <i class="kt-nav__link-icon flaticon2-user"></i>
                            <span class="kt-nav__link-text">Profil</span>
                        </a>
                    </li>
                    <li class="kt-nav__item"> <a href="javascript:void(0);" class="kt-nav__link" onClick="change_password('{{ $id }}','{{ $no }}')"> <i class="kt-nav__link-icon flaticon-security"></i> <span class="kt-nav__link-text"> Kata Sandi </span> </a></li>
                    <li class="kt-nav__separator"></li>
                    <li class="kt-nav__item"> <a href="javascript:void(0);" class="kt-nav__link" onClick="delete_user('{{ $id }}','{{ $no }}')"> <i class="kt-nav__link-icon flaticon2-rubbish-bin"></i> <span class="kt-nav__link-text">Hapus</span> </a></li>
                </ul>
            </div>
        </div>
    </div>
</center>

<div id="FormUpdate"></div>
<div id="FormRekening"></div>

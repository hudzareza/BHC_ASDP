<nav class="sidebar">
    <ul class="menu-slide">
        {{-- <li class="{{ setActive(['admin/dashboard']) }}"> --}}

        <li>
            <a class="" href="{{ route('admin.report') }}" title="">
                {{-- <i><svg id="icon-home" class="feather feather-home" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></i> --}}
                <i class="icofont-dashboard"></i>
                Goers Report
            </a>
        </li>
        <li>
            {{-- <li class="{{ setActive(['admin/gallery', 'admin/gallery/*'] ) }}"> --}}
            <a class="" href="{{ route('admin.list.galeri') }}" title="">
                {{-- <i class=""><svg id="ab7" class="feather feather-zap" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg></i> --}}
                <i class="icofont-ui-image"></i>
                Master Banner
            </a>
        </li>
        <li>
            {{-- <li class="{{ setActive(['admin/gallery', 'admin/gallery/*'] ) }}"> --}}
            <a class="" href="{{ route('admin.list.lang') }}" title="">
                {{-- <i class=""><svg id="ab7" class="feather feather-zap" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg></i> --}}
                <i class="icofont-ui-chat"></i>
                Master Bahasa
            </a>
        </li>
        <li>
            {{-- <li class="{{ setActive(['admin/slider', 'admin/slider/*'] ) }}"> --}}
            <a class="" href="{{ route('admin.list.banner') }}" title="">
                {{-- <i class=""><svg id="ab4" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></i> --}}
                <i class="icofont-image"></i>
                Slide Banner
            </a>
        </li>
        <li>
            {{-- <li class="{{ setActive(['admin/slider', 'admin/slider/*'] ) }}"> --}}
            <a class="" href="{{ route('admin.list.artikel.jelajah') }}" title="">
                {{-- <i class=""><svg id="ab4" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></i> --}}
                <i class="icofont-bullhorn"></i>
                Jelajah BHC
            </a>
        </li>

        <li>
            {{-- <li class="{{ setActive(['admin/ideabox', 'admin/ideabox/*'] ) }}"> --}}
            <a class="" href="{{ route('admin.list.artikel.info') }}" title="">
                {{-- <i class=""><svg id="ab7" class="feather feather-zap" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg></i> --}}
                <i class="icofont-bullhorn"></i>
                Info BHC
            </a>
        </li>
        <li>
            <a class="" href="{{ route('admin.add.artikel.event') }}" title="">
                {{-- <i class=""><svg id="ab2" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg></i> --}}
                <i class="icofont-bullhorn"></i>
                Buat Event
            </a>
        </li>
        <li>
            <a class="" href="{{ route('admin.list.artikel.event') }}" title="">
                {{-- <i class=""><svg id="ab2" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg></i> --}}
                <i class="icofont-bullhorn"></i>
                Events
            </a>
        </li>
        <!-- <li>
            <a class="" href="{{ route('admin.list.slide.event') }}" title="">
                {{-- <i class=""><svg id="ab2" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg></i> --}}
                <i class="icofont-image"></i>
                Slide Events
            </a>
        </li> -->

        <li>
            {{-- <li class="{{ setActive(['admin/industryinsight', 'admin/industryinsight/*'] ) }}"> --}}
            <a class="" href="{{ route('admin.list.artikel.tiket') }}" title="">
                {{-- <i class=""><svg id="ab7" class="feather feather-zap" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg></i> --}}
                <i class="icofont-bullhorn"></i>
                Tiket
            </a>
        </li>

        <li>
            <a class="" href="{{ route('admin.list.artikel.promo') }}" title="">
                {{-- <i class=""><svg id="ab3" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></i> --}}
                <i class="icofont-bullhorn"></i>
                Promo
            </a>
        </li>

        <!-- <li>
            <a class="" href="{{ route('admin.promo.slide.list') }}" title="">
                {{-- <i class=""><svg id="ab3" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></i> --}}
                <i class="icofont-image"></i>
                Slide Promo
            </a>
        </li> -->

        <li>
            {{-- <li class="{{ setActive(['admin/master-pertanyaan', 'admin/master-pertanyaan/*'] ) }}"> --}}
            <a class="" href="{{ route('admin.list.artikel.faq') }}" title="">
                {{-- <i class=""><svg id="ab7" class="feather feather-zap" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg></i> --}}
                <i class="icofont-question"></i>
                FAQ
            </a>
        </li>

        <li>
            {{-- <li class="{{ setActive(['admin/master-pertanyaan', 'admin/master-pertanyaan/*'] ) }}"> --}}
            <a class="" href="{{ route('admin.kontak.kami.main') }}" title="">
                {{-- <i class=""><svg id="ab7" class="feather feather-zap" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg></i> --}}
                <i class="icofont-mail"></i>
                Pesan (Kontak Kami)
            </a>
        </li>
        <li>
            <a class="" href="{{ route('admin.list.user') }}" title="">
                <i class="icofont-users-alt-3"></i>
                User
            </a>
        </li>
        <li>
            <a class="" href="{{ route('admin.list.role') }}" title="">
                <i class="icofont-key"></i>
                Roles
            </a>
        </li>

    </ul>
</nav><!-- sidebar -->
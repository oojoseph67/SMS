<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

       

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li>
                    <a href="{{ route('home') }}">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('profile') }}">
                        <i data-feather="user"></i>
                        <span> User Profile </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarEcommerce" data-toggle="collapse">
                        <i data-feather="book"></i>
                        <span> Class </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="">Time Table</a>
                            </li>
                            <li>
                                <a href="{{route('list.subject')}}">List Of Subjects</a>
                            </li>
                            <li>
                                <a href="">Assignment</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="{{route('payment')}}">
                        <i data-feather="shopping-cart"></i>
                        <span> Payment </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('result.checker') }}">
                        <i data-feather="file-text"></i>
                        <span> Result Checker </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('exam') }}">
                        <i data-feather="clipboard"></i>
                        <span> Exam </span>
                    </a>
                </li>

                


                
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
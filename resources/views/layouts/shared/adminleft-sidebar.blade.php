<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

       

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li>
                    <a href="{{ route('admin.home') }}">
                        <i data-feather="calendar"></i>
                        <span> Admin Dashboard </span>
                    </a>
                </li>

                <!-- <li>
                    <a href="/admin/invoice/{{Auth::user()->fullname}}">
                        <i data-feather="calendar"></i>
                        <span> Invoice School Fees</span>
                    </a>
                </li> -->

                <li>
                    <a href="{{ route('admission.give') }}">
                        <i data-feather="calendar"></i>
                        <span> Admission </span>
                    </a>
                </li>
                                

                <li>
                    <a href="#sidebarEcommerce" data-toggle="collapse">
                        <i data-feather="shopping-cart"></i>
                        <span> SMS </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('timetable') }}">Time Table</a>
                            </li>
                            <li>
                                <a href="#sidebarMultilevel3" data-toggle="collapse">
                                    Student Management <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultilevel3">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('view.students') }}">View All Student</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- <li>
                                <a href="{{ route('view.teachers') }}">View All Teachers</a>
                            </li> -->                            
                            <!-- <li>
                                <a href="{{ route('createPage') }}">Create Subject</a>
                            </li> -->
                            <!-- <li>
                                <a href="{{ route('assign') }}">Assign Subject,Teacher & Classes</a>
                            </li> -->
                            <li>
                                <a href="#sidebarMultilevel3" data-toggle="collapse">
                                    Staff Management <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultilevel3">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('view.teachers') }}">View All Teachers</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('assign') }}">Assign Subject,Teacher & Classes</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="{{ route('view.subjects') }}">Subject Manager</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#sidebarMultilevel" data-toggle="collapse">
                        <i data-feather="share-2"></i>
                        <span> Payment </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMultilevel">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#sidebarMultilevel2" data-toggle="collapse">
                                    School Fees <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultilevel2">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('view.paidSchoolFee') }}">Paid Students</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('view.unpaidSchoolFee') }}">Unpaid Students</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#sidebarMultilevel2" data-toggle="collapse">
                                    PTA Fees <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultilevel2">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('view.paidPtaFee') }}">Paid Students</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('view.unpaidPtaFee') }}">Unpaid Students</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#sidebarMultilevel2" data-toggle="collapse">
                                    Lesson Fees <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultilevel2">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('view.paidLessonFee') }}">Paid Students</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('view.unpaidLessonFee') }}">Unpaid Students</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#sidebarMultilevel2" data-toggle="collapse">
                                    Reg Fees <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultilevel2">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('view.paidRegFee') }}">Paid Students</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('view.unpaidRegFee') }}">Unpaid Students</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                            

                <li>
                    <a href="{{route('result')}}">
                        <i data-feather="message-square"></i>
                        <span> Result Checker </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('result.calculator')}}">
                        <i data-feather="message-square"></i>
                        <span> Result Calculator </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('calender') }}">
                        <i data-feather="message-square"></i>
                        <span> Update School Calendar </span>
                    </a>
                </li>

                <li>
                    <a href="">
                        <i data-feather="message-square"></i>
                        <span> Post Notice </span>
                    </a>
                </li>

                <li>
                    <a href="">
                        <i data-feather="message-square"></i>
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
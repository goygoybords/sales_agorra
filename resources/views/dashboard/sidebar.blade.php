<!--sidebar start-->
        <aside>
            <div id="sidebar"  class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                        <a class="active" href="{{ url('/dashboard') }}">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-laptop"></i>
                            <span>Manage Clients</span>
                        </a>
                        <ul class="sub">
                            <li><a  href="{{ url('/newClient') }}">New Client</a></li>
                            <li><a  href="{{ url('/listClients') }}">List Clients</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-book"></i>
                            <span>Manage Proposal</span>
                        </a>
                        <ul class="sub">
                            <li><a  href="{{ url('/newProposal') }}">New Proposal</a></li>
                            <li><a  href="{{ url('/listProposal') }}">List Proposals</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-cogs"></i>
                            <span>Manage Sales</span>
                        </a>
                        <ul class="sub">
                            <li><a href="newSale.php">New Sales</a></li>
                            <li><a href="listSale.php">List Sales</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-tasks"></i>
                            <span>Reports</span>
                        </a>
                        <ul class="sub">
                            <li><a href="MonthlySaleVsQuota.php">Monthly Sale vs Quota</a></li>
                            <li><a href="commissionableSales.php">Commissionable Sales</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <!--sidebar end-->
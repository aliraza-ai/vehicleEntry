<?php
ob_start();
?>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text"class="form-control" readonly placeholder="Quick Search...">
                    <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>


            <li>
                <a href="#"><span class="glyphicon glyphicon-road" aria-hidden="true"></span> Driver<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="addDriver.php">Add Driver</a>
                    </li>
                    <li>
                        <a href="viewDriver.php">View Driver</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-industry" aria-hidden="true"></i>
                    Vendor<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="addVendor.php">Add Vendor</a>
                    </li>
                    <li>
                        <a href="viewVendor.php">View Vendor</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-car" aria-hidden="true"></i>
                    Vehicle<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="addBus.php">Add Vehicle</a>
                    </li>
                    <li>
                        <a href="viewBus.php">View Vehicle Record</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span> Entry<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="addEntry.php">Add Entry</a>
                    </li>
                    <li>
                        <a href="viewEntry.php">View Jobs</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i>

                    Account<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="addBalance.php">Add Vendor Balance</a>
                    </li>
                    <li>
                        <a href="addExpense.php">Add Personal Expense</a>
                    </li>
                    <li>
                        <a href="viewBalance.php">View Vendor Balance</a>
                    </li>
                    <li>
                        <a href="viewExpense.php">View Personal Expense</a>
                    </li>
                    <li>
                        <a href="readyStatement.php">Statement</a>
                    </li>


                </ul>
                <!-- /.nav-second-level -->
            </li>


            <li>
                <a href="#"><span class="fa fa-bar-chart fa-fw" aria-hidden="true"></span> Entry Report<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="entryReport.php">Overall</a>
                    </li>
                    <li>
                        <a href="readyVendorReport.php">Vendor Report</a>
                    </li>
                    <li>
                        <a href="readyPersonalReport.php">Personal Report</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>

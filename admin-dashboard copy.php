<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM client ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel - Submissions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f5f5f5;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>

    <h2>📋 All Contact Form Submissions</h2>

    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Subject</th>
            <th>Budget</th>
            <th>Message</th>
            <th>Date</th>
        </tr>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php $i = 1;
            while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= htmlspecialchars($row['fname']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['mob']) ?></td>
                    <td><?= htmlspecialchars($row['subject']) ?></td>
                    <td><?= htmlspecialchars($row['budget']) ?></td>
                    <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
                    <td><?= $row['created_at'] ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="8">No submissions found.</td>
            </tr>
        <?php endif; ?>

    </table>

</body>

</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <title>Dashboard</title>
    <link rel='stylesheet' href='https://www.psbi.site/assets/vendors/fullcalendar/lib/cupertino/jquery-ui.min.css' />
    <link rel='stylesheet' href='https://www.psbi.site/assets/vendors/fullcalendar/fullcalendar.css' />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.3/chart.min.js">
    <link rel="stylesheet" href="/assets/css/admin/responsive.css">

    <link rel="stylesheet" href="/assets/css/admin/style.css">
</head>

<body>

    <!-- sidebar section starts here


    <input type="checkbox" id="check">
    <label for="check">
        <i class="fa-solid fa-bars" id="btn"></i>
        <i class="fa-solid fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
        <header>
            <img src="images/PSBILogo.jpg" alt="" height="55px">
            <h2>PSBI</h2>
        </header>

        <ul>
            <li><a href="#"><i class="fa-solid fa-qrcode"></i>Dashboard</a></li>
            <li><a href="#"><i class="fa-solid fa-cubes"></i>Themes</a></li>
            <li><a href="#"><i class="fa-solid fa-language"></i>Language</a></li>
            <li><a href="#"><i class="fa-solid fa-user"></i>Administrator</a></li>
            <li><a href="#"><i class="fa-solid fa-tags"></i>Template</a></li>
            <li><a href="#"><i class="fa-solid fa-tty"></i>Front Office</a></li>
            <li><a href="#"><i class="fa-solid fa-institution"></i>Academic</a></li>
            <li><a href="#"><i class="fa-solid fa-bars"></i>Lesson Plan</a></li>
            <li><a href="#"><i class="fa-solid fa-clock"></i>Class Routine</a></li>
            <li><a href="#"><i class="fa-solid fa-paw"></i>Guardian</a></li>
            <li><a href="#"><i class="fa-solid fa-barcode"></i>Generate Card</a> </li>
            <li><a href="#"><i class="fa-solid fa-check-circle"></i>Attendance</a></li>
        </ul>


    </div>
         header section starts here -->



    <!-- dashboard section starts here -->


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">AdminHub</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="#">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='fa-solid fa-cubes'></i>
                    <span class="text">Theme</span>

                </a>
            </li>
            <li>
                <a href="#">
                    <i class='fa-solid fa-language'></i>
                    <span class="text">Language</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='fa-solid fa-user'></i>
                    <span class="text">Administrator</span>
                </a>
            </li>
            <li><a href="#"><i class="fa-solid fa-tty"></i><span class="text">Front Office</span></a></li>
            <li><a href="#"><i class="fa-solid fa-bell"></i><span class="text">Manage Leave</span></a></li>
            <li>
                <a href="Nopage.html">
                    <i class='fa-solid fa-institution'></i>
                    <span class="text">Academic</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-bars"></i>
                    <span class="text">Lesson Plan</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-clock"></i>
                    <span class="text"> Class Routine</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='fa-solid fa-paw'></i>
                    <span class="text">Guardian</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-user-group"></i>
                    <span class="text">Manage Student</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='fa-solid fa-check-circle'></i>
                    <span class="text">Attendance</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='fa-solid fa-barcode'></i>
                    <span class="text">Generate Card</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-arrow-pointer"></i>
                    <span class="text">Online Exam</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <span class="text">Manage Exam</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa-solid fa-file"></i>
                    <span class="text">Exam Mark</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa-solid fa-certificate"></i>
                    <span class="text">Certificate</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-book"></i>
                    <span class="text">Library</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-bus-simple"></i>
                    <span class="text">Transport</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-users"></i>
                    <span class="text">Scholarship</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span class="text">Events</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-calculator"></i>
                    <span class="text">Accounting</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-lock"></i>
                    <span class="text">Profile</span>
                </a>
            </li>



        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="#" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num"> </span>
            </a>
            <a href="#" class="profile">
                <img src="img/people.png">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="index.html">Home</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>

            <div class="dash">
                <div class="container">
                    <div class="box">
                        <div class="inner_cont">
                            <i style="font-size: 20px;" class="fa-solid fa-user"></i>Student

                        </div>
                        <p style="font-size: 20px; text-align: center;">854</p>
                    </div>

                    <div class="box">
                        <div class="inner_cont">
                            <i style="font-size: 20px;" class="fa-solid fa-paw"></i>Guardian

                        </div>
                        <p style="font-size: 20px; text-align: center;">857</p>
                    </div>

                    <div class="box">
                        <div class="inner_cont">
                            ₹Income

                        </div>
                        <p style="font-size: 20px; text-align: center; color: green;">21310.00</p>
                    </div>

                    <div class="box">
                        <div class="inner_cont">
                            ₹Expenditure

                        </div>
                        <p style="font-size: 20px; text-align: center; color: red;">0.00</p>
                    </div>
                </div>
            </div>


            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <div class="calender1">

                            <table>
                                <tr>
                                    <th>Sun</th>
                                    <th>Mon</th>
                                    <th>Tue</th>
                                    <th>Wed</th>
                                    <th>Thu</th>
                                    <th>Fri</th>
                                    <th>Sat</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>


                                </tr>

                                <tr>
                                    <td>6</td>
                                    <td>7</td>
                                    <td>8</td>
                                    <td>9</td>
                                    <td>10</td>
                                    <td>11</td>
                                    <td>12</td>


                                </tr>

                                <tr>
                                    <td>13</td>
                                    <td>14</td>
                                    <td>15</td>
                                    <td>16</td>
                                    <td>17</td>
                                    <td>18</td>
                                    <td>19</td>


                                </tr>

                                <tr>
                                    <td>20</td>
                                    <td>21</td>
                                    <td>22</td>
                                    <td>23</td>
                                    <td>24</td>
                                    <td>25</td>
                                    <td>26</td>


                                </tr>

                                <tr>
                                    <td>27</td>
                                    <td>28</td>
                                    <td>29</td>
                                    <td>30</td>
                                    <td>31</td>
                                    <td></td>
                                    <td></td>


                                </tr>
                            </table>
                        </div>

                    </div>


                </div>
                <div class="todo">

                </div>
            </div>
        </main>
        <!-- MAIN -->

        <footer>
            <div class="end">
                <div class="end_cont">
                    <a>Copyright © 2023 PSBI. All rights reserved.


                    </a>
                </div>
            </div>
        </footer>
    </section>
    <!-- CONTENT -->


    <script>
        const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

        allSideMenu.forEach(item => {
            const li = item.parentElement;

            item.addEventListener('click', function() {
                allSideMenu.forEach(i => {
                    i.parentElement.classList.remove('active');
                })
                li.classList.add('active');
            })
        });

        // TOGGLE SIDEBAR
        const menuBar = document.querySelector('#content nav .bx.bx-menu');
        const sidebar = document.getElementById('sidebar');

        menuBar.addEventListener('click', function() {
            sidebar.classList.toggle('hide');
        })

        const searchButton = document.querySelector('#content nav form .form-input button');
        const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
        const searchForm = document.querySelector('#content nav form');

        searchButton.addEventListener('click', function(e) {
            if (window.innerWidth < 576) {
                e.preventDefault();
                searchForm.classList.toggle('show');
                if (searchForm.classList.contains('show')) {
                    searchButtonIcon.classList.replace('bx-search', 'bx-x');
                } else {
                    searchButtonIcon.classList.replace('bx-x', 'bx-search');
                }
            }
        })





        if (window.innerWidth < 768) {
            sidebar.classList.add('hide');
        } else if (window.innerWidth > 576) {
            searchButtonIcon.classList.replace('bx-x', 'bx-search');
            searchForm.classList.remove('show');
        }


        window.addEventListener('resize', function() {
            if (this.innerWidth > 576) {
                searchButtonIcon.classList.replace('bx-x', 'bx-search');
                searchForm.classList.remove('show');
            }
        })



        const switchMode = document.getElementById('switch-mode');

        switchMode.addEventListener('change', function() {
            if (this.checked) {
                document.body.classList.add('dark');
            } else {
                document.body.classList.remove('dark');
            }
        })
    </script>

    <script src="
    https://cdn.jsdelivr.net/npm/chart.js@4.3.3/dist/chart.umd.min.js
    "></script>
    <script src="/assets/js/script.js"></script>


</body>

</html>
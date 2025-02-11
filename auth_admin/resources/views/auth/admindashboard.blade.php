<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Administrative dashboard for managing seating arrangements, exams, and institutional resources">
    <meta name="theme-color" content="#ffffff">
    <title>Admin Dashboard - Seating Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
    <!-- Header Section with ARIA Landmarks -->
    <header class="admin-header" role="banner">
        <div class="header-content">
            <h1 class="logo">
                <span role="img" aria-label="Seating Management System">📊</span>
                Admin Dashboard
            </h1>
            <nav class="main-nav" role="navigation" aria-label="Primary Navigation">
                <ul role="menubar" aria-orientation="horizontal">
                    <li role="none">
                        <a href="#" class="active" role="menuitem" aria-current="page">
                            <i class="fas fa-home" aria-hidden="true"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li role="none">
                        <a href="#" role="menuitem">
                            <i class="fas fa-info-circle" aria-hidden="true"></i>
                            <span>About Us</span>
                        </a>
                    </li>
                    <li role="none">
                        <a href="#" role="menuitem">
                            <i class="fas fa-envelope" aria-hidden="true"></i>
                            <span>Contact Us</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Container with Sidebar and Content -->
    <div class="container">
        <!-- Sidebar Navigation with Enhanced Accessibility -->
        <aside class="sidebar" role="complementary" aria-label="Management Menu">
            <nav class="side-nav" aria-label="Administrative Controls">
                <ul role="menu">
                    <!-- Teachers Management -->
                    <li role="none" class="has-submenu">
                        <a href="#teachers-management" role="menuitem" 
                           aria-expanded="false" 
                           aria-controls="teachers-submenu"
                           aria-haspopup="true">
                            <i class="fas fa-chalkboard-teacher" aria-hidden="true"></i>
                            <span>Teachers Management</span>
                        </a>
                        <ul id="teachers-submenu" class="submenu" role="menu" 
                            aria-label="Teachers Submenu" hidden>
                            <li role="none">
                                <a href="#add-teacher" role="menuitem" tabindex="-1">
                                    <i class="fas fa-plus-circle" aria-hidden="true"></i>
                                    <span>Add Teacher</span>
                                </a>
                            </li>
                            <li role="none">
                                <a href="#view-teachers" role="menuitem" tabindex="-1">
                                    <i class="fas fa-list" aria-hidden="true"></i>
                                    <span>View Teachers</span>
                                </a>
                            </li>
                            <li role="none">
                                <a href="#delete-teacher" role="menuitem" tabindex="-1">
                                    <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                    <span>Delete Teacher</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Students Management -->
                    <li role="none" class="has-submenu">
                        <a href="#students-management" role="menuitem" 
                           aria-expanded="false" 
                           aria-controls="students-submenu"
                           aria-haspopup="true">
                            <i class="fas fa-users" aria-hidden="true"></i>
                            <span>Students Management</span>
                        </a>
                        <ul id="students-submenu" class="submenu" role="menu" 
                            aria-label="Students Submenu" hidden>
                            <li role="none">
                                <a href="#add-student" role="menuitem" tabindex="-1">
                                    <i class="fas fa-plus-circle" aria-hidden="true"></i>
                                    <span>Add Student</span>
                                </a>
                            </li>
                            <li role="none">
                                <a href="#view-students" role="menuitem" tabindex="-1">
                                    <i class="fas fa-list" aria-hidden="true"></i>
                                    <span>View by Class/Semester</span>
                                </a>
                            </li>
                            <li role="none">
                                <a href="#delete-student" role="menuitem" tabindex="-1">
                                    <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                    <span>Delete Student</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Room Management -->
                    <li role="none" class="has-submenu">
                        <a href="#room-management" role="menuitem" 
                           aria-expanded="false" 
                           aria-controls="room-submenu"
                           aria-haspopup="true">
                            <i class="fas fa-building" aria-hidden="true"></i>
                            <span>Room Management</span>
                        </a>
                        <ul id="room-submenu" class="submenu" role="menu" 
                            aria-label="Room Submenu" hidden>
                            <li role="none">
                                <a href="#add-room" role="menuitem" tabindex="-1">
                                    <i class="fas fa-plus-circle" aria-hidden="true"></i>
                                    <span>Add Room</span>
                                </a>
                            </li>
                            <li role="none">
                                <a href="#view-rooms" role="menuitem" tabindex="-1">
                                    <i class="fas fa-list" aria-hidden="true"></i>
                                    <span>View Rooms</span>
                                </a>
                            </li>
                            <li role="none">
                                <a href="#delete-room" role="menuitem" tabindex="-1">
                                    <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                    <span>Delete Room</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li role="none" class="has-submenu">
                        <a href="#course-management" role="menuitem" 
                           aria-expanded="false" 
                           aria-controls="course-submenu"
                           aria-haspopup="true">
                            <i class="fas fa-book" aria-hidden="true"></i>
                            <span>Course Management</span>
                        </a>
                        <ul id="course-submenu" class="submenu" role="menu" 
                            aria-label="Course Submenu" hidden>
                            <li role="none">
                                <a href="#add-course" role="menuitem" tabindex="-1">
                                    <i class="fas fa-plus-circle" aria-hidden="true"></i>
                                    <span>Add Course</span>
                                </a>
                            </li>
                            <li role="none">
                                <a href="#view-courses" role="menuitem" tabindex="-1">
                                    <i class="fas fa-list" aria-hidden="true"></i>
                                    <span>View Courses</span>
                                </a>
                            </li>
                            <li role="none">
                                <a href="#delete-course" role="menuitem" tabindex="-1">
                                    <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                    <span>Delete Course</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    
                    
                    <li role="none">
                        <a href="#conflict-management" role="menuitem">
                            <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
                            <span>Conflict Management</span>
                        </a>
                    </li>
                    <li role="none">
                        <a href="#seating-chart" role="menuitem">
                            <i class="fas fa-chair" aria-hidden="true"></i>
                            <span>Seating Chart Generation</span>
                        </a>
                    </li>

                    <!-- Settings -->
                    <li role="none" class="has-submenu">
                        <a href="#settings" role="menuitem" 
                           aria-expanded="false" 
                           aria-controls="settings-submenu"
                           aria-haspopup="true">
                            <i class="fas fa-cog" aria-hidden="true"></i>
                            <span>Settings</span>
                        </a>
                        <ul id="settings-submenu" class="submenu" role="menu" 
                            aria-label="Settings Submenu" hidden>
                            <li role="none">
                                <a href="#website-settings" role="menuitem" tabindex="-1">
                                    <i class="fas fa-wrench" aria-hidden="true"></i>
                                    <span>Website Management</span>
                                </a>
                            </li>
                            <li role="none">
                                <a href="#logout" role="menuitem" tabindex="-1">
                                    <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                    <span>Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content Area with ARIA Regions -->
        <main class="main-content" role="main" aria-live="polite">
            <!-- Home Section -->
            <section id="home" class="tab-content active" role="region" 
                     aria-labelledby="home-heading" tabindex="0">
                <h2 id="home-heading">
                    <i class="fas fa-tachometer-alt" aria-hidden="true"></i>
                    Dashboard Overview
                </h2>
                <div class="dashboard-stats">
                    <div class="stat-card" role="status" aria-live="polite">
                        <h3>Total Teachers</h3>
                        <p id="total-teachers" aria-label="Current teacher count">0</p>
                    </div>
                    <div class="stat-card" role="status" aria-live="polite">
                        <h3>Total Students</h3>
                        <p id="total-students" aria-label="Current student count">0</p>
                    </div>
                    <div class="stat-card" role="status" aria-live="polite">
                        <h3>Available Rooms</h3>
                        <p id="total-rooms" aria-label="Current room count">0</p>
                    </div>
                </div>
            </section>

            <!-- Teachers Management Section -->
            <section id="teachers-management" class="tab-content" role="region" 
                     aria-labelledby="teachers-heading" hidden>
                <h2 id="teachers-heading">
                    <i class="fas fa-chalkboard-teacher" aria-hidden="true"></i>
                    Teachers Management
                </h2>
                
                <!-- Add Teacher Form -->
                <div id="add-teacher" class="subtab-content active" role="tabpanel" 
                     aria-labelledby="add-teacher-tab">
                    <form id="add-teacher-form" aria-label="Add teacher form">
                        <div class="form-group">
                            <label for="teacher-name">Full Name:</label>
                            <input type="text" id="teacher-name" required
                                   pattern="[A-Za-z ]{3,50}"
                                   aria-describedby="name-help">
                            <small id="name-help" class="form-help">
                                (3-50 characters, letters only)
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="teacher-email">Email:</label>
                            <input type="email" id="teacher-email" required
                                   aria-describedby="email-help">
                            <small id="email-help" class="form-help">
                                Valid institutional email required
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="teacher-department">Department:</label>
                            <select id="teacher-department" required>
                                <option value="">Select Department</option>
                                <option value="computer">Computer Science</option>
                                <option value="electrical">Maths</option>
                                <option value="mechanical">Physics</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-user-plus" aria-hidden="true"></i>
                            <span>Add Teacher</span>
                        </button>
                    </form>
                </div>

                <!-- View Teachers Table -->
                <div id="view-teachers" class="subtab-content" role="tabpanel" 
                     aria-labelledby="view-teachers-tab" hidden>
                    <h3>Teacher List</h3>
                    <div class="search-box">
                        <label for="search-teachers" class="sr-only">Search teachers</label>
                        <input type="text" id="search-teachers" 
                               placeholder="Search teachers..."
                               aria-label="Search teachers input">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </div>
                    <table class="data-table" aria-label="Teachers list">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Department</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="teachers-table-body">
                            <!-- Dynamic content -->
                        </tbody>
                    </table>
                </div>

                <!-- Delete Teacher Form -->
                <div id="delete-teacher" class="subtab-content" role="tabpanel" 
                     aria-labelledby="delete-teacher-tab" hidden>
                    <form id="delete-teacher-form" aria-label="Delete teacher form">
                        <div class="form-group">
                            <label for="teacher-id">Teacher ID:</label>
                            <input type="text" id="teacher-id" required
                                   pattern="T\d{3,}"
                                   aria-describedby="id-help">
                            <small id="id-help" class="form-help">
                                Enter valid Teacher ID (e.g., T123)
                            </small>
                        </div>
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt" aria-hidden="true"></i>
                            <span>Delete Teacher</span>
                        </button>
                    </form>
                </div>
            </section>
            <section id="course-management" class="tab-content" role="region" 
                     aria-labelledby="course-management-heading" hidden>
                <h2 id="course-management-heading">
                    <i class="fas fa-book" aria-hidden="true"></i>
                    Course Management
                </h2>
                
                <!-- Add Course Form -->
                <div id="add-course" class="subtab-content active" role="tabpanel" 
                     aria-labelledby="add-course-tab">
                    <form id="add-course-form" aria-label="Add course form">
                        <div class="form-group">
                            <label for="course-code">Course Code:</label>
                            <input type="text" id="course-code" required
                                   pattern="[A-Z]{3}\d{3}"
                                   aria-describedby="code-help">
                            <small id="code-help" class="form-help">
                                (Format: ABC123, 3 letters followed by 3 numbers)
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="course-name">Course Name:</label>
                            <input type="text" id="course-name" required
                                   aria-describedby="name-help">
                            <small id="name-help" class="form-help">
                                Enter full course name (e.g., Introduction to Computer Science)
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="course-credits">Credits:</label>
                            <select id="course-credits" required>
                                <option value="">Select Credits</option>
                                <option value="1">1 Credit</option>
                                <option value="2">2 Credits</option>
                                <option value="3">3 Credits</option>
                                <option value="4">4 Credits</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-book-medical" aria-hidden="true"></i>
                            <span>Add Course</span>
                        </button>
                    </form>
                </div>

                <!-- View Courses Table -->
                <div id="view-courses" class="subtab-content" role="tabpanel" 
                     aria-labelledby="view-courses-tab" hidden>
                    <h3>Course List</h3>
                    <div class="search-box">
                        <label for="search-courses" class="sr-only">Search courses</label>
                        <input type="text" id="search-courses" 
                               placeholder="Search courses..."
                               aria-label="Search courses input">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </div>
                    <table class="data-table" aria-label="Courses list">
                        <thead>
                            <tr>
                                <th scope="col">Code</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Credits</th>
                                <th scope="col">Enrolled Students</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="courses-table-body">
                            <!-- Dynamic content -->
                        </tbody>
                    </table>
                </div>

                <!-- Delete Course Form -->
                <div id="delete-course" class="subtab-content" role="tabpanel" 
                     aria-labelledby="delete-course-tab" hidden>
                    <form id="delete-course-form" aria-label="Delete course form">
                        <div class="form-group">
                            <label for="course-id">Course Code:</label>
                            <input type="text" id="course-id" required
                                   pattern="[A-Z]{3}\d{3}"
                                   aria-describedby="delete-help">
                            <small id="delete-help" class="form-help">
                                Enter course code to delete (e.g., CSC101)
                            </small>
                        </div>
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt" aria-hidden="true"></i>
                            <span>Delete Course</span>
                        </button>
                    </form>
                </div>
            </section>

            
            <!-- Enhanced Seating Chart Generation Section -->
            <section id="seating-chart" class="tab-content" role="region" 
                     aria-labelledby="seating-chart-heading" hidden>
                <h2 id="seating-chart-heading">
                    <i class="fas fa-chair" aria-hidden="true"></i>
                    Seating Chart Generation
                </h2>
                
                <div class="seating-controls">
                    <form id="seating-config-form" aria-label="Seating configuration">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="exam-selection">Select Exam:</label>
                                <select id="exam-selection" required 
                                    aria-describedby="exam-help"
                                    data-dynamic="exams">
                                    <option value="">Choose Exam</option>
                                    <!-- Dynamic options from exams -->
                                </select>
                                <small id="exam-help" class="form-help">
                                    Select exam from scheduled list
                                </small>
                            </div>
                            
                            <div class="form-group">
                                <label for="course-filter">Filter by Course:</label>
                                <select id="course-filter" 
                                    aria-describedby="course-help"
                                    data-dynamic="courses">
                                    <option value="all">All Courses</option>
                                    <!-- Dynamic course options -->
                                </select>
                                <small id="course-help" class="form-help">
                                    Filter students by course
                                </small>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="room-selection">Available Rooms:</label>
                                <select id="room-selection" required 
                                    aria-describedby="room-help"
                                    data-dynamic="rooms">
                                    <option value="">Select Room</option>
                                    <!-- Dynamic room options -->
                                </select>
                                <small id="room-help" class="form-help">
                                    Rooms updated from Room Management
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="time-slot">Time Slot:</label>
                                <select id="time-slot" required
                                    aria-describedby="time-help">
                                    <option value="">Select Time</option>
                                    <option value="morning">Morning (9:00 AM)</option>
                                    <option value="afternoon">Afternoon (2:00 PM)</option>
                                    <option value="evening">Evening (5:00 PM)</option>
                                </select>
                                <small id="time-help" class="form-help">
                                    Multiple exams can share time slots
                                </small>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" id="preview-btn" class="btn btn-secondary">
                                <i class="fas fa-eye" aria-hidden="true"></i>
                                Preview Arrangement
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-magic" aria-hidden="true"></i>
                                Generate Seating Chart
                            </button>
                        </div>
                    </form>
                </div>

                <div class="seating-results" aria-live="polite">
                    <div id="room-layout-preview" class="room-layout">
                        <h3>Room Layout Visualization</h3>
                        <div class="room-grid" data-room-id="" aria-label="Seating layout">
                            <!-- Dynamic grid based on selected room -->
                        </div>
                    </div>

                    <div id="student-assignment-list" class="assignment-list">
                        <h3>Student Assignments</h3>
                        <table class="data-table" aria-label="Student seating assignments">
                            <thead>
                                <tr>
                                    <th scope="col">Student ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Room</th>
                                    <th scope="col">Seat Number</th>
                                </tr>
                            </thead>
                            <tbody id="assignment-table-body">
                                <!-- Dynamic assignment data -->
                            </tbody>
                        </table>
                    </div>

                    <div class="export-options">
                        <button type="button" class="btn btn-export" data-format="pdf">
                            <i class="fas fa-file-pdf" aria-hidden="true"></i>
                            Export PDF
                        </button>
                        <button type="button" class="btn btn-export" data-format="excel">
                            <i class="fas fa-file-excel" aria-hidden="true"></i>
                            Export Excel
                        </button>
                        <button type="button" class="btn btn-export" data-format="print">
                            <i class="fas fa-print" aria-hidden="true"></i>
                            Print Layout
                        </button>
                    </div>
                </div>
            </section>

            <!-- Existing Settings section remains unchanged -->
            <!-- ... -->


        </main>
    </div>

    <!-- Scripts with Security Features -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js" 
            integrity="sha512-X3SP8ZQD7V3zBk2vU1SEZ5/7T1W340iUOkH8wVsXp9VhN3qwXqJ7thGwEaIqmCq1nKCAUn5FZnp2AmKjSudYRA==" 
            crossorigin="anonymous" 
            referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js" 
            integrity="sha512-m/Sn1k2pwqOgeH8ThROnXhL+Ul3Q4IyrgE0/S6o8F6z7O1tDil7iXJNn4th4L7qbzjcdECAx4T46r3XRpmHvA==" 
            crossorigin="anonymous" 
            referrerpolicy="no-referrer"></script>
    <script src="script.js" nonce="2726c7f26c98"></script>

    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit">Logout</button>
    </form>
    
</body>
</html> 
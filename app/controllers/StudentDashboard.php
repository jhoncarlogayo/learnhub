<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentDashboard extends Controller {
    
    private $dashboardModel;
    
    public function __construct() {
        parent::__construct();
        $this->dashboardModel = $this->model('StudentDashboard_model');
    }

    /**
     * Overview/Home page for student dashboard
     */
    public function overview() {
        // Check if student is logged in
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
            header('Location: /login');
            exit;
        }

        $student_id = $_SESSION['user_id'];

        // Get all required data
        $student = $this->dashboardModel->get_student_profile($student_id);
        $enrolled_courses = $this->dashboardModel->get_enrolled_courses($student_id);
        $recommended_courses = $this->dashboardModel->get_recommended_courses($student_id);
        $trending_courses = $this->dashboardModel->get_trending_courses();
        $announcements = $this->dashboardModel->get_latest_announcements();

        // Add progress data to enrolled courses
        foreach ($enrolled_courses as &$course) {
            $course['progress'] = $this->dashboardModel->get_course_progress($student_id, $course['id']);
        }

        // Prepare data for view
        $data = [
            'student' => $student,
            'enrolled_courses' => $enrolled_courses,
            'recommended_courses' => $recommended_courses,
            'trending_courses' => $trending_courses,
            'announcements' => $announcements,
            'page_title' => 'Dashboard Overview'
        ];

        $this->view('student_overview', $data);
    }

    /**
     * Main dashboard redirect to overview
     */
    public function index() {
        $this->overview();
    }
}
?>

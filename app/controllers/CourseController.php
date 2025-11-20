<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class CourseController extends Controller {
    
    private $courseModel;
    
    public function __construct() {
        parent::__construct();
        $this->courseModel = $this->model('Course');
    }

    /**
     * List all courses for the logged-in instructor
     */
    public function index() {
        // Check if instructor is logged in
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'instructor') {
            header('Location: /login');
            exit;
        }

        $instructor_id = $_SESSION['user_id'];
        $courses = $this->courseModel->getCoursesByInstructor($instructor_id);
        
        $this->view('course_management', ['courses' => $courses]);
    }

    /**
     * Show create course form
     */
    public function create() {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'instructor') {
            header('Location: /login');
            exit;
        }

        $this->view('course_create');
    }

    /**
     * Store new course
     */
    public function store() {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'instructor') {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /course-management');
            exit;
        }

        // Validate input
        $errors = $this->validateCourseData($_POST);

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old_input'] = $_POST;
            header('Location: /course-management/create');
            exit;
        }

        $data = [
            'title' => trim($_POST['title']),
            'description' => trim($_POST['description']),
            'price' => floatval($_POST['price']),
            'category' => trim($_POST['category']),
            'level' => $_POST['level'],
            'instructor_id' => $_SESSION['user_id'],
            'status' => $_POST['status'] ?? 'draft'
        ];

        $course_id = $this->courseModel->createCourse($data);

        if ($course_id) {
            $_SESSION['success'] = 'Course created successfully!';
            header('Location: /course-management');
        } else {
            $_SESSION['error'] = 'Failed to create course. Please try again.';
            header('Location: /course-management/create');
        }
        exit;
    }

    /**
     * Show edit course form
     */
    public function edit($course_id) {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'instructor') {
            header('Location: /login');
            exit;
        }

        $course = $this->courseModel->getCourseById($course_id, $_SESSION['user_id']);

        if (!$course) {
            $_SESSION['error'] = 'Course not found or access denied.';
            header('Location: /course-management');
            exit;
        }

        $modules = $this->courseModel->getCourseModules($course_id);

        $this->view('course_edit', [
            'course' => $course,
            'modules' => $modules
        ]);
    }

    /**
     * Update course
     */
    public function update($course_id) {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'instructor') {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /course-management');
            exit;
        }

        // Validate input
        $errors = $this->validateCourseData($_POST);

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old_input'] = $_POST;
            header('Location: /course-management/edit/' . $course_id);
            exit;
        }

        $data = [
            'title' => trim($_POST['title']),
            'description' => trim($_POST['description']),
            'price' => floatval($_POST['price']),
            'category' => trim($_POST['category']),
            'level' => $_POST['level'],
            'status' => $_POST['status']
        ];

        $result = $this->courseModel->updateCourse($course_id, $data, $_SESSION['user_id']);

        if ($result) {
            $_SESSION['success'] = 'Course updated successfully!';
        } else {
            $_SESSION['error'] = 'Failed to update course. Please try again.';
        }

        header('Location: /course-management/edit/' . $course_id);
        exit;
    }

    /**
     * Delete course
     */
    public function delete($course_id) {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'instructor') {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /course-management');
            exit;
        }

        $result = $this->courseModel->deleteCourse($course_id, $_SESSION['user_id']);

        if ($result) {
            $_SESSION['success'] = 'Course deleted successfully!';
        } else {
            $_SESSION['error'] = 'Failed to delete course. Please try again.';
        }

        header('Location: /course-management');
        exit;
    }

    /**
     * Toggle course visibility
     */
    public function toggleVisibility($course_id) {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'instructor') {
            header('Location: /login');
            exit;
        }

        $result = $this->courseModel->toggleVisibility($course_id, $_SESSION['user_id']);

        if ($result) {
            $_SESSION['success'] = 'Course visibility updated successfully!';
        } else {
            $_SESSION['error'] = 'Failed to update course visibility.';
        }

        header('Location: /course-management');
        exit;
    }

    /**
     * Create module
     */
    public function createModule($course_id) {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'instructor') {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /course-management/edit/' . $course_id);
            exit;
        }

        // Verify course ownership
        $course = $this->courseModel->getCourseById($course_id, $_SESSION['user_id']);
        if (!$course) {
            $_SESSION['error'] = 'Course not found or access denied.';
            header('Location: /course-management');
            exit;
        }

        $data = [
            'course_id' => $course_id,
            'title' => trim($_POST['title']),
            'description' => trim($_POST['description']),
            'order_index' => intval($_POST['order_index'] ?? 1)
        ];

        $module_id = $this->courseModel->createModule($data);

        if ($module_id) {
            $_SESSION['success'] = 'Module created successfully!';
        } else {
            $_SESSION['error'] = 'Failed to create module.';
        }

        header('Location: /course-management/edit/' . $course_id);
        exit;
    }

    /**
     * Update module
     */
    public function updateModule($course_id, $module_id) {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'instructor') {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /course-management/edit/' . $course_id);
            exit;
        }

        $data = [
            'title' => trim($_POST['title']),
            'description' => trim($_POST['description']),
            'order_index' => intval($_POST['order_index'])
        ];

        $result = $this->courseModel->updateModule($module_id, $data, $course_id);

        if ($result) {
            $_SESSION['success'] = 'Module updated successfully!';
        } else {
            $_SESSION['error'] = 'Failed to update module.';
        }

        header('Location: /course-management/edit/' . $course_id);
        exit;
    }

    /**
     * Delete module
     */
    public function deleteModule($course_id, $module_id) {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'instructor') {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /course-management/edit/' . $course_id);
            exit;
        }

        $result = $this->courseModel->deleteModule($module_id, $course_id);

        if ($result) {
            $_SESSION['success'] = 'Module deleted successfully!';
        } else {
            $_SESSION['error'] = 'Failed to delete module.';
        }

        header('Location: /course-management/edit/' . $course_id);
        exit;
    }

    /**
     * Create lesson
     */
    public function createLesson($course_id, $module_id) {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'instructor') {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /course-management/edit/' . $course_id);
            exit;
        }

        $data = [
            'module_id' => $module_id,
            'title' => trim($_POST['title']),
            'content' => trim($_POST['content']),
            'video_url' => trim($_POST['video_url']),
            'duration' => intval($_POST['duration']),
            'order_index' => intval($_POST['order_index'] ?? 1)
        ];

        $lesson_id = $this->courseModel->createLesson($data);

        if ($lesson_id) {
            $_SESSION['success'] = 'Lesson created successfully!';
        } else {
            $_SESSION['error'] = 'Failed to create lesson.';
        }

        header('Location: /course-management/edit/' . $course_id);
        exit;
    }

    /**
     * Update lesson
     */
    public function updateLesson($course_id, $module_id, $lesson_id) {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'instructor') {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /course-management/edit/' . $course_id);
            exit;
        }

        $data = [
            'title' => trim($_POST['title']),
            'content' => trim($_POST['content']),
            'video_url' => trim($_POST['video_url']),
            'duration' => intval($_POST['duration']),
            'order_index' => intval($_POST['order_index'])
        ];

        $result = $this->courseModel->updateLesson($lesson_id, $data, $module_id);

        if ($result) {
            $_SESSION['success'] = 'Lesson updated successfully!';
        } else {
            $_SESSION['error'] = 'Failed to update lesson.';
        }

        header('Location: /course-management/edit/' . $course_id);
        exit;
    }

    /**
     * Delete lesson
     */
    public function deleteLesson($course_id, $module_id, $lesson_id) {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'instructor') {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /course-management/edit/' . $course_id);
            exit;
        }

        $result = $this->courseModel->deleteLesson($lesson_id, $module_id);

        if ($result) {
            $_SESSION['success'] = 'Lesson deleted successfully!';
        } else {
            $_SESSION['error'] = 'Failed to delete lesson.';
        }

        header('Location: /course-management/edit/' . $course_id);
        exit;
    }

    /**
     * Validate course data
     */
    private function validateCourseData($data) {
        $errors = [];

        if (empty(trim($data['title']))) {
            $errors['title'] = 'Course title is required.';
        } elseif (strlen(trim($data['title'])) < 3) {
            $errors['title'] = 'Course title must be at least 3 characters long.';
        }

        if (empty(trim($data['description']))) {
            $errors['description'] = 'Course description is required.';
        } elseif (strlen(trim($data['description'])) < 10) {
            $errors['description'] = 'Course description must be at least 10 characters long.';
        }

        if (!isset($data['price']) || !is_numeric($data['price']) || $data['price'] < 0) {
            $errors['price'] = 'Valid price is required.';
        }

        if (empty(trim($data['category']))) {
            $errors['category'] = 'Course category is required.';
        }

        if (!in_array($data['level'], ['beginner', 'intermediate', 'advanced'])) {
            $errors['level'] = 'Invalid course level selected.';
        }

        return $errors;
    }
}
?>

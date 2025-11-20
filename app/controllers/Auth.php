<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

require_once ROOT_DIR . 'vendor/autoload.php';

class Auth extends Controller {
	public function register() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			session_start();
			$_SESSION['name'] = $_POST['name'];
			$_SESSION['role'] = isset($_POST['role']) ? $_POST['role'] : 'student';
			header('Location: /register-success');
			exit;
		}
		$this->call->view('register');
	}

	public function login() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Handle login logic here
			session_start();
			$_SESSION['email'] = $_POST['email']; // Store email in session
			$_SESSION['name'] = $_POST['email']; // Use email as name for regular login
			$role = isset($_POST['role']) ? $_POST['role'] : 'student';
			$_SESSION['role'] = $role; // Store role in session

			if ($role === 'instructor') {
				header('Location: /instructor-dashboard');
			} else {
				header('Location: /dashboard');
			}
			exit;
		}
		$this->call->view('login');
	}

	public function google_login() {
		$client = new Google_Client();
		$client->setClientId(config_item('google_client_id'));
		$client->setClientSecret(config_item('google_client_secret'));
		$client->setRedirectUri(config_item('google_redirect_uri'));
		$client->addScope("email");
		$client->addScope("profile");

		$auth_url = $client->createAuthUrl();
		header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
		exit;
	}

	public function google_callback() {
		try {
			$client = new Google_Client();
			$client->setClientId(config_item('google_client_id'));
			$client->setClientSecret(config_item('google_client_secret'));
			$client->setRedirectUri(config_item('google_redirect_uri'));

			if (isset($_GET['code'])) {
				$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

				if (!isset($token['error'])) {
					$client->setAccessToken($token['access_token']);

					$google_oauth = new Google_Service_Oauth2($client);
					$google_account_info = $google_oauth->userinfo->get();

					session_start();
					$_SESSION['google_id'] = $google_account_info->id;
					$_SESSION['name'] = $google_account_info->name;
					$_SESSION['email'] = $google_account_info->email;
					$_SESSION['picture'] = $google_account_info->picture;
					$_SESSION['role'] = 'student'; // Default role, can be modified

					header('Location: /dashboard');
					exit;
				} else {
					// Handle error
					header('Location: /login?error=google_auth_failed');
					exit;
				}
			} else {
				header('Location: /login');
				exit;
			}
		} catch (Exception $e) {
			// Log the error and redirect
			error_log('Google OAuth callback error: ' . $e->getMessage());
			header('Location: /login?error=google_auth_failed');
			exit;
		}
	}

	public function dashboard() {
		session_start();
		if (!isset($_SESSION['email'])) {
			header('Location: /login');
			exit;
		}
		$this->call->view('student_dashboard');
	}

	public function instructor_dashboard() {
		session_start();
		if (!isset($_SESSION['email'])) {
			header('Location: /login');
			exit;
		}
		$this->call->view('instructor_dashboard');
	}

	public function register_success() {
		$this->call->view('register_success');
	}

	public function students_management() {
		session_start();
		if (!isset($_SESSION['email'])) {
			header('Location: /login');
			exit;
		}
		$this->call->view('students_management');
	}

	public function course_management() {
		session_start();
		if (!isset($_SESSION['email'])) {
			header('Location: /login');
			exit;
		}
		$this->call->view('course_management');
	}

	public function assessments() {
		session_start();
		if (!isset($_SESSION['email'])) {
			header('Location: /login');
			exit;
		}
		$this->call->view('assessments');
	}

	public function discussions() {
		session_start();
		if (!isset($_SESSION['email'])) {
			header('Location: /login');
			exit;
		}
		$this->call->view('discussions');
	}

	public function reviews() {
		session_start();
		if (!isset($_SESSION['email'])) {
			header('Location: /login');
			exit;
		}
		$this->call->view('reviews');
	}

	public function profile() {
		session_start();
		if (!isset($_SESSION['email'])) {
			header('Location: /login');
			exit;
		}
		$this->call->view('profile');
	}

	public function earnings() {
		session_start();
		if (!isset($_SESSION['email'])) {
			header('Location: /login');
			exit;
		}
		$this->call->view('earnings');
	}

	public function logout() {
		session_start();
		session_destroy();
		header('Location: /');
		exit;
	}
}
?>

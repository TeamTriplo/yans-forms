<?php
/**
 *
 * URL: www.freecontactform.com
 *
 * Version: FreeContactForm Free V2.2
 *
 * Copyright (c) 2013 Stuart Cochrane
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 *
 * Note: This is NOT the same code as the PRO version
 *
 */

if (isset($_POST['Email_Address'])) {

	include 'freecontactformsettings.php';

	function died($error) {
		echo "Sorry, but there were error(s) found with the form you submitted. ";
		echo "These errors appear below.<br /><br />";
		echo $error."<br /><br />";
		echo "Please go back and fix these errors.<br /><br />";
		die();
	}

	if (!isset($_POST['First_Name']) ||
		!isset($_POST['Last_Name']) ||
		!isset($_POST['Email_Address']) ||
		!isset($_POST['Telephone_Number']) ||
		!isset($_POST['Subject']) ||
		!isset($_POST['Message'])
	) {
		died('Sorry, there appears to be a problem with your form submission.');
	}

	$first_name = $_POST['First_Name'];// required
	$last_name  = $_POST['Last_Name'];// required
	$email_from = $_POST['Email_Address'];// required
	$telephone  = $_POST['Telephone_Number'];// not required
	$subject    = $_POST['Subject'];// required
	$comments   = $_POST['Message'];// required

	$error_message = "";

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
	}
	if (strlen($first_name) < 2) {
		$error_message .= 'Your First Name does not appear to be valid.<br />';
	}
	if (strlen($last_name) < 2) {
		$error_message .= 'Your Last Name does not appear to be valid.<br />';
	}
	if (strlen($comments) < 2) {
		$error_message .= 'The Comments you entered do not appear to be valid.<br />';
	}
	if (strlen($subject) < 2) {
		$error_message .= 'The Subject you entered do not appear to be valid.<br />';
	}

	if (strlen($error_message) > 0) {
		died($error_message);
	}
	$email_message = "Form details below.\r\n";

	function clean_string($string) {
		$bad = array("content-type", "bcc:", "to:", "cc:");
		return str_replace($bad, "", $string);
	}

	$email_message .= "First Name: ".clean_string($first_name)."\r\n";
	$email_message .= "Last Name: ".clean_string($last_name)."\r\n";
	$email_message .= "Email: ".clean_string($email_from)."\r\n";
	$email_message .= "Telephone: ".clean_string($telephone)."\r\n";
	$email_message .= "Subject: ".clean_string($subject)."\r\n";
	$email_message .= "Message: ".clean_string($comments)."\r\n";

	$headers = 'From: '.$email_from."\r\n".
	'Reply-To: '.$email_from."\r\n".
	'X-Mailer: PHP/'.phpversion();

	if (isset($_POST['url']) && $_POST['url'] == '') {
		mail($email_to, $email_subject, $email_message, $headers);
		$spam_status = "This is not SPAM";
	} else {
		$spam_status = "This is SPAM";
	}
	echo $spam_status;
	die();

	header("Location: $thankyou");

	?>

									<script>location.replace('<?php echo $thankyou;?>')</script>
	<?php
}
die();
?>
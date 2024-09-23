<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Run the code checker from the command-line.
 *
 * @package    local_authoringtool
 * @copyright  2024 support@cognispark.ai
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../config.php');

require_login();

global $USER, $CFG;

$ssourl = get_config('local_authoringtool', 'sso_url');
$secretkey = get_config('local_authoringtool', 'secret_key');
if (empty($secretkey)) {
    throw new moodle_exception('Secret key not configured');
}

$email      = $USER->email;
$uid = $USER->id;
$timestamp  = time();
$salttoken = md5($timestamp . $email . $secretkey);
$role = "student";
$fname = $USER->firstname;
$lname = $USER->lastname;
$lms = $CFG->wwwroot;
if (is_siteadmin()) {
    $role = "admin";
}

$ssourl = $ssourl.'sso';

redirect(
    new moodle_url(
        $ssourl, [
            'email' => $email,
            'salt_token' => $salttoken,
            'timestamp' => $timestamp,
            'platform' => 'LMS',
            'role' => $role,
            'fname' => $fname,
            'lname' => $lname,
            'uid' => $uid,
            'lms' => $lms,
        ]
    )
);

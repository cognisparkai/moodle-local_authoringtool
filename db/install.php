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
 * Installation script for local_authoringtool plugin.
 *
 * @package    local_authoringtool
 * @copyright  2024 support@cognispark.ai
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Installs the local_authoringtool plugin by setting up the initial configuration.
 *
 * This function sets the SSO URL and secret key for the local_authoringtool plugin.
 */
function xmldb_local_authoringtool_install() {
    $plugin = 'local_authoringtool';
    // Set SSO URL.
    set_config('sso_url', 'https://app.cognispark.ai/', $plugin);
    // Set secret key.
    set_config('secret_key', 'MElik3476PoHe', $plugin);
}

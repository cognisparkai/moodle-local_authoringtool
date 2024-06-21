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
 * Authoring Tool library code.
 *
 * @package    local_authoringtool
 * @copyright  2024 support@cognispark.ai
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Renders primary navigation output.
 *
 * @param renderer_base $renderer
 * @return string The HTML
 */
function local_authoringtool_render_navbar_output(\renderer_base $renderer) {
    global $USER, $CFG;

    // Early bail out conditions.
    if (!isloggedin() || isguestuser()) {
        return '';
    }

    // Check if the link is enabled.
    if (empty(get_config('local_authoringtool', 'enablelink'))) {
        return '';
    }

    return $renderer->render_from_template('local_authoringtool/nav', [
        'image' => $renderer->image_url('icon', 'local_authoringtool'),
        'link' => new moodle_url('/local/authoringtool/redirect.php'),
        'title' => get_string('name', 'local_authoringtool'),
    ]);
}

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
 * Privacy Subsystem implementation for local_authoringtool.
 *
 * @package    local_authoringtool
 * @copyright  2024 support@cognispark.ai
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_authoringtool\privacy;

defined('MOODLE_INTERNAL') || die();

/**
 * Privacy Subsystem for local_authoringtool implementing provider.
 *
 * @copyright  2024 support@cognispark.ai
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class provider implements \core_privacy\local\metadata\provider {

    /**
     * Returns metadata about the user data shared with Cognispark.
     *
     * @param   collection     $collection     The collection to add metadata to.
     * @return  collection     $collection     The collection to update.
     */
    public static function get_metadata(\core_privacy\local\metadata\collection $collection) : \core_privacy\local\metadata\collection {
        $collection->add_external_location_link(
            'cognispark.ai',
            [
                'email' => 'privacy:metadata:email',
                'firstname' => 'privacy:metadata:firstname',
                'lastname' => 'privacy:metadata:lastname',
                'userid' => 'privacy:metadata:userid',
                'role' => 'privacy:metadata:role',
            ],
            'privacy:metadata:cognispark'
        );

        return $collection;
    }
}
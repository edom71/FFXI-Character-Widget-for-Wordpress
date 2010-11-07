FFXI Character Stats
=====================
Developer: Dustin Lennon (Demonicpagan)<br />
Email: <demonicpagan@gmail.com>

Install Instructions
---------------------
1. Extract the archive to a desired folder.
2. Upload to wp-contents/plugins the contents of the archive.
3. Edit the settings for the plugin in your WP-Admin interface.

About
------
This is a little Wordpress script where you can show off your FFXI accomplishments on your Wordpress blog. It is placed as a widget (left or right side) on your blog.

FEATURES:

* Display Profile Information (character name, world, linkshell, race, rank)
* Display Basic Job Information
* Display Advanced Job Information
* Display Crafting Skills
* Display Weapon Skills learned
* Display Missions you are currently on
* Display Combat Skills
* Display Magic Skills
* Any of the aforementioned information can be hidden or shown

Bugs/Suggestions need to be placed here: <http://github.com/demonicpagan/FFXI-Character-Widget-for-Wordpress/issues>

Thanks for taking the time to download my Wordpress Plugin.

Changelog - Dates are in Epoch time
------------------------------------
FYI: I have no clue when I exactly started work on this, I'll just start the changelog when I first started uploading to Github

1289019600:

* Updating to version 5.0 branch on GitHub. Will overwrite main branch when done.
* Changed README to a markdown format for Github and started work on adding the changelog from when the repository was created on Github.
* Fixed formatting in README.md
* Fixed more formatting in README.md and added to changelog.

1270357200:

* Added Synergy to crafting table and admin. Changed the preview page to use jQuery to instantly show and hide tables so you can have a quicker preview of what will be shown.

1269406800:

* Servers removed from server selection list on the profile admin page:
** Fairy
** Kujata
** Remora
** Midgardsormr
** Hades
** Seraph
** Garuda
** Pandemonium
* Added automatic update to update this field in your database so you don't have to worry about doing it. For this to take effect, you must disable and reenable the plugin. I'm sorry, there is no way around this. You should be doing this on all plugin updates anyway.
* Found a typo in admin/preview.php and corrected.
* Found a typo in ffxi.php and corrected.
* In admin/profile.php:
** Changed $world to $server
** Altered the checked and selected functions incoming variable names.

1269234000:

* Prevent .zip archives from being committed to the repository.

1269147600:

* Added a README File

1268888400:

* Learned that disabled input fields do not send any data. Fixed this by using two hidden fields that allows me to send the data I want and yet keep the field disabled until I'm ready to enable it for input.

1268802000:

* Added mission updates for the upcoming add-on scenarios, Vision of Abyssea, Heroes of Abyssea, and Scars of Abyssea. At this present moment since Vision of Abyssea is due out in the June update, it is the only input field enabled in the admin settings. I will alter the code when it comes time for the other two add-on scenarios come September and December.
* Missed a semi-colon on line 329 causing an error.
* Needed to recomment out the error displaying.
* Had extra quote in the Mission table after each of the add-on names. It is 3:11 in the morning and got type happy.
* MySQL error in the update command to add the three add-on columns.
* Hopefully this will be the last attempt at getting the table structure updated for those that already have this plugin installed (like myself, of course).
* Still working on centering the tables in the sidebar and forgot to update the preview page in the admin area with the new add-ons.
* No more attempts being made to center these tables, css isn't allowing for it that I can figure out yet.
* With the latest add-on scenarios being added, I screwed up missing some single quotes. This prevented mission updates to be stored in the database. This has been fixed and the archive has been udpated.

1267855200:

* Updated to version of effects.js and prototype.js that can be found by viewing the source of <http://tetlaw.id.au/upload/pages/really-easy-field-validation/>
* Reverted previous changes made to the file that made an advanced job show 0 if it was saved as 0 or blank in the admin backend.

1267768800:

* Moved the <link> stylesheet reference to the header where it should be.
* Consolidated the install and widget files into one. Added some javascripts for form validation on pages.
* Adding js validation for jobs.php to deny bogus job levels.
* Added js validation on the job level page. Currently for basic jobs, you can only input a job level from 1 to 80. For the advanced jobs, 0 to 80. Updated the CSS file for the new styling.
* Working on fixing they style and js to show up in the header.
* With the help of maxaud in #wordpress on the Freenode IRC network, managed to get the js and stylesheet moved up into the header.
* Extra / added. Also to note, the form validation is currently not functioning for job levels.

1257051600:

* Initial commit to Github
* Updated version for widget and admin backend to 3.1. Added A Shantotto Ascension to the mission admin interface. Updated the admin preview to show the three addons (weren't showing the latest two). Sidebar shows all three addons for the mission (if displayed). 
* Forgot to change the text for where A Shantotto Ascension mission information is displayed. AMK -> ASA
* Forgot to add the db entry text to add the Shantotto mission information to the db

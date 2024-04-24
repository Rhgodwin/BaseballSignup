# BaseballSignup
Web based sign-up application for a company baseball league
Group project members are: Rhett Godwin, Zach Butler, and Cat Kramka

Changelog
-------------

Version Alpha 0.1
-----------------
Login system coded and working<br>
Skeleton structure for html up (minus tables for db)<BR>
Added pwdb.sql file for SQL database import<br>

Version Alpha 0.2
--------------------
HTML improvements:<br>
Added Fieldsets in correct placement<br>
Added Buttons<br>
Added Table with test data<br>
Added DbFunctions.php (class) for db functions (NOT WORKING ATM!)<br>
Added new Table to Database for Player Name, Position, Team.<br>

Version Alpha 0.3
--------------------
HTML improvements<br>
Improved Button Layout<br>
JavaScript add so only one checkbox can be selected at a time<br>
Retreival DB functions implemented and working!<BR>
Added Baseball Images<br>
Name is automatically added from login system into player database upon submission<br>
***********************WARNING**********************************<br>
Login System has changed. Username is now First and Last name<br>
Password is the same (test)<br>
****************************************************************<br>

Version Alpha .04
-------------------
Added in success page for successful submit<br>

Version Alpha .05
-------------------
Major rework of code to in Class Structure<br>
Added new classes (regFormClass, teamClass, and playersClass)<br>
Change dbFun to dbConnect and only handles db connections<br>
Added code to detect if a player has already signed up<br>
added sorry.php<br>
<s>added displayTeamTable.php</s><br>

Version Alpha .06
-------------------
Admin login working<br>
Team buttons working(Implementation needs to be better)<br>
Added multiple pages for team display (needs better implentation)<br>
Almost feature complete. Will move to beta soon!!!!!!!!!!!!!!<br>

Version Alpha .07
----------------------
Added Database admin functions<br>
Added in a new DB connection method. Going to convert everything to new method.<br>
Leaving in old method for now<br>
Added in security fixes<br>
Updated Database. (A new import will be required/or a new column added)<br>
Fixed Edit function (working now)<br>
<strong>FEATURE COMPLETE HAS BEEN ACHIEVE AT ALPHA .07!!!!</Strong><br>

Version Beta .01
------------------
Implmented new database connection system<BR>
Security update to prevent SQL injection attacks<br>
*yes it was possible to be bobby-tables. A little embarrased by that*<br>
Added Message for when a team is empty<br>
Added registration system(Not working ATM needs php code added)<br>
Added functions for manipulation of Account database
<i>Change/edit/delete username,password,email</i><br>
Added password matching function for new Employee Registration<br>

Version Beta .06
------------------
**Skipped a few numbering revisions. Only a few bugs left before RC milestone<br>
<strong>Feature Freeze</strong><br>
Registration system added (Working)<br>
Updated password detection system<br>
Added in new system for detecting if a employee exists<br>

Version Beta .09
-----------------------
Squashed submit bug!!!!!
All bugs have been Sqaushed!!!!







TODO
-------------------
<s>Add more PHP DB functions for functionality</s><br>
<s>Add addtional improve PHP code for back end</s><br>
<s>BUG with submit where clicking on the button will allow add</s>(BUG SQUASHED)<br>
<s>Tons</s>A few more security fixes. <br> 
<s>Overhaul the dbconnection system.</s> <br> 
<s>Add in a registration system *Optional feature*</s><br>

Known Bugs
--------------------------------
<s>Adds an empty $_POST on login</s>(BUG SQUASHED)<br>
<s>Profile page not connecting to the DB</s>(BUG SQUASHED)<br>
<s>Allows you to submit an empty $_POST on submit to team</s><br>
*******************************************************************<br>
Bugs Squashed Enter Final Build Phase<BR>
********************************************************************<br>


Final Build 1.0
------------------
Feature Completed
Squashed all known Bugs


Final Demo Link:
---------------------
link goes here
----------------------


#  Brain App Project Code


### Project Documentation

* [Milestones](Milestones.md)
* [Requirements Plan](Requirements.md)
* [Design Plan](Design.md)
* [Code Plan](Code.md)
* [Test Plan](Test.md)


### Code.md
* Implementation plan
* Code milestones
* Schedule for tracking progress


### Design Patterns

To complete this project you must use the following design patterns

* Views
    * Render Page
    * Render Cards
    * List view
    * Add view
    * Update view
    * Markdown display view
    * Slide show view with Reveal JS
* Data
    * Create MySQL database
    * Connect to database from PHP
    * List records in database
    * Add records to database
    * Edit records in database
    * Read document


### Refactoring

The Brain App contains a number of different components.  Each of these was created in isolation and
combined into the larger app.

Extensive refactoring is needed to eliminate the code duplication.  Here is the order of refactorings that are planned.

* Create views.php in "/bacs350/lib"
* Setup styles.css in "/bacs350/lib"
* Create templates directory for HTML files in "/bacs350/templates"
* Move existing templates into "/bacs350/templates"
* Convert home page to use Page Render design pattern
* Create auth.php in "/bacs350/lib"
* Create db.php in "/bacs350/lib"
* Create log.php in  "/bacs350/lib"
* Show log history using "/bacs350/logpage.php"
* Convert all pages to use "/bacs350/lib/views.php"
* Use code generator to convert each component
    * Documents
    * Notes
    * Slides
    * Planner
    * Reviewer
    * Subscribers
    * Superhero
* Delete all extra files


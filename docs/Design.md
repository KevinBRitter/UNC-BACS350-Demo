#  Brain App Project Design

## Project Documentation

* [Milestones](Milestones.md)
* [Requirements Plan](Requirements.md)
* [Design Plan](Design.md)
* [Code Plan](Code.md)
* [Test Plan](Test.md)


### Design.md
* Select your technology and tools
* Identify the components you must build
* Create an index of pages to build
* App = Data + Views (design for both data and views)
* How will you test the design?


### Component Modules

Build a PHP app that is host to the following functionality.

* Documents
* Notes
* Slides
* Planner
* Reviewer
* Subscribers
* Superhero


### Page navigation

### Global Designs
* Logging
* User Administration
* Reusable Libraries - views.php, db.php, CSS
* Templates


### Data Model
* Record Structure
* Database tables
* Data CRUD


### Views
* List
* Add
* Edit
* Delete


### Files

The file structure on the server reflects the app structure.  Here are the key files

    bacs350
        index.php
        pagelog.php
        
        lib
            views.php
            db.php
            log.php
            
        images
        demo
        patterns
        
        docman
        notes
        planner
        superhero
        subscriber
        slides
        templates
        review

    docs
        BrainProject.md
        Milestones.md
        Requirements.md
        Design.md
        Code.md
        Test.md

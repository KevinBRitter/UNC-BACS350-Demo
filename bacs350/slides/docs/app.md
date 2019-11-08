# Software Lifecycle

* Building a Presentation App
* by Mark Seaman

![](Bear.png)


### Software Lifecycle
* Requirements
* Design
* Code
* Test


## Requirements
* Data
* Views


### Slide Show Data Records
* Slide show records 
    * id
    * title
    * body
    
    
### Slide Show Views
* Use Reveal JS to show slides
* Standard CRUD views to create new shows
* Run slides in new browser tab


## Design
* Apps = Data + Views


### Data
*  Database: uncobacs_slides
* Table slides:
    * id
    * title
    * body


### Views
* List of slide shows
* Add new show
* Edit existing show
* Delete a show
* Run the presentation


## Code
* Pages
* Templates
* Controller


### PHP Files
* index.php - home view to run app
* slideshow.php - presentation display page
* slides.php - business logic for slides


### Template Files
* page.html - main app page
* slides.html - show the content of a "slides" record
* add.html - form to add a new presentation
* edit.html - form to edit a presentation
* reveal.html - HTML code to show presentation


## Test
* Basic Usability Test
    * Home page 
    * Run slides
    * Add new show
    * Edit show
    * Delete show


### Apps = Data + Views

![](Bear.png)


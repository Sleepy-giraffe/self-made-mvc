# self-made-mvc
the aim of writing this application is the following

Create an web application that displays a list of tasks

The tasks consist of:
- the user name;
- e-mail;
- the task text;
- picture;

Start page displays a list of tasks, with pagination(3 tasks per page). List can be sorted by user name, email and status.
Any visitor can see the list and create new task without registering.

Before saving a new task, you user preview it. Preview should work without reloading the page.

Picture can be attached to the task. Requirements for images - format JPG / GIF / PNG, no more than 320х240 pixels.
If uploaded image is larger, it should be proportionally reduced to the specified size.

Application should have administration entry. The administrator should have the ability to edit the text of the task and mark as completed.
Completed tasks are displayed in the general list  with the appropriate mark.

Application should be implemented according to MVC concept, with pure PHP. Frameworks shouldn't be used. Libraries are allowed to use.

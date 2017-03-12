# dbms_project_site
Demonstrates various operations a user can perform in a movie renting site.

afterlog.php:
    Users are redirected to this page after entering their login information. It displays movies that are in stock, an dynamic dropdown    menu that keeps a list of all available movies and a rented list that shows all the movies rented by the user and the movie in this list gets removed automatically after the rent deadline is over.
    
dbase.php:
    To connect to the database used as an include file.
  
index.php:
    Initial login page for the user.
 
afterlog.php:
    Validates user by taking details from index.php and either takes them to afterlog.php on successfull login or return an error.
    
logout.php:
    Destorys session that was created during login.
    
register.php:
    Basic registration page for users.

remove.php:
    This script runs in the background of afterlog.php where it automatically updates i.e. removes the rented movies based on the due date.
    
rentvalidate.php:
    Validates the information submitted by the user to rent a movie.

session.php:
    Creates a session for a user on successfull login.


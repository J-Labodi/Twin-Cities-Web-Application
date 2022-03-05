-   This document will contain brief information about all the files in this directory.

-   The project is to create a RSS feed from the data stored in dsa_twincities database.    
    The file dsa_twincities is an export of the same database and can be used to easily replicate the database using any SQL server.

-   There is an empty directory named 'XML_files'. This directory will store some XML files during the execution of the program. However,
    these files are deleted(unlinked as soon as the execution is complete). Despite it being empty, it is the default directory in which the 
    XML files are stored and processed and therefore it

    **must not be deleted**

-   Connect.php holds the script that is used to connect the index page to the database. By doing so, queries can be sent to the database
    from the index page itself using php's functions.

-   Functions.php contains all the functions used in the index page. Such separation of functions with the main page is done in order to 
    make the code easy to read, understand and modify. They can be easily acessed by index using require('functions.php')

-   Globals.php contains all the global variables used in the project. Again these can also be easily acessed from the index page using
    the require function.

-   Index.php is the file that is to be opened by hosting. Contains the main page with the desired rss feed. Uses 'connect.php', 'functions.php',
    and 'globals.php' by using include_once and require.

-   styling.css contains stylings on the html page stored in the index file.

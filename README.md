# dwpSocialWeb

## Project Structure

- Index (home) imports 3 views: header, leftmenu, userfeed and rightmenu
- For the style, we are using Using Bootstrap 5.1

## Pending Tasks

- Add constants.php file to gitignore
- Change Dynamic SQL to Prepared Statements
- Add transactions in User Login, for example (IT'S NOT A REQUIREMENT FOR THE DWP)
- Consider Batch processing pdo sql (If we have multiple queries to run)
- Basic CRUD > Update and delete
- User login > A user should login with username or email
- Sign up
- User settings
- Post creation
- Post comment and comments in general
- Voting
- Validations and errors (delete viewcontroller and validate with js)

## Issues

- SignUp and other forms: page reloads after validation errors (when submitting) and the user must rewrite everything!
- When signing up correctly, it redirects user to login, so the message of successful registration has no time to be shown
- Check Image types when loading posts images, avatar, etc
- Main page side menus overlap when resizing browser

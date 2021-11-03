# dwpSocialWeb

## Project Structure

- Index (home) imports 3 views: header, leftmenu, userfeed and rightmenu
- For the style, we are using Using Bootstrap 5.1

## Pending Tasks

- Save in the session the form inputs values (except from the pass), when page reloads and user has something wrong during the process
- Assign categories to user when signing up
- create general functions file (validate data function, for example)
- Rank and Role
- Only registered users can navigate
- Fill database with real info
- Password Hash
- Add transactions in User Login, for example (IT'S NOT A REQUIREMENT FOR THE DWP)
- Consider Batch processing pdo sql (If we have multiple queries to run)
- User login > A user should login with username or email ??
- Sign up
- User settings
- Post creation
- Post comment and comments in general
- Voting
- Validations and errors (delete viewcontroller)
- Prevent re submit (just once)

## Issues

- SignUp and other forms: page reloads after validation errors (when submitting) and the user must rewrite everything!
- When signing up correctly, it redirects user to login, so the message of successful registration has no time to be shown
- Check Image types when loading posts images, avatar, etc
- Main page side menus overlap when resizing browser

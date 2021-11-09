# dwpSocialWeb

## Project Structure

- Index (home) imports 3 views: header, leftmenu, userfeed and rightmenu
- For the style, we are using Using Bootstrap 5.1
- Execute sql tables creation first and then the triggers
- Only registered users can navigate

## Domain database

- Tables creation and insertion (except comments insertion)
- Execute triggers (with UPPERCASE table names)

## Anna's Pending Tasks

- Sign up > categories selection (jquery)
- Votes on posts, new post styling
- Datetime formatting on posts

## Pending Tasks

- Try catch and close the connection at the end of try (take a look at try catch finally, finally will always be run)
- Security measures left: encrypting password and htmlspecialchars
- Control negative values when executing triggers that substract a total (possible negative values)
- Join/Unjoin button
- Votes > Prevent voting twice.
- Category page
- Post descriptions, allow nulls??
- Have in mind the possibility of posts with no images, external links, thumbnails, videos, etc
- Save in the session the form inputs values (except from the pass), when page reloads and user has something wrong during the process
- Assign categories to user when signing up
- create general functions file (validate data function, for example)
- Rank and Role

- Fill database with real info
- Password Hash
- Add transactions in User Login, for example (IT'S NOT A REQUIREMENT FOR THE DWP)
- Consider Batch processing pdo sql (If we have multiple queries to run)
- User login > A user should login with username or email ??
- Search Bar
- Filters
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

## Triggers useful commands

- SHOW TRIGGERS
- DROP TRIGGER trigger_name

## Comments page

- When page has a lot of comments in it page starts displaying from the bottom
